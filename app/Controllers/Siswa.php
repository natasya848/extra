<?php

namespace App\Controllers;
use App\Models\M_siswa;

class Siswa extends BaseController
{
    public function index()
    {
        $level   = session()->get('level');
        $id_user = session()->get('id');

        $model = new M_siswa();
        $data['title'] = 'Data Siswa';
        $data['a'] = [];

        if ($level == 1 || $level == 2 || $level == 3) {
            if ($level == 3) {
                $data['a'] = $model->getAllRombelDetail($id_user);
            } else {
                $data['a'] = $model->getAllPData();
            }
        }

        echo view('header');
        echo view('menu');
        echo view('data_siswa/view', $data);
        echo view('footer');
    }

    public function tambah_siswa()
    {
        $model = new M_siswa();
        $rombelDetails = $model->getAllRombel();
        $data['a'] = $rombelDetails;
        $data['c'] = $model->tampil('jenjang');
        $data['jur'] = $model->tampil('jurusan');
        $data['title']='Data Siswa';

        echo view('header');
        echo view('menu');
        echo view('data_siswa/create', $data);
        echo view('footer');
    }

    public function aksi_tambah_siswa()
    {
        $nis= $this->request->getPost('nis');
        $nama= $this->request->getPost('nama');
        $rombel= $this->request->getPost('rombel');
        $jenjang= $this->request->getPost('jenjang');
        $jurusan= $this->request->getPost('jurusan');
        $b= $this->request->getPost('password');
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $imageName = $foto->getName();
            $foto->move('images/', $imageName);
        } else {
            $imageName = 'default.png';
        }

        $data1=array(
            'nama' => $nama,
            'username'=>$nis,
            'password'=>md5($b),
            'level'=>'4',
            'foto'=>$imageName,
            'jenjang'=>$jenjang,
            'created_at'=>date('Y-m-d H:i:s')

        );
        $darrel=new M_siswa();
        $darrel->simpan('user', $data1);
        $where=array('username'=>$nis);
        $ae=$darrel->getWhere2('user', $where);
        $id = $ae['id_user'];
        $data2=array(
            'nis'=>$nis,
            'nama_siswa'=>$nama,
            'rombel'=>$rombel,
            'jurusan'=>$jurusan,
            'user'=>$id,
            'created_at'=>date('Y-m-d H:i:s')

        );
        $darrel->simpan('siswa', $data2);

        return redirect()->to('siswa');        
    }

    public function edit_siswa($user)
    {
        $model=new M_siswa();
        $rombelDetails = $model->getAllRombel();
        $data['title']='Data Siswa';
        $data['a'] = $rombelDetails;
        $data['c'] = $model->tampil('jenjang');
        $data['jur'] = $model->tampil('jurusan');
        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jojo']=$model->getWhere('siswa',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('header');
        echo view('menu');
        echo view('data_siswa/edit', $data);
        echo view('footer');
    }

    public function aksi_edit_siswa()
    {
        $nis = $this->request->getPost('nis');
        $nama = $this->request->getPost('nama');
        $rombel= $this->request->getPost('rombel');
        $jenjang= $this->request->getPost('jenjang');
        $jurusan= $this->request->getPost('jurusan');
        $id = $this->request->getPost('id');
        $id2 = $this->request->getPost('id2');
        $foto = $this->request->getFile('foto');

        $imageName = null; 

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $imageName = $foto->getName();
            $foto->move('images/', $imageName);
        }

        $where = array('id_user' => $id);
        $data1 = array(
            'nama' => $nama,
            'username' => $nis,
            'jenjang' => $jenjang
        );

        if ($imageName) {
            $data1['foto'] = $imageName;
        }

        $darrel = new M_siswa();
        $darrel->qedit('user', $data1, $where);
        $where2 = array('user' => $id2);
        $data2 = array(
            'nis' => $nis,
            'nama_siswa' => $nama,
            'rombel' => $rombel,
            'jurusan' => $jurusan
            
        );
        $darrel->qedit('siswa', $data2, $where2);
        return redirect()->to('siswa');
    }

    public function delete_siswa($id)
    {
        $model=new M_siswa();
        $where=array('user'=>$id);
        $where2=array('id_user'=>$id);
        $model->hapus('siswa',$where);
        $model->hapus('user',$where2);
        return redirect()->to('siswa');
    }

}