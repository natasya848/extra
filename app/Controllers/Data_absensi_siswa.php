<?php

namespace App\Controllers;
use App\Models\Universal\M_perizinan;
use App\Models\Universal\M_model;
use App\Models\Universal\MenuModel;

class Data_absensi_siswa extends BaseController
{
    public function __construct()
    {
        $this->menuModel = new MenuModel();
        $this->session = session();
         $this->db = \Config\Database::connect();
        helper(['url', 'log']);
    }
    // public function index()
    // {
    //     if (session()->get('level') == 4 || session()->get('level') == 5) {
    //         $model = new M_model();
    //         $model2 = new M_perizinan();

    //         $blok = $this->request->getPost('blok');
    //         $tahun = $this->request->getPost('tahun');
    //         $rombel = $this->request->getPost('rombel');
    //         $semester = $this->request->getPost('semester');

    //         $idSiswa = session()->get('id');
    //         $siswaData = $model2->getSiswaData($idSiswa);

    //         if ($siswaData) {
    //             $siswa_id = $siswaData['id_siswa'];  
    //         }

    //         $data['a'] = $model->getDataByFilter3($blok, $tahun, $rombel, $semester, $siswa_id);
    //         $data['title'] = 'Data Absensi';

    //         echo view('partial/header_datatable', $data);
    //         echo view('partial/side2');
    //         echo view('partial/top_menu');
    //         echo view('data_absensi_siswa/view', $data);
    //         echo view('partial/footer_datatable');
    //     } else {
    //         return redirect()->to('login');
    //     }
    // }

    public function index()
    {
        if (session()->get('level') == 4 || session()->get('level') == 5) {
            $model = new M_model();
            $model2 = new M_perizinan(); 
            $level = session()->get('level');
            $id_user = session()->get('id');
            $id_jabatan = $this->menuModel->getJabatanByLevel($level);

            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getStructuredMenusWithAccess($level, $id_jabatan);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);

            $blok = $this->request->getPost('blok');
            $tahun = $this->request->getPost('tahun');
            $rombel = $this->request->getPost('rombel');
            $semester = $this->request->getPost('semester');

            $idUser = session()->get('id');
            $siswaData = $model2->getSiswaData2($idUser);

            if (!$siswaData) {
                return redirect()->to('login');
            }

            $siswa_id = $siswaData['id_siswa'];
            $rombelSiswa = $siswaData['rombel'];
            $blokSiswa = $siswaData['blok'];
            $tahunSiswa = $siswaData['tahun'];

            if (session()->get('level') == 4) {
                $data['a'] = $model->getDataByFilter3($blok, $tahun, $rombel, $semester, $siswa_id);
            }

            if (session()->get('level') == 5) {
                $data['a'] = $model->getDataByFilterRombel($blok ?? $blokSiswa, $tahun ?? $tahunSiswa, $rombel ?? $rombelSiswa, $semester);
            }

            $data['title'] = 'Data Absensi';
            echo view('partial/header_datatable', $data);
            echo view('partial/side2', $akses);
            echo view('partial/top_menu');
            echo view('data_absensi_siswa/view', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

    public function menu()
    {
        if (session()->get('level') == 4 || session()->get('level') == 5) {
            $model=new M_perizinan();
            $level = session()->get('level');
            $id_user = session()->get('id');
            $id_jabatan = $this->menuModel->getJabatanByLevel($level);

            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getStructuredMenusWithAccess($level, $id_jabatan);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);
            
            $data['blok'] = $model->tampil2('blok');
            $data['tahun'] = $model->tampil2('tahun');

            $rombelDetails = $model->getAllRombel();
            $data['rkj'] = $rombelDetails;

            $data['semester'] = $model->tampil2('semester');

            $title['title']='Filter Data Absensi';

            echo view('partial/header_datatable', $title);
            echo view('partial/side2', $akses);
            echo view('partial/top_menu');
            echo view('data_absensi_siswa/menu', $data);
            echo view('partial/footer_datatable');    
        }else {
            return redirect()->to('login');
        }

    }

}