<?php

namespace App\Controllers;
use App\Models\Universal\RombelModel;
use App\Models\Universal\SiswaModel;
use App\Models\Universal\ModelNilai;
use App\Models\Universal\M_jadwal;
use App\Models\Universal\MapelModel;
use App\Models\Universal\M_level;
use App\Models\Universal\M_guru;
use App\Models\Universal\NilaiSikapModel;
use App\Models\Universal\ModelEkstra;
use App\Models\Universal\M_model;

class Nilai_siswa extends BaseController
{
    public function index()
    {
        $level = session()->get('level');
        $id_user = session()->get('id');

            $model = new RombelModel();

            $data['rombel'] = $model->getRombel(); 

            $data['title'] = 'Data Rombel';

        echo view('header');
        echo view('menu');
        echo view('nilai_siswa/v_nilai', $data);
        echo view('footer');
    }

    public function info($id_rombel)
    {
        $level = session()->get('level');
        $id_user = session()->get('id');
        $id_jabatan = $this->menuModel->getJabatanByLevel($level);

        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3) {
            $nilaiModel = new ModelNilai();
            $blokModel = new M_blok();
            $guruModel = new M_guru();
            $jadwalModel = new M_jadwal();

            $data['nilai'] = $nilaiModel->getNilaiByRombel($id_rombel); 
            $data['blok_list'] = $blokModel->findAll();
            $data['guru_list'] = $guruModel->findAll();
            $data['mapel_list'] = $jadwalModel->getMapelBlok(); 
            $data['title'] = 'Info Nilai';
            $data['id_rombel'] = $id_rombel;

            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);

