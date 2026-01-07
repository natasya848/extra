<?php

namespace App\Controllers;
use App\Models\M_laporan;

class Home extends BaseController
{

    public function index()
    {
        // $mobilModel = new M_mobil();
        // $mobil = $mobilModel->where('status', 'Tersedia')->findAll();

        // $data = [
        //     'title' => 'Anugrah Mobilindo Batam | Showroom Mobil Terpercaya',
        //     'mobil' => $mobil
        // ];

        return view('Darurat/pageuser/index');
    }
}
