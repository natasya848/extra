<?php

namespace App\Controllers;
use App\Models\Universal\M_model;

class mapel extends BaseController
{
    public function index()
    { 
		if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new M_model();
			$data['a'] = $model->tampil('mapel');
            $data['title']='Data Mapel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('mapel/v_mapel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('/Home');
		}
    }
    public function tambah_mapel()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
            $data['title']='Mapel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			echo view('mapel/tambah_mapel');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
    public function aksi_tambah_mapel()
	{
		$a=$this->request->getPost('nama_mapel');
        $b=$this->request->getPost('jenis');

		$simpan=array(
			'nama_mapel'=>$a,
            'jenis'=>$b,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('mapel',$simpan);
		return redirect()->to('/mapel');
	}
    public function edit_mapel($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$where=array('id_mapel'=>$id);
			$data['title']='Mapel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu2');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('mapel',$where);
			echo  view('mapel/edit_mapel',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	public function aksi_edit_mapel()
	{
		
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_mapel');
		$b=$this->request->getPost('jenis');


		$where=array('id_mapel'=>$id);
		$simpan=array(
			'nama_mapel'=>$a,
			'jenis'=>$b
			
			
		);
		$model=new M_model();
		$model->qedit('mapel',$simpan, $where);
		return redirect()->to('/mapel');

	}
	public function delete_mapel($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_mapel'=>$id);
			$model->hapus('mapel',$where);
			return redirect()->to('/mapel');
		}else{
			return redirect()->to('login');
		}
	}
}
