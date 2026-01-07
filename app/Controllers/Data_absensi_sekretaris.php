<?php

namespace App\Controllers;

use App\Models\Universal\Amodel;
use App\Models\Universal\BlokModel;
use App\Models\Universal\TahunModel;
use App\Models\Universal\SiswaModel;
use App\Models\Universal\PerizinanModel;
use App\Models\Universal\MenuModel;

class Data_absensi_sekretaris extends BaseController
{
    public function __construct()
    {
        $this->menuModel = new MenuModel();
        $this->session = session();
         $this->db = \Config\Database::connect();
        helper(['url', 'log']);
    }
    public function index()
    {
        if (session()->get('level') == 5) {
            $model = new Amodel();
            $level = session()->get('level');
            $id_user = session()->get('id');
            $id_jabatan = $this->menuModel->getJabatanByLevel($level);

            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getStructuredMenusWithAccess($level, $id_jabatan);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);
            
            if ($this->request->getMethod() === 'post') {
                $tanggal = $this->request->getPost('tanggal') ?? date('Y-m-d');

                $blokModel = new BlokModel();
                $blok = $blokModel->where('statuss', 'Aktif')->first();

                $tahunModel = new TahunModel();
                $tahun = $tahunModel->where('status', 'Aktif')->first();

                $siswaModel = new SiswaModel();

                $idSiswa = session()->get('id');
                $sekreData = $siswaModel->getSekreData($idSiswa);
                $siswa_id = $sekreData['id_siswa']; 
                $rombel = $sekreData['rombel'];

                $siswaData = $siswaModel->getSiswaData($rombel);

                $perizinanModel = new PerizinanModel();
                $statusPerizinan = $perizinanModel->getStatusPerizinan($tanggal);

                foreach ($siswaData as &$siswa) {
                    $siswa['status'] = 'H';
                }
                unset($siswa); 

                foreach ($siswaData as $siswa) {
                $statusInput = $this->request->getPost('status')[$siswa['id_siswa']];

                if ($statusInput === 'H') {
                    $status = 'H'; 
                } elseif ($statusInput === 'S') {
                    $status = 'S'; 
                } elseif ($statusInput === 'I') {
                    $status = 'I'; 
                } else {
                    $status = 'TK'; 
                }

            foreach ($statusPerizinan as $perizinan) {
                if ($perizinan['siswa'] == $siswa['id_siswa']) {
                    $status = $perizinan['status'];
                    break;
                }
            }

            $persen = ($status == 'H') ? 2 : (($status == 'I' || $status == 'S') ? 1 : 0);

            $data = [
                'siswa' => $siswa['id_siswa'],
                'tanggal' => $tanggal,
                'status' => $status,
                'rombel' => $siswa['rombel'],
                'blok' => $blok['id_blok'],
                'tahun' => $tahun['id_tahun'],
                'persen' => $persen,
            ];

                $existing = $model->where([
                    'siswa' => $siswa['id_siswa'],
                    'tanggal' => $tanggal
                ])->first();

                if ($existing) {
                    $model->update($existing['id_absen'], $data);
                } else {
                    $model->insert($data);
                }
                }

                return redirect()->to('data_absensi_sekretaris');
            }

            $siswaModel = new SiswaModel();

            $idSiswa = session()->get('id');
            $sekreData = $siswaModel->getSekreData($idSiswa);
            $siswa_id = $sekreData['id_siswa']; 
            $rombel = $sekreData['rombel'];

            $siswaData = $siswaModel->getSiswaData($rombel);
            
            $data['title'] = 'Data Absensi';
            $data['siswaData'] = $siswaData;
            
            echo view('partial/header_datatable', $data);
            echo view('partial/side2', $akses);
            echo view('partial/top_menu');
            echo view('absen/absen_sekre', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to('landing_page_erp');
    }

    public function dashboard()
    {
        if (session()->get('id') > 0) {
            echo view('landing_page_erp/dashboard');
        } else {
            return redirect()->to('landing_page_erp');
        }
    }

}
