<?php

namespace App\Controllers;

use App\Models\M_task;
use CodeIgniter\Controller;

class Task extends Controller
{
    public function index()
    {
        $model = new M_task();
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'To Do List',
            'list'  => $model->where('id_user', $id_user)->findAll(),
        ];

        echo view('header');
        echo view('menu');
        echo view('list/table', $data);
        echo view('footer');
    }

    public function selesai($id)
    {
        $model = new M_task();
        $model->update($id, ['status' => 'Selesai']);

        return redirect()->back()->with('success', 'Tugas diselesaikan');
    }

    public function hapus($id)
    {
        $model = new M_task();
        $model->delete($id);

        return redirect()->back()->with('success', 'Tugas dihapus');
    }

    public function tambah()
    {
        $role = session()->get('role');

        if ($role == 'user') {
            $data = [
                'title' => 'Tambah Task',
            ];
            echo view('user/tambah_task', $data);
        } else {
            $data = [
                'title' => 'Tambah List',
            ];
            echo view('header');
            echo view('menu');
            echo view('list/tambah_task', $data);
            echo view('footer');
        }
    }

    public function simpan()
    {
        $model = new M_task();
        $session = session();

        if (!$this->validate([
            'nama_tugas' => 'required',
            'prioritas'  => 'required',
            'tanggal'    => 'required'
        ])) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Data tidak boleh kosong');
        }

        $data = [
            'id_user'    => $session->get('id_user'),
            'nama_tugas' => $this->request->getPost('nama_tugas'),
            'prioritas'  => $this->request->getPost('prioritas'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'status'     => $this->request->getPost('status') ?? 'Belum'
        ];

        $model->insert($data);

        $role = $session->get('role');
        if ($role == 'user') {
            return redirect()->to('home/user')
                            ->with('success', 'Task berhasil ditambahkan');
        } else {
            return redirect()->to('task')
                            ->with('success', 'Task berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $model = new M_task();
        $id_user = session()->get('id_user');

        $task = $model->where([
            'id_task' => $id,
            'id_user' => $id_user
        ])->first();

        if (!$task) {
            $role = session()->get('role');
            if ($role == 'user') {
                return redirect()->to('home/user')
                                ->with('error', 'Task tidak ditemukan');
            } else {
                return redirect()->to('task')
                                ->with('error', 'Task tidak ditemukan');
            }
        }

        $data = [
            'title' => 'Task',
            'task'  => $task
        ];

        $role = session()->get('role');
        if ($role == 'user') {
            echo view('user/edit_task', $data);
        } else {
            echo view('header');
            echo view('menu');
            echo view('list/edit_task', $data);
            echo view('footer');
        }
    }

    public function update($id)
    {
        $model = new M_task();
        $session = session();

        if (!$this->validate([
            'nama_tugas' => 'required',
            'prioritas'  => 'required',
            'tanggal'    => 'required',
            'status'     => 'required'
        ])) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Data tidak boleh kosong');
        }

        $data = [
            'nama_tugas' => $this->request->getPost('nama_tugas'),
            'prioritas'  => $this->request->getPost('prioritas'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'status'     => $this->request->getPost('status')
        ];

        $model->where([
            'id_task' => $id,
            'id_user' => $session->get('id_user')
        ])->set($data)->update();

        $role = $session->get('role');
        if ($role == 'user') {
            return redirect()->to('home/user')
                            ->with('success', 'Task berhasil diperbarui');
        } else {
            return redirect()->to('task')
                            ->with('success', 'Task berhasil diperbarui');
        }
    }

}
