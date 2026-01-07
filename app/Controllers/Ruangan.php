<?php

namespace App\Controllers;

use App\Models\M_model;

class Ruangan extends BaseController
{
	public function kelas()
    {
        $model = new M_model();
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Data Kelas',
            'kelas'  => $model->tampil('kelas'),
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/table_kelas', $data);
        echo view('footer');
    }

	public function tambah_kelas()
    {
		$model = new M_model();

        $data = [
            'title' => 'Tambah Kelas',
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/tambah_kelas', $data);
        echo view('footer');
    }

	public function aksi_tambah_kelas()
	{
		$a = $this->request->getPost('nama_kelas');

		$simpan = array(
			'nama_kelas' => $a,
			'created_at' => date('Y-m-d H:i:s')
		);
		$model = new M_model();
		$model->simpan('kelas', $simpan);
		return redirect()->to('kelas');
	}

	public function edit_kelas($id)
    {
        $model = new M_model();
        $where = array('id_kelas' => $id);

        $data = [
            'title' => 'Edit Kelas',
            'jojo'  => $model->getWhere('kelas', $where)
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/edit_kelas', $data);
        echo view('footer');
    }

	public function aksi_edit_kelas($id)
	{
		$id = $this->request->getPost('id');
		$a = $this->request->getPost('nama_kelas');


		$where = array('id_kelas' => $id);
		$simpan = array(
			'nama_kelas' => $a,
		);
		$model = new M_model();
		$model->qedit('kelas', $simpan, $where);
		return redirect()->to('kelas');
	}

	public function delete_kelas($id)
	{
		$model = new M_model();
		$where = array('id_kelas' => $id);
		$model->hapus('kelas', $where);
		return redirect()->to('kelas');
	}


	public function jurusan()
    {
        $model = new M_model();
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Data Jurusan',
            'jurusan'  => $model->tampil('jurusan'),
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/table_jurusan', $data);
        echo view('footer');
    }

	public function tambah_jurusan()
    {
		$model = new M_model();

        $data = [
            'title' => 'Tambah Jurusan',
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/tambah_jurusan', $data);
        echo view('footer');
    }

	public function aksi_tambah_jurusan()
	{
		$a = $this->request->getPost('nama_jurusan');

		$simpan = array(
			'nama_jurusan' => $a,
			'created_at' => date('Y-m-d H:i:s')
		);
		$model = new M_model();
		$model->simpan('jurusan', $simpan);
		return redirect()->to('jurusan');
	}

	public function edit_jurusan($id)
    {
        $model = new M_model();
        $where = array('id_jurusan' => $id);

        $data = [
            'title' => 'Edit Jurusan',
            'jojo'  => $model->getWhere('jurusan', $where)
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/edit_jurusan', $data);
        echo view('footer');
    }

	public function aksi_edit_jurusan($id)
	{
		$id = $this->request->getPost('id');
		$a = $this->request->getPost('nama_jurusan');


		$where = array('id_jurusan' => $id);
		$simpan = array(
			'nama_jurusan' => $a

		);
		$model = new M_model();
		$model->qedit('jurusan', $simpan, $where);
		return redirect()->to('jurusan');
	}

	public function delete_jurusan($id)
	{
		$model = new M_model();
		$where = array('id_jurusan' => $id);
		$model->hapus('jurusan', $where);
		return redirect()->to('jurusan');
	}
	

	public function rombel()
    {
        $model = new M_model();
        $id_user = session()->get('id_user');

		$on1 = 'rombel.kelas = kelas.id_kelas';
		$on2 = 'rombel.jurusan = jurusan.id_jurusan';
		$on3 = 'rombel.jenjang = jenjang.id_jenjang';

        $data = [
            'title' => 'Data Rombel',
            'rombel'  => $model->join4('rombel', 'kelas', 'jurusan', 'jenjang', $on1, $on2, $on3)
				   ->orderBy('rombel.created_at', 'desc')
				   ->get()
				   ->getResult(),
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/table_rombel', $data);
        echo view('footer');
    }

	public function tambah_rombel()
    {
		$model = new M_model();

        $data = [
            'title' => 'Tambah Rombel',
			'g' => $model->tampil('kelas'),
			'a' => $model->tampil('jurusan'),
			'jenjang' => $model->tampil('jenjang'),
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/tambah_rombel', $data);
        echo view('footer');
    }

	public function aksi_tambah_rombel($id)
	{
		$a = $this->request->getPost('kelas');
		$b = $this->request->getPost('jurusan');
		$c = $this->request->getPost('nama');
		$d = $this->request->getPost('jenjang');

		$simpan = array(
			'kelas' => $a,
			'jurusan' => $b,
			'jenjang' => $d,
			'nama_r' => $c,
			'created_at' => date('Y-m-d H:i:s')
		);

		$model = new M_model();
		$model->simpan('rombel', $simpan);

		return redirect()->to('rombel');
	}

	public function edit_rombel($id)
    {
        $model = new M_model();

        $data = [
            'title' => 'Edit Rombel',
            'g'       => $model->tampil('kelas'),      
			'a'       => $model->tampil('jurusan'),   
			'j'       => $model->tampil('jenjang'),    
			'jojo'    => $model->getWhere('rombel', ['id_rombel' => $id])
        ];

        echo view('header');
        echo view('menu');
        echo view('ruangan/edit_rombel', $data);
        echo view('footer');
    }

	public function aksi_edit_rombel()
	{
		$model = new M_model();

		$id_rombel = $this->request->getPost('id');
		$data_update = [
			'kelas'   => $this->request->getPost('kelas'),
			'jurusan' => $this->request->getPost('jurusan'),
			'jenjang' => $this->request->getPost('jenjang'), 
			'nama_r'  => $this->request->getPost('nama'),
		];

		$model->qedit('rombel', $data_update, ['id_rombel' => $id_rombel]);

		return redirect()->to('rombel');
	}

	public function delete_rombel($id)
	{
		$model = new M_model();
		$where = array('id_rombel' => $id);
		$model->hapus('rombel', $where);
		return redirect()->to('rombel');
	}
}