            echo view('partial/header_datatable', $data);
            echo view('partial/side1', $akses);  
            echo view('partial/top_menu');
            echo view('nilai_siswa/v_infonilai', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

    public function input($id_rombel)
    {
        $level = session()->get('level');
        $id_user = session()->get('id');
        $id_jabatan = $this->menuModel->getJabatanByLevel($level);

        $jadwalModel = new \App\Models\Universal\M_jadwal();
        $siswaModel = new \App\Models\Universal\M_siswa();
        $nilaiModel = new ModelNilai();
        $blokModel = new M_model();

        $id_jadwal = $this->request->getGet('id_jadwal');
        $id_blok = $this->request->getGet('id_blok');

        $data['title'] = 'Input Nilai Siswa';
        $data['id_rombel'] = $id_rombel;
        $data['selected_jadwal'] = $id_jadwal;
        $data['selected_blok'] = $id_blok;

        $jadwal_query = $jadwalModel
            ->select('jadwal.*, mapel.nama_mapel, sesi.sesi, guru.nama as nama_guru')
            ->join('mapel', 'mapel.id_mapel = jadwal.id_mapel')
            ->join('sesi', 'sesi.id_sesi = jadwal.id_sesi')
            ->join('guru', 'guru.id_guru = jadwal.id_guru')
            ->where('jadwal.id_rombel', $id_rombel);

        if ($id_blok) {
            $jadwal_query->where('jadwal.id_blok', $id_blok);
        }

        $data['jadwal_list'] = $jadwal_query->findAll();
        $data['blok_list'] = $blokModel->tampil('blok'); 

        if ($id_jadwal && $id_blok) {
            $data['siswa_list'] = $siswaModel
                ->where('rombel', $id_rombel)
                ->orderBy('nama_siswa', 'ASC')
                ->findAll();

            $nilai_list = $nilaiModel
                ->where('id_jadwal', $id_jadwal)
                ->findAll();

            $nilai_per_siswa = [];
            foreach ($nilai_list as $n) {
                $nilai_per_siswa[$n['siswa']] = $n;
            }
            $data['nilai_per_siswa'] = $nilai_per_siswa;
        } else {
            $data['siswa_list'] = null;
            $data['nilai_per_siswa'] = [];
        }

        $levelModel = new M_level();
        $data['namalevel'] = $levelModel
            ->select('nama_level')
            ->join('user', 'user.level = level.id_level')
            ->where('user.id_user', $id_user)
            ->first();

        $data['group'] = $this->menuModel->getGroup($level);
        $data['menus'] = $this->menuModel->getMenusWithAccess($level);
        $akses['menus'] = $this->menuModel->getMenusByGroup($level);

        echo view('partial/header_datatable', $data);
        echo view('partial/side1', $akses);  
        echo view('partial/top_menu');
        echo view('nilai_siswa/inputnilai', $data);
        echo view('partial/footer_datatable');
    }

    public function getJadwalByBlok()
    {
        $id_rombel = $this->request->getPost('id_rombel');
        $id_blok = $this->request->getPost('id_blok');

        $jadwalModel = new \App\Models\Universal\M_jadwal();

        $jadwal = $jadwalModel
            ->select('jadwal.*, mapel.nama_mapel, sesi.sesi, guru.nama as nama_guru')
            ->join('mapel', 'mapel.id_mapel = jadwal.id_mapel')
            ->join('sesi', 'sesi.id_sesi = jadwal.id_sesi')
            ->join('guru', 'guru.id_guru = jadwal.id_guru')
            ->where('jadwal.id_rombel', $id_rombel)
            ->where('jadwal.id_blok', $id_blok)
            ->findAll();

        return $this->response->setJSON($jadwal);
    }

    public function get_jadwal_ajax()
    {
        $id_rombel = $this->request->getGet('id_rombel');
        $id_blok = $this->request->getGet('id_blok');

        $jadwalModel = new \App\Models\Universal\M_jadwal();
        $jadwal = $jadwalModel
            ->select('jadwal.*, mapel.nama_mapel, sesi.sesi, guru.nama as nama_guru')
            ->join('mapel', 'mapel.id_mapel = jadwal.id_mapel')
            ->join('sesi', 'sesi.id_sesi = jadwal.id_sesi')
            ->join('guru', 'guru.id_guru = jadwal.id_guru')
            ->where('jadwal.id_rombel', $id_rombel)
            ->where('jadwal.id_blok', $id_blok)
            ->findAll();

        $options = '<option value="">-- Pilih Jadwal --</option>';
        foreach ($jadwal as $j) {
            $options .= '<option value="' . $j['id_jadwal'] . '">' . $j['nama_mapel'] . ' - Sesi ' . $j['sesi'] . '</option>';
        }

        return $options;
    }

    public function get_siswa_ajax()
    {
        $id_jadwal = $this->request->getGet('id_jadwal');
        $id_rombel = $this->request->getGet('id_rombel');

        $siswaModel = new \App\Models\Universal\M_siswa();
        $nilaiModel = new \App\Models\Universal\ModelNilai();

        $data['selected_jadwal'] = $id_jadwal;
        $data['siswa_list'] = $siswaModel
            ->where('rombel', $id_rombel)
            ->orderBy('nama_siswa', 'ASC')
            ->findAll();

        $nilai_list = $nilaiModel
            ->where('id_jadwal', $id_jadwal)
            ->findAll();

        $nilai_per_siswa = [];
        foreach ($nilai_list as $n) {
            $nilai_per_siswa[$n['siswa']] = $n;
        }
        $data['nilai_per_siswa'] = $nilai_per_siswa;

        return view('nilai_siswa/siswa_nilai', $data);
    }

   public function simpan_otomatis()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        $id_siswa  = $this->request->getPost('id_siswa');
        $harian    = $this->request->getPost('harian');
        $uts       = $this->request->getPost('uts');
        $final     = $this->request->getPost('final');

        $rata = round(($harian + $uts + $final) / 3, 2); 

        $id_user = session()->get('id');
        $waktu   = date('Y-m-d H:i:s');

        $model = new \App\Models\Universal\ModelNilai();

        $existing = $model->where('id_jadwal', $id_jadwal)
                        ->where('siswa', $id_siswa)
                        ->first();

        $data = [
            'harian'     => $harian,
            'uts'        => $uts,
            'final'      => $final,
            'rata'       => $rata,
            'updated_at' => $waktu,
            'updated_by' => $id_user,
        ];

        if ($existing) {
            $model->update($existing['id_nilai'], $data);
        } else {
            $data['id_jadwal']  = $id_jadwal;
            $data['siswa']      = $id_siswa;
            $data['created_at'] = $waktu;
            $data['created_by'] = $id_user;

            $model->insert($data);
        }

        return $this->response->setJSON(['status' => 'success']);
    }


