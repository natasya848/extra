<?php

namespace App\Controllers;

use App\Models\M_user;

class User extends BaseController
{
    public function index()
    {
        // $role = session()->get('role');
        // if (!in_array($role, ['Admin'])) {
        //     return redirect()->to('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        // }

        $model = new M_user();
        $data = [
            'title' => 'Data User',
            'user'  => $model->findAll(), 
        ];

        echo view('header');
        echo view('menu');
        echo view('user/v_user', $data); 
        echo view('footer');
    }

    public function edit_user($id)
    {   
        $M_user = new M_user();

        $data = [
            "password" => md5('1111') 
        ];

        $M_user->update($id, $data);

        $db = \Config\Database::connect();
        $user = $db->table('user')->where('id_user', $id)->get()->getRowArray();

        // if ($user) {
        //     $this->logActivity("Reset password untuk user: " . $user['email']);
        // } else {
        //     $this->logActivity("Reset password gagal, user dengan ID $id tidak ditemukan.");
        // }

        return redirect()->to('user');
    }

    public function detail($id)
    {
        $session = session();
        $user_id = $session->get('id_user'); 
        $user_level = $session->get('role'); 

        // $logModel = new \App\Models\M_log();
        $M_user = new M_user();

        $user = $M_user->getUserById($id);

        // if (!$user) {
        //     $logModel->saveLog($user_id, "id_user={$user_id} tidak menemukan data user ID {$id}", $ip_address);
        //     return redirect()->to(base_url('user/tabel_user'))->with('error', 'Data user tidak ditemukan.');
        // }

        // $logModel->saveLog($user_id, "id_user={$user_id} berhasil melihat detail user ID {$id}", $ip_address);

        $data = [
            'title' => 'Detail User',
            'user' => $user
        ];

        echo view('header');
        echo view('menu');
        echo view('user/detail', $data); 
        echo view('footer');
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah User',
        ];

        echo view('header');
        echo view('menu');
        echo view('user/tambah_user', $data); 
        echo view('footer');
    }

    public function simpan()
    {
        $userModel = new M_user();

        $userModel->save([
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'role'     => $this->request->getPost('role'),
            // 'created_by' => session()->get('id_user'),
        ]);

        return redirect()->to('user')->with('success', 'Data disimpan');
    }

}
