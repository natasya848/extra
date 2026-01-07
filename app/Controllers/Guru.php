<?php

namespace App\Controllers;

use App\Models\M_guru;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Guru extends BaseController
{
    public function index()
    {
        $model = new M_guru();
        $rombelDetails = $model->getAllRombelDetails();
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Data Guru',
            'a'  => $rombelDetails
        ];

        echo view('header');
        echo view('menu');
        echo view('data_guru/view', $data);
        echo view('footer');
    }

    public function tambah_guru()
    {
		$model = new M_guru();
        $rombelDetails = $model->getAllRombel();

        $data = [
            'title' => 'Tambah Guru',
            'a' => $rombelDetails,
            'c' => $model->tampil('jenjang'),
            'j' => $model->tampil('jabatan_guru'),
        ];

        echo view('header');
        echo view('menu');
        echo view('data_guru/create', $data);
        echo view('footer');
    }

    public function aksi_tambah_guru()
    {
        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $jenjang = $this->request->getPost('jenjang');
        $rombel = $this->request->getPost('rombel');
        $jabatan = $this->request->getPost('jabatan');
        $a = $this->request->getPost('username');
        $b = $this->request->getPost('password');
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $imageName = $foto->getName();
            $foto->move('images/', $imageName);
        } else {
            $imageName = 'default.png';
        }

        $data1 = array(
            'username' => $a,
            'password' => md5($b),
            'level' => '3',
            'foto' => $imageName,
            'jenjang' => $jenjang,
            'jabatan' => $jabatan,
            'created_at' => date('Y-m-d H:i:s')

        );
        $darrel = new M_guru();
        $darrel->simpan('user', $data1);
        $where = array('username' => $a);
        $ae = $darrel->getWhere2('user', $where);
        $id = $ae['id_user'];
        $data2 = array(
            'nik' => $nik,
            'nama' => $nama,
            'rombel' => $rombel,
            'user' => $id,
            'created_at' => date('Y-m-d H:i:s')

        );
        $darrel->simpan('guru', $data2);

        return redirect()->to('guru');
    }

    public function edit_guru($user)
    {
        $model = new M_guru();
        $rombelDetails = $model->getAllRombel();
        $where = array('user' => $user);
        $where2 = array('id_user' => $user);

        $data = [
            'title' => 'Edit Guru',
            'a' => $rombelDetails,
            'c' => $model->tampil('jenjang'),
            'j' => $model->tampil('jabatan_guru'),
            'jojo'  => $model->getWhere('guru', $where),
            'rizkan' => $model->getWhere('user', $where2)
        ];

        echo view('header');
        echo view('menu');
        echo view('data_guru/edit', $data);
        echo view('footer');
    }

    public function aksi_edit_guru()
    {
        $nik = $this->request->getPost('nik');
        $a = $this->request->getPost('username');
        $nama = $this->request->getPost('nama');
        $rombel = $this->request->getPost('rombel');
        $id = $this->request->getPost('id');
        $id2 = $this->request->getPost('id2');
        $jenjang = $this->request->getPost('jenjang');
        $jabatan = $this->request->getPost('jabatan');
        $foto = $this->request->getFile('foto');

        $imageName = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $imageName = $foto->getName();
            $foto->move('images/', $imageName);
        }

        $where = array('id_user' => $id);
        $data1 = array(
            'username' => $a,
            'jenjang' => $jenjang,
            'jabatan' => $jabatan
        );

        if ($imageName) {
            $data1['foto'] = $imageName;
        }

        $darrel = new M_guru();
        $darrel->qedit('user', $data1, $where);
        $where2 = array('user' => $id2);
        $data2 = array(
            'nik' => $nik,
            'nama' => $nama,
            'rombel' => $rombel

        );
        $darrel->qedit('guru', $data2, $where2);
        return redirect()->to('guru');
    }
    public function delete_guru($id)
    {
        $model = new M_guru();
        $where = array('user' => $id);
        $where2 = array('id_user' => $id);
        $model->hapus('guru', $where);
        $model->hapus('user', $where2);
        return redirect()->to('guru');
    }
}
