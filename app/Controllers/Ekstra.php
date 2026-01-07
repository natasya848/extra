<?php

namespace App\Controllers;
use App\Models\M_ekstra;
use App\Models\M_model;
use App\Models\M_guru;
use App\Models\PendaftaranEkstraModel;
use App\Models\Universal\SemesterModel;
use App\Models\Universal\TahunModel;
use App\Models\Universal\SiswaModel;


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
        if ($this->request->getMethod() !== 'post') {

        $model = new M_model();

        $data = [
            'nama_ekstra' => $this->request->getPost('nama_ekstra'),
            'pembina' => $this->request->getPost('pembina'),
            'hari' => $this->request->getPost('hari'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => 'Aktif'
        ];

        $model->simpan('ekstra', $data);
        session()->setFlashdata('success', 'Data ekstra berhasil ditambahkan.');
        return redirect()->to('ekstra');
    }
    }

    public function edit_ekstra($id)
    {
        $modelj = new M_Ekstra();
        $modelGuru = new M_guru();

        $data = [
            'title' => 'Edit Ekstrakulikuler',
            'ekstra'  => $modelj->where('id_ekstra',$id)->first(),
            'guru' => $modelGuru->findAll(),
        ];

        echo view('header');
        echo view('menu');
        echo view('ekstra/edit_ekstra', $data);
        echo view('footer');
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

    public function daftar()
    {
        $id_user = session()->get('id_user');
        if (!$id_user) {
            return redirect()->to('login');
        }

        $semester = (new SemesterModel())->where('status','Aktif')->first();
        $tahun    = (new TahunModel())->where('status','Aktif')->first();

        $siswa = (new SiswaModel())
            ->where('user', $id_user)
            ->first();

        if (!$siswa) {
            return redirect()->to('/home')
                ->with('error', 'Akun ini bukan akun siswa');
        }

        $data['totalEkskul'] = (new PendaftaranEkstraModel())
        ->where('id_siswa', $siswa['id_siswa'])
        ->where('id_semester', $semester['id_semester'])
        ->where('id_tahun', $tahun['id_tahun'])
        ->countAllResults();

        $data['ekstra'] = (new M_ekstra())
            ->where('status', 'Aktif')
            ->findAll();

        echo view('header');
        echo view('menu');
        echo view('siswa/daftar', $data);
        echo view('footer');
    }

    public function simpanDaftar()
    {
        $id_user = session()->get('id_user');
        if (!$id_user) {
            return redirect()->to('login');
        }

        $siswa = (new SiswaModel())
            ->where('user', $id_user)
            ->first();

        if (!$siswa) {
            return redirect()->to('home');
        }

        $semester = (new SemesterModel())->where('status','Aktif')->first();
        $tahun    = (new TahunModel())->where('status','Aktif')->first();

        if (!$semester || !$tahun) {
            return redirect()->back()
                ->with('error', 'Semester atau tahun belum aktif');
        }

        $data = [
            'id_siswa'       => $siswa['id_siswa'],
            'id_ekstra'      => $this->request->getPost('id_ekstra'),
            'id_semester'    => $semester['id_semester'],
            'id_tahun'       => $tahun['id_tahun'],
            'tanggal_daftar' => date('Y-m-d')
        ];

        $model = new PendaftaranEkstraModel();

        $cek = $model->where($data)->first();
        if ($cek) {
            return redirect()->back()
                ->with('error', 'Kamu sudah terdaftar di ekskul ini');
        }

        $model->insert($data);

        return redirect()->to('daftar')
            ->with('success', 'Berhasil mendaftar ekskul');
    }


}
