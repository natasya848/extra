<?php

namespace App\Controllers;

use App\Models\Universal\Amodel;
use App\Models\Universal\SemesterModel;
use App\Models\Universal\TahunModel;
use App\Models\Universal\SiswaModel;
use App\Models\Universal\PerizinanModel;
use App\Models\Universal\M_guru;
use App\Models\M_ekstra;

class Absensi extends BaseController
{
    public function index()
{
    $idUser = session()->get('id_user');
    $level  = session()->get('level');
    $db     = \Config\Database::connect();

    $semesterModel = new SemesterModel();
    $tahunModel    = new TahunModel();

    $semester = $semesterModel->where('status', 'Aktif')->first();
    $tahun    = $tahunModel->where('status', 'Aktif')->first();

    if (!$semester || !$tahun) {
        return redirect()->back()->with('error', 'Semester atau Tahun aktif belum disetting');
    }

    // ===============================
    // Level 4: akses data absen diri sendiri (read-only)
    // ===============================
    if ($level == 4) {
        $siswa = $db->table('siswa')
            ->where('user', $idUser)
            ->get()
            ->getRowArray();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        $query = "
            SELECT s.status, COALESCE(a.total, 0) AS total
            FROM (
                SELECT 'H' AS status
                UNION SELECT 'I'
                UNION SELECT 'S'
                UNION SELECT 'A'
                UNION SELECT 'TK'
            ) s
            LEFT JOIN (
                SELECT UPPER(TRIM(status)) AS status, COUNT(*) AS total
                FROM absen
                WHERE siswa = ?
                  AND semester = ?
                  AND tahun = ?
                GROUP BY UPPER(TRIM(status))
            ) a ON s.status = a.status
        ";

        $absenData = $db->query($query, [
            $siswa['id_siswa'],
            $semester['id_semester'],
            $tahun['id_tahun']
        ])->getResultArray();

        $data = [
            'title'     => 'Absensi Saya',
            'siswa'     => $siswa,
            'absenData' => $absenData,
            'semester'  => $semester,
            'tahun'     => $tahun,
            'readonly'  => true
        ];

        echo view('header');
        echo view('menu');
        echo view('absen/absen_saya', $data);
        echo view('footer');
        return;
    }

    // ===============================
    // Level guru / level 1: lihat absensi siswa
    // ===============================
    $ekstraModel = new M_ekstra();
    $siswaData   = [];

    if ($level == 1) {
        // Level 1 lihat semua ekskul dan semua siswa
        $ekstraList = $ekstraModel
            ->where('status', 'Aktif')
            ->findAll();
    } else {
        // Level guru/pembina biasa
        $guruModel = new M_guru();
        $guru = $guruModel->where('user', $idUser)->first();

        if (!$guru) {
            return redirect()->to('home')->with('error', 'Anda bukan guru ekskul');
        }

        $idGuru = $guru['id_guru'];

        // Daftar ekskul yang diampu guru
        $ekstraList = $ekstraModel
            ->where('pembina', $idGuru)
            ->where('status', 'Aktif')
            ->findAll();
    }

    $idEkstra = $this->request->getGet('id_ekstra');

    if ($idEkstra) {
        $siswaData = $db->table('pendaftaran_ekstra pe')
            ->select('s.id_siswa, s.nama_siswa')
            ->join('siswa s', 's.id_siswa = pe.id_siswa')
            ->where('pe.id_ekstra', $idEkstra)
            ->where('pe.id_semester', $semester['id_semester'])
            ->where('pe.id_tahun', $tahun['id_tahun'])
            ->where('pe.status', 'Aktif')
            ->get()
            ->getResultArray();
    }

    $data = [
        'title'      => 'Absensi Ekskul',
        'ekstraList' => $ekstraList,
        'idEkstra'   => $idEkstra,
        'siswaData'  => $siswaData,
        'semester'   => $semester,
        'tahun'      => $tahun,
    ];

    echo view('header');
    echo view('menu');
    echo view('absen/absen_guru', $data);
    echo view('footer');
}

