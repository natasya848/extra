<?php

namespace App\Controllers;
use App\Models\Universal\M_siswa;

class Data_siswa_guru extends BaseController
{

    public function index()
    {
     $level = session()->get('level');
     $id_user = session()->get('id');
     $data['title']='Data Siswa';

     $model = new M_siswa();
     $data['a'] = [];

     if ($level == 1 || $level == 2 || $level == 3) {
        if ($level == 3) {
            $data['a'] = $model->getAllRombelDetaial($id_user);
        } else {
            $data['a'] = $model->getAllPData();
        }
    }

    echo view('partial/header_datatable', $data);
    echo view('partial/side_menu');
    echo view('partial/top_menu');
    echo view('data_siswa/view_guru', $data);
    echo view('partial/footer_datatable');
}

}