<?php

namespace App\Controllers;
use App\Models\M_task;
use App\Models\M_user;

class Home extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('menu');
        echo view('dashboard');
        echo view('footer');
    }

    public function user()
    {
        $taskModel = new M_task();
        $id_user   = session()->get('id_user');

        $tasks = $taskModel
            ->where('id_user', $id_user)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $totalTask = $taskModel->where('id_user', $id_user)->countAllResults();
        $taskDone  = $taskModel->where([
                            'id_user' => $id_user,
                            'status'  => 'Selesai'
                        ])->countAllResults();

        $taskPending = $totalTask - $taskDone;

        $data = [
            'title'        => 'Dashboard',
            'tasks'        => $tasks,
            'totalTask'    => $totalTask,
            'taskDone'     => $taskDone,
            'taskPending'  => $taskPending
        ];

        return view('user/dashboard', $data);
    }

    public function profile()
    {
        $userModel = new M_user();
        $id_user = session()->get('id_user');

        $user = $userModel->find($id_user);

        if (!$user) {
            return redirect()->to('home')->with('error', 'User tidak ditemukan');
        }

        $data = [
            'title' => 'Profile',
            'user'  => $user
        ];

        return view('user/profile', $data);
    }

    public function updateProfile()
    {
        $userModel = new M_user();
        $id_user = session()->get('id_user');

        $rules = [
            'nama'  => 'required',
            'email' => 'required',
        ];

        if ($this->request->getPost('password') != '') {
            $rules['password'] = 'required';
            $rules['confirm_password'] = 'required';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data tidak valid');
        }

        $data = [
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->request->getPost('password') != '') {
            $data['password'] = md5($this->request->getPost('password'));
        }

        $userModel->update($id_user, $data);

        return redirect()->to('profile')
            ->with('success', 'Profil berhasil diperbarui');
    }

    
}