    public function absen_saya()
{
    $idUser = session()->get('id_user');
    $level  = session()->get('level');

    if ($level != 4) {
        return redirect()->to('home')->with('error', 'Akses ditolak');
    }

    $db = \Config\Database::connect();

    // Ambil data siswa
    $siswa = $db->table('siswa')->where('user', $idUser)->get()->getRowArray();
    if (!$siswa) {
        return redirect()->to('home')->with('error', 'Data siswa tidak ditemukan');
    }

    // Ambil semester dan tahun aktif
    $semester = $db->table('semester')->where('status', 'Aktif')->get()->getRowArray();
    $tahun    = $db->table('tahun')->where('status', 'Aktif')->get()->getRowArray();

    if (!$semester || !$tahun) {
        return redirect()->back()->with('error', 'Semester atau Tahun aktif belum disetting');
    }

    

    $query = "
    SELECT s.status, COALESCE(a.total, 0) AS total
    FROM (
        SELECT 'H' AS status
        UNION SELECT 'I'
        UNION SELECT 'S'
        UNION SELECT 'A'
        UNION SELECT 'TK'
    ) s
    LEFT JOIN (
        SELECT UPPER(TRIM(status)) AS status, COUNT(*) AS total
        FROM absen
        WHERE siswa = ?
          AND semester = ?
          AND tahun = ?
        GROUP BY UPPER(TRIM(status))
    ) a ON s.status = a.status
";

    $absenData = $db->query($query, [
        $siswa['id_siswa'],
        $semester['id_semester'],
        $tahun['id_tahun']
    ])->getResultArray();

    $data = [
        'title'      => 'Absensi Saya',
        'siswa'      => $siswa,
        'semester'   => $semester,
        'tahun'      => $tahun,
        'absenData'  => $absenData,
        'id_semester'=> $semester['id_semester'] ?? null,
    ];

    echo view('header');
    echo view('menu');
    echo view('absen/absen_saya', $data);
    echo view('footer');
}


    public function simpan()
    {
        $idUser = session()->get('id_user');
        $guruModel = new M_guru();
        $guru = $guruModel->where('user', $idUser)->first();

        if (!$guru) {
            return redirect()->to('home')->with('error', 'Akses ditolak');
        }

        $idGuru = $guru['id_guru'];
        $idEkstra = $this->request->getPost('id_ekstra');
        $tanggal  = $this->request->getPost('tanggal') ?? date('Y-m-d');
        $statusInput = $this->request->getPost('status') ?? [];

        $ekstraModel = new M_ekstra();
        $cekEkstra = $ekstraModel
            ->where('id_ekstra', $idEkstra)
            ->where('pembina', $idGuru)
            ->first();

        if (!$cekEkstra) {
            return redirect()->to('absensi')->with('error', 'Ekskul tidak valid');
        }

        $semesterModel = new SemesterModel();
        $tahunModel    = new TahunModel();
        $semester = $semesterModel->where('status', 'Aktif')->first();
        $tahun    = $tahunModel->where('status', 'Aktif')->first();

        $db = \Config\Database::connect();
        $absenModel = new Amodel();

        // Ambil daftar siswa ekskul
        $siswaList = $db->table('pendaftaran_ekstra pe')
            ->select('pe.id_siswa')
            ->where('pe.id_ekstra', $idEkstra)
            ->where('pe.id_semester', $semester['id_semester'])
            ->where('pe.id_tahun', $tahun['id_tahun'])
            ->where('pe.status', 'Aktif')
            ->get()
            ->getResultArray();

        // Simpan/update absensi
        foreach ($siswaList as $siswa) {
            $status = $statusInput[$siswa['id_siswa']] ?? 'H';
            $persen = match ($status) {
                'H' => 2,
                'I', 'S' => 1,
                default => 0
            };

            $data = [
                'siswa'     => $siswa['id_siswa'],
                'id_ekstra' => $idEkstra,
                'tanggal'   => $tanggal,
                'status'    => $status,
                'semester'  => $semester['id_semester'],
                'tahun'     => $tahun['id_tahun'],
                'persen'    => $persen
            ];

            $existing = $absenModel->where([
                'siswa'     => $siswa['id_siswa'],
                'id_ekstra' => $idEkstra,
                'tanggal'   => $tanggal,
                'semester'  => $semester['id_semester'],
                'tahun'     => $tahun['id_tahun']
            ])->first();

            if ($existing) {
                $absenModel->update($existing['id_absen'], $data);
            } else {
                $absenModel->insert($data);
            }
        }

        return redirect()->to('absensi?id_ekstra='.$idEkstra)
            ->with('success', 'Absensi berhasil disimpan');
    }


    public function get_status_by_date()
    {
        $requestData = $this->request->getJSON();

        $tanggal = $requestData->tanggal;
        $idSiswa = $requestData->id_siswa;

        $perizinanModel = new PerizinanModel();
        $statusPerizinan = $perizinanModel->getStatusPerizinanByDateAndIdSiswa($tanggal, $idSiswa);

        $statusData = [];
        foreach ($statusPerizinan as $perizinan) {
            $statusData[] = [
                'id_siswa' => $perizinan['siswa'],
                'status' => $perizinan['status']
            ];
        }

        return $this->response->setJSON($statusData);

    }

    public function get_status_all_today()
    {
        $request = $this->request->getJSON();
        $tanggal = $request->tanggal;

        $model = new ModelAbsensi();
        $absen = $model->where('tanggal', $tanggal)->findAll();

        $result = [];
        foreach ($absen as $row) {
            $result[$row['id_siswa']] = $row['status'];
        }

        return $this->response->setJSON($result);
    }

}