    // public function simpan()
    // {
    //     $nilaiModel = new ModelNilai();

    //     $id_jadwal = $this->request->getPost('id_jadwal');
    //     $pengetahuan = $this->request->getPost('pengetahuan');
    //     $keterampilan = $this->request->getPost('keterampilan');

    //     foreach ($pengetahuan as $id_siswa => $nilai_p) {
    //         $nilai_k = $keterampilan[$id_siswa];

    //         $data = [
    //             'siswa' => $id_siswa,
    //             'id_jadwal' => $id_jadwal,
    //             'pengetahuan' => (int)$nilai_p,
    //             'keterampilan' => (int)$nilai_k,
    //         ];

    //         $existing = $nilaiModel->where('siswa', $id_siswa)
    //                             ->where('id_jadwal', $id_jadwal)
    //                             ->first();

    //         if ($existing) {
    //             $nilaiModel->update($existing['id_nilai'], $data);
    //         } else {
    //             $nilaiModel->insert($data);
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Nilai berhasil disimpan!');
    // }

    public function pilih_rombel()
    {
        $db      = \Config\Database::connect();
        $request = \Config\Services::request();

        $level       = session()->get('level');
        $idUser      = session()->get('id_user');
        $id_semester = $request->getGet('id_semester');

        $semesterList = $db->table('semester')->get()->getResult();

        if ($level == 4) {
            if (empty($id_semester)) {
                $semesterAktif = $db->table('semester')->where('status', 'Aktif')->get()->getRow();
                $id_semester = $semesterAktif->id_semester ?? 1; 
            }

            return redirect()->to(base_url('nilai_saya?id_semester=' . $id_semester));
        }

        $builder = $db->table('rombel r')
            ->select('
                r.id_rombel, r.nama_r,
                k.nama_kelas,
                jr.jurusan_detail,
                jn.nama_jenjang,
                j.id_semester
            ')
            ->join('kelas k', 'r.kelas = k.id_kelas', 'left')
            ->join('jurusan jr', 'r.jurusan = jr.id_jurusan', 'left')
            ->join('jenjang jn', 'r.jenjang = jn.id_jenjang', 'left')
            ->join('jadwal j', 'j.id_rombel = r.id_rombel', 'left'); 

        if ($id_semester) {
            $builder->where('j.id_semester', $id_semester);
        }

        if ($level == 3) {
            $guru = $db->table('guru')
                ->where('user', $idUser)
                ->where('deleted_at', null)
                ->get()
                ->getRowArray();

            if (!$guru || !$guru['rombel']) {
                session()->setFlashdata(
                    'pesan',
                    'Anda belum memiliki rombongan belajar yang diampu.'
                );

                $data = [
                    'title'        => 'Pilih Rombel',
                    'rombels'      => [],
                    'semesterList' => $semesterList,
                    'id_semester'  => $id_semester
                ];

                echo view('header');
                echo view('menu');
                echo view('nilai_siswa/pilih_rombel', $data);
                echo view('footer');
                return;
            }

            $builder->where('r.id_rombel', $guru['rombel']);
        }

        $builder->groupBy('r.id_rombel'); 
        $rombels = $builder->get()->getResultArray();

        if ($level == 3 && count($rombels) === 1 && !empty($id_semester)) {
            return redirect()->to(
                base_url('nilai_perkelas?id_rombel=' . $rombels[0]['id_rombel'] . '&id_semester=' . $id_semester)
            );
        }

        $data = [
            'title'        => 'Pilih Rombel',
            'rombels'      => $rombels,
            'semesterList' => $semesterList,
            'id_semester'  => $id_semester
        ];

        echo view('header');
        echo view('menu');
        echo view('nilai_siswa/pilih_rombel', $data);
        echo view('footer');
    }


    public function nilai_kelas($id_rombel = null, $id_semester = null)
    {
        $db = \Config\Database::connect();
        $id_user = session()->get('id_user'); 
        $level   = session()->get('level');

        if (!$id_rombel || !$id_semester) {
            return redirect()->to(base_url('pilih_rombel'));
        }

        if ($level == 3) {
            $guru = $db->table('guru g')
                ->where('g.user', $id_user)
                ->get()->getRow();

            if (!$guru || $guru->rombel != $id_rombel) {
                return redirect()->to(base_url('errors/html/error_404'));
            }
        
            }

        $rombelInfo = $db->table('jadwal j')
                ->select('r.nama_r, s.nama_s')
                ->join('rombel r', 'j.id_rombel = r.id_rombel')
                ->join('semester s', 'j.id_semester = s.id_semester')
                ->where('j.id_rombel', $id_rombel)
                ->where('j.id_semester', $id_semester)
                ->get()->getRow();

        $tahunAktif = $db->table('tahun')->where('status', 'Aktif')->get()->getRow();
        $id_tahun = $tahunAktif->id_tahun ?? 1;

        if (!$id_semester) {
            $semesterAktif = $db->table('semester')->where('status', 'Aktif')->get()->getRow();
            $id_semester = $semesterAktif->id_semester ?? 1;
        }

        $siswaList = $db->table('siswa')
            ->select('siswa.id_siswa, siswa.nis, siswa.nama_siswa, jabatan.nama_jabatan')
            ->join('user', 'user.id_user = siswa.user')
            ->join('jabatan', 'jabatan.id_jabatan = user.jabatan', 'left')
            ->where('siswa.rombel', $id_rombel)
            ->orderBy('nama_siswa', 'ASC')
            ->get()->getResult();

        foreach ($siswaList as &$siswa) {

            $sikap = $db->table('nilai_sikap')
                ->where([
                    'id_siswa'    => $siswa->id_siswa,
                    'id_tahun'    => $id_tahun,
                    'id_semester' => $id_semester
                ])
                ->get()->getRow();

            $siswa->sikap_spiritual = $sikap->sikap_spiritual ?? '-';
            $siswa->sikap_sosial    = $sikap->sikap_sosial ?? '-';
            $siswa->catatan_wali    = $sikap->catatan_wali ?? '-';

            $siswa->ekstra = $db->table('nilai_ekstra')
                ->select('nilai_ekstra.id, ekstra.nama_ekstra, nilai_ekstra.nilai, nilai_ekstra.keterangan')
                ->join('ekstra', 'ekstra.id_ekstra = nilai_ekstra.id_ekstra')
                ->where([
                    'nilai_ekstra.id_siswa'    => $siswa->id_siswa,
                    'nilai_ekstra.id_tahun'    => $id_tahun,
                    'nilai_ekstra.id_semester' => $id_semester
                ])
                ->get()->getResult();

            $absen = $db->table('absen')
                ->select('status, COUNT(*) as total')
                ->where([
                    'siswa'    => $siswa->id_siswa,
                    'tahun'    => $id_tahun,
                    'semester' => $id_semester
                ])
                ->groupBy('status')
                ->get()->getResult();

            $siswa->absen_sakit = 0;
            $siswa->absen_izin  = 0;
            $siswa->absen_alpha = 0;
            $siswa->absen_hadir = 0;

            foreach ($absen as $a) {
                if ($a->status == 'S') $siswa->absen_sakit = $a->total;
                if ($a->status == 'I') $siswa->absen_izin  = $a->total;
                if ($a->status == 'TK') $siswa->absen_alpha = $a->total;
                if ($a->status == 'H') $siswa->absen_hadir = $a->total;
            }
        }

        $ekstraList = $db->table('ekstra')->get()->getResult();

        $data = [
            'title'       => 'Input Nilai Sikap',
            'siswa'       => $siswaList,
            'rombel'      => $rombelInfo,
            'tahun'       => $tahunAktif,
            'id_semester' => $id_semester,
            'id_rombel'   => $id_rombel,
            'id_tahun'    => $id_tahun,
            'ekstraList'  => $ekstraList,
        ];

        echo view('header');
        echo view('menu');
        echo view('nilai_siswa/nilai_kelas', $data);
        echo view('footer');
    }

    public function simpan_nilai()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect();

        $input_by = session()->get('id');

        $id_siswa   = $request->getPost('id_siswa');
        $spiritual  = $request->getPost('sikap_spiritual');
        $sosial     = $request->getPost('sikap_sosial');
        $catatan    = $request->getPost('catatan_wali');

        $tahun = $db->table('tahun')
                    ->where('status', 'Aktif')
                    ->get()
                    ->getRow();

        $id_tahun = $tahun->id_tahun;

        $semester = $db->table('semester')
                    ->where('status', 'Aktif')
                    ->get()
                    ->getRow();

        $id_semester = $semester->id_semester;

        foreach ($id_siswa as $i => $id) {

            $data = [
                'id_siswa'         => $id,
                'sikap_spiritual'  => $spiritual[$i],
                'sikap_sosial'     => $sosial[$i],
                'catatan_wali'     => $catatan[$i],
                'id_tahun'         => $id_tahun,
                'id_semester'      => $id_semester,
                'input_by'         => $input_by,
            ];

            $cek = $db->table('nilai_sikap')
                    ->where('id_siswa', $id)
                    ->where('id_tahun', $id_tahun)
                    ->where('id_semester', $id_semester)
                    ->get()
                    ->getRow();

            if ($cek) {
                $db->table('nilai_sikap')
                ->where('id', $cek->id)
                ->update($data);
            } else {
                $db->table('nilai_sikap')->insert($data);
            }
        }

        return redirect()->back()->with('success', 'Data nilai sikap berhasil disimpan.');
    }

