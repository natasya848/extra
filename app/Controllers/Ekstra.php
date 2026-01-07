<?php

namespace App\Controllers;
use App\Models\M_ekstra;
use App\Models\M_model;

class Ekstra extends BaseController
{
    public function index()
    {
        $model = new M_model();
        $modelj = new M_ekstra();
        $id_user = session()->get('id');

        $data = [
            'title' => 'Data Ekstrakulikuler',
            'ekstra'  =>  $modelj->getAllWithGuru(),
        ];

        echo view('header');
        echo view('menu');
        echo view('ekstra/v_ekstra', $data);
        echo view('footer');
    }

    public function tambah_ekstra()
    {
        $id_user = session()->get('id');
		$model = new M_model();
        $modelj = new M_ekstra();

        $data = [
            'title' => 'Tambah Ekstrakulikuler',
            'guru'   => $model->tampil('guru'),
        ];

        echo view('header');
        echo view('menu');
        echo view('ekstra/tambah_ekstra', $data);
        echo view('footer');
    }

    public function aksi_tambah_ekstra()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new M_model();

            $data = [
                'nama_ekstra'  => $this->request->getPost('nama_ekstra'),
                'pembina'      => $this->request->getPost('pembina'),
                'hari'         => $this->request->getPost('hari'),
                'jam_mulai'    => $this->request->getPost('jam_mulai'),
                'jam_selesai'  => $this->request->getPost('jam_selesai'),
                'keterangan'   => $this->request->getPost('keterangan'),
                'status'       => 'Aktif',
            ];

            $model->simpan('ekstra', $data); 

            session()->setFlashdata('success', 'Data ekstra berhasil ditambahkan.');
            return redirect()->to('ekstra/index');
        }
    }

    public function edit_ekstra($id)
    {
        $modelj = new M_Ekstra(); 
        $modelGuru = new M_guru();

        $data['title'] = 'Edit Ekstrakurikuler';
        $data['ekstra'] = $modelj->where('id_ekstra', $id)->first();
        $data['guru'] = $modelGuru->findAll(); // ambil semua guru
        $data['group'] = $this->menuModel->getGroup(session()->get('level'));
        $data['menus'] = $this->menuModel->getMenusWithAccess(session()->get('level'));

        echo view('partial/header_datatable', $data);
        // echo view('partial/side1', $data);
        echo view('partial/top_menu');
        echo view('ekstra/edit_ekstra', $data);
        // echo view('partial/footer_form');
    }

    public function aksi_edit_ekstra()
    {
        $id = $this->request->getPost('id_ekstra');

        $data = [
            'nama_ekstra'  => $this->request->getPost('nama_ekstra'),
            'pembina'      => $this->request->getPost('pembina'),
            'hari'         => $this->request->getPost('hari'),
            'jam_mulai'    => $this->request->getPost('jam_mulai'),
            'jam_selesai'  => $this->request->getPost('jam_selesai'),
            'keterangan'   => $this->request->getPost('keterangan'),
            'status'       => $this->request->getPost('status')
        ];

        $model = new M_model();
        $model->qedit('ekstra', $data, ['id_ekstra' => $id]);

        return redirect()->to('ekstra');
    }

	public function delete_ekstra($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2 ||  session()->get('level')==3){
			$model=new m_model();
			$where=array('id_ekstra'=>$id);
			$model->hapus('ekstra',$where);
			return redirect()->to('ekstra');
		}else{
			return redirect()->to('login');
		}
	}
}
