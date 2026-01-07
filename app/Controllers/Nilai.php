<?php

namespace App\Controllers;
use App\Models\Universal\M_model;
use App\Models\Universal\M_siswa;
use App\Models\Universal\TahunModel;
use App\Models\Universal\ModelNilai;

class nilai extends BaseController
{
	public function index()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2 ||  session()->get('level')==3){
			$model=new M_model();
            $on='nilai.siswa=siswa.id_siswa';
            $on2='nilai.blok=blok.id_blok';
            $on3='nilai.mapel=mapel.id_mapel';
            $on4='nilai.guru=guru.id_guru';
            $on5='nilai.rombel=rombel.id_rombel';
            $on6='rombel.kelas=kelas.id_kelas';
            $on7='rombel.jurusan=jurusan.id_jurusan';
            $data['a'] = $model->join8('nilai', 'siswa','blok','mapel','guru','rombel','kelas','jurusan',$on,$on2,$on3,$on4,$on5,$on6,$on7);
			$data['title']='Data Nilai';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu3');
			echo view('partial/top_menu');
			echo view('nilai/v_nilai',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function tambah_nilai()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2||  session()->get('level')==3){
			$model = new M_siswa();
			$rombelDetails = $model->getAllRombel();
			$data['a'] = $rombelDetails;
			$data['title']='Rombel';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu3');
			echo view('partial/top_menu');
			echo view('nilai/tambah_nilai',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}

	public function aksi_nilai()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2|| session()->get('level') == 3) {
            $model = new M_model();
			$data['title']='Nilai';
            $rombel = $this->request->getPost('rombel');
			$data['c'] = $model->tampil('mapel');
			$data['e'] = $model->tampil('blok');
			$data['g'] = $model->tampil('guru');
            $data['a'] = $model->getDataByFilter22($rombel);
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu3');
			echo view('partial/top_menu');
            echo view('nilai', $data);
			echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }
	public function aksi_tambah_nilai()
{
   
    $modelNilai = new ModelNilai();

    if ($this->request->getMethod() === 'post') {
		$tahunModel = new TahunModel();
		$tahun = $tahunModel->where('status', 'Aktif')->first();
        $pengetahuan = $this->request->getPost('pengetahuan');
        $keterampilan = $this->request->getPost('keterampilan');
        $id_siswa = $this->request->getPost('id_siswa');
        $id_blok = $this->request->getPost('blok');
        $id_mapel = $this->request->getPost('mapel');
        $id_guru = $this->request->getPost('guru');
        $id_rombel = $this->request->getPost('id_rombel');

        // Lakukan operasi penyimpanan data ke database di sini
        // Misalnya, lakukan perulangan untuk menyimpan setiap entri nilai
        for ($i = 0; $i < count($id_siswa); $i++) {
            // Memuat model           

            // Lakukan operasi penyimpanan ke database di sini
            $data = [
                'siswa' => $id_siswa[$i],
                'pengetahuan' => $pengetahuan[$i],
                'keterampilan' => $keterampilan[$i],
                'blok' => $id_blok,
                'mapel' => $id_mapel,
                'guru' => $id_guru,
                'rombel' => $id_rombel[$i],
				'tahun' => $tahun['id_tahun'],
                'created_at' => date('Y-m-d H:i:s')
            ];
            $modelNilai->insert($data);
        }

        // Setelah operasi penyimpanan selesai, Anda dapat melakukan redirect atau menampilkan pesan sukses
        // Contoh:
        if (session()->get('level') == 3) {
			session()->setFlashdata('success', 'Data berhasil disimpan.');
			return redirect()->to(site_url('nilai/tambah_nilai'));
		} else {
			session()->setFlashdata('success', 'Data berhasil disimpan.');
			return redirect()->to(site_url('nilai'));
		}
    }
}
public function edit_nilai($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2 ||  session()->get('level')==3){
			$model=new M_model();
			$data['title']='Edit Nilai';
			$data['z'] = $model->tampil('siswa');
			$data['c'] = $model->tampil('mapel');
			$data['e'] = $model->tampil('blok');
			$data['g'] = $model->tampil('guru');
			$rombelDetails = $model->getAllRombel();
			$data['a'] = $rombelDetails;
			$where=array('id_nilai'=>$id);
			$data['jojo']=$model->getWhere('nilai',$where);
			
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu3');
			echo view('partial/top_menu');
			echo  view('nilai/edit_nilai',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}

	}

	public function aksi_edit_nilai()
	{
		$id=$this->request->getPost('id');
		$pengetahuan = $this->request->getPost('pengetahuan');
        $keterampilan = $this->request->getPost('keterampilan');
        $id_siswa = $this->request->getPost('siswa');
        $id_blok = $this->request->getPost('blok');
        $id_mapel = $this->request->getPost('mapel');
        $id_guru = $this->request->getPost('guru');
        $id_rombel = $this->request->getPost('rombel');


		$where=array('id_nilai'=>$id);
		$simpan=array(
			'siswa' => $id_siswa,
			'pengetahuan' => $pengetahuan,
			'keterampilan' => $keterampilan,
			'blok' => $id_blok,
			'mapel' => $id_mapel,
			'guru' => $id_guru,
			'rombel' => $id_rombel
			
		);
		$model=new M_model();
		$model->qedit('nilai',$simpan, $where);
		return redirect()->to('nilai');

	}
	public function delete_nilai($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2 ||  session()->get('level')==3){
			$model=new m_model();
			$where=array('id_nilai'=>$id);
			$model->hapus('nilai',$where);
			return redirect()->to('nilai');
		}else{
			return redirect()->to('login');
		}
	}
}