    public function update_sikap()
    {
        $nis   = $this->request->getPost('nis');
        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');

        $db = \Config\Database::connect();

        $siswa = $db->table('siswa')->where('nis', $nis)->get()->getRow();
        if (!$siswa) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['message' => 'Siswa tidak ditemukan']);
        }

        $tahun = $db->table('tahun')
            ->where('status', 'Aktif')
            ->get()->getRow();

        $semester = $db->table('semester')
            ->where('status', 'Aktif')
            ->get()->getRow();

        $id_tahun    = $tahun->id_tahun ?? 1;
        $id_semester = $semester->id_semester ?? 1;

        $existing = $db->table('nilai_sikap')
            ->where([
                'id_siswa'    => $siswa->id_siswa,
                'id_tahun'    => $id_tahun,
                'id_semester' => $id_semester
            ])
            ->get()->getRow();

        if ($existing) {
            $db->table('nilai_sikap')
                ->where('id', $existing->id)
                ->update([
                    $field => $value
                ]);
        } else {
            $db->table('nilai_sikap')->insert([
                'id_siswa'    => $siswa->id_siswa,
                'id_tahun'    => $id_tahun,
                'id_semester' => $id_semester,
                $field        => $value
            ]);
        }

        return $this->response->setJSON(['message' => 'Berhasil']);
    }

    public function simpan_ekstra()
    {
        $id_siswa   = $this->request->getPost('id_siswa');
        $id_ekstra  = $this->request->getPost('id_ekstra');
        $nilai      = $this->request->getPost('nilai');
        $keterangan = $this->request->getPost('keterangan');
        $input_by   = $this->request->getPost('input_by');

        if (!$id_siswa || !$id_ekstra || !$nilai) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Data tidak lengkap'
            ]);
        }

        $db = \Config\Database::connect();

        $tahun = $db->table('tahun')
            ->where('status', 'Aktif')
            ->get()->getRow();

        $semester = $db->table('semester')
            ->where('status', 'Aktif')
            ->get()->getRow();

        $data = [
            'id_siswa'    => $id_siswa,
            'id_ekstra'   => $id_ekstra,
            'nilai'       => $nilai,
            'keterangan'  => $keterangan,
            'id_tahun'    => $tahun->id_tahun ?? 1,
            'id_semester' => $semester->id_semester ?? 1,
            'input_by'    => $input_by,
        ];

        $model = new ModelEkstra();
        $model->save($data);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        if ($id) {
            $db = \Config\Database::connect();
            $db->table('nilai_ekstra')->where('id', $id)->delete();
        }

        return redirect()->back()->with('success', 'Nilai ekstrakurikuler berhasil dihapus.');
    }

    public function get_ekstra_detail()
    {
        $siswa = $this->db->table('siswa')
            ->select('siswa.*, jabatan.nama_jabatan')
            ->join('jabatan', 'jabatan.id_jabatan = siswa.id_jabatan', 'left')
            ->get()->getResult();

        foreach ($siswa as &$s) {
            $s->ekstra = $this->db->table('nilai_ekstra')
                ->join('ekstrakurikuler', 'ekstrakurikuler.id_ekstra = nilai_ekstra.id_ekstra')
                ->where('id_siswa', $s->id_siswa)
                ->get()->getResult();
        }

        return $siswa;
    }

    public function nilai_saya()
    {
        $db      = \Config\Database::connect();
        $request = \Config\Services::request();

        $level = session()->get('level');
        $idUser = session()->get('id_user');

        if ($level != 4) {
            return redirect()->to(base_url('pilih_rombel'));
        }

        $id_semester = $request->getGet('id_semester');
        if (!$id_semester) {
            return redirect()->to(base_url('pilih_rombel'));
        }

        $siswa = $db->table('siswa')
            ->select('id_siswa, nis, nama_siswa, rombel')
            ->where('user', $idUser)
            ->get()
            ->getRow();

        if (!$siswa) {
            session()->setFlashdata('error', 'Data siswa tidak ditemukan.');
            return redirect()->to(base_url('pilih_rombel'));
        }

        $tahunAktif = $db->table('tahun')->where('status', 'Aktif')->get()->getRow();
        $id_tahun = $tahunAktif->id_tahun ?? 6;

        $sikap = $db->table('nilai_sikap')
            ->where([
                'id_siswa'    => $siswa->id_siswa,
                'id_tahun'    => $id_tahun,
                'id_semester' => $id_semester
            ])
            ->get()->getRow();

        $siswa->sikap_spiritual = $sikap->sikap_spiritual ?? '-';
        $siswa->sikap_sosial    = $sikap->sikap_sosial ?? '-';
        $siswa->catatan_wali    = $sikap->catatan_wali ?? '-';

        $ekstraList = $db->table('nilai_ekstra')
            ->select('nilai_ekstra.id, ekstra.nama_ekstra, nilai_ekstra.nilai, nilai_ekstra.keterangan')
            ->join('ekstra', 'ekstra.id_ekstra = nilai_ekstra.id_ekstra')
            ->where([
                'nilai_ekstra.id_siswa'    => $siswa->id_siswa,
                'nilai_ekstra.id_tahun'    => $id_tahun,
                'nilai_ekstra.id_semester' => $id_semester
            ])
            ->get()->getResult();

        $data = [
            'title'        => 'Nilai Saya',
            'siswa'        => $siswa,
            'ekstraList'   => $ekstraList,
            'tahun'        => $tahunAktif,
            'id_semester'  => $id_semester,
            'id_tahun'     => $id_tahun
        ];

        echo view('header');
        echo view('menu');
        echo view('nilai_siswa/nilai_saya', $data);
        echo view('footer');
    }

}
