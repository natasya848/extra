<?php

namespace App\Controllers;
use App\Models\Universal\M_model;
use App\Models\Universal\M_siswa;
use App\Models\Universal\TahunModel;
use App\Models\Universal\M_jadwal;
use App\Models\Universal\M_guru;
use App\Models\Universal\Menu_M;

class jadwal extends BaseController
{
    public function __construct()
    {
        $this->menuModel = new Menu_M();
        $this->session = session();
         $this->db = \Config\Database::connect();
        helper(['url', 'log']);
    }

	public function index()
    {
        $level = session()->get('level');
        $id_user = session()->get('id');
        $id_jabatan = $this->menuModel->getJabatanByLevel($level);

        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3) {
            $model = new M_model();
            $modelj = new M_jadwal();

            $on1 = 'jadwal.id_rombel = rombel.id_rombel';
            $on2 = 'rombel.kelas = kelas.id_kelas';
            $on3 = 'rombel.jurusan = jurusan.id_jurusan';
            $on4 = 'jadwal.id_mapel = mapel.id_mapel';
            $on5 = 'jadwal.id_guru = guru.id_guru';
            $on6 = 'jadwal.id_sesi = sesi.id_sesi';
            $on7 = 'jadwal.id_blok = blok.id_blok';
            $on8 = 'jadwal.id_tahun = tahun.id_tahun';

            $db = \Config\Database::connect();
            $data['a'] = $db->table('jadwal')
                ->join('rombel', 'jadwal.id_rombel = rombel.id_rombel')
                ->join('kelas', 'rombel.kelas = kelas.id_kelas')
                ->join('jurusan', 'rombel.jurusan = jurusan.id_jurusan')
                ->join('mapel', 'jadwal.id_mapel = mapel.id_mapel')
                ->join('guru', 'jadwal.id_guru = guru.id_guru')
                ->join('sesi', 'jadwal.id_sesi = sesi.id_sesi')
                ->join('blok', 'jadwal.id_blok = blok.id_blok')
                ->join('tahun', 'jadwal.id_tahun = tahun.id_tahun')
                ->orderBy('rombel.nama_r', 'ASC')
                ->orderBy('sesi.sesi', 'ASC')
                ->get()->getResult();


            $data['blok'] = $model->tampil('blok');
            
            $on1 = 'rombel.kelas = kelas.id_kelas';
            $on2 = 'rombel.jurusan = jurusan.id_jurusan';

            $data['rombel'] = $modelj->join3('rombel', 'kelas', 'jurusan', $on1, $on2);

            $data['title'] = 'Data Jadwal';
            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);

            echo view('partial/header_datatable', $data);
            echo view('partial/side1', $akses);
            echo view('partial/top_menu');
            echo view('jadwal/v_jadwal', $data); 
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

	public function tambah_jadwal()
    {
        $level = session()->get('level');
        $id_user = session()->get('id');
        $id_jabatan = $this->menuModel->getJabatanByLevel($level);

        if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3) {
            $db = \Config\Database::connect(); 

            $model = new M_model();
            $modelSiswa = new M_siswa();
            $modelj = new M_jadwal();

            $tahun = $db->table('tahun')->where('status', 'Aktif')->get()->getResultArray();

            $data = [
                'title'  => 'Tambah Jadwal',
                'rombel' => $modelSiswa->getAllRombel(),
                'sesi'   => $modelj->getOrder('sesi', 'sesi', 'ASC'),
                'blok'   => $model->tampil('blok'),     
                'mapel'  => $model->tampil('mapel'),    
                'guru'   => $model->tampil('guru'),  
                'tahun'  => $tahun,  
            ];

            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);

            echo view('partial/header_datatable', $data);
            echo view('partial/side1', $akses);
            echo view('partial/top_menu');
            echo view('jadwal/tambah_jadwal', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

    public function aksi_tambah_jadwal()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new M_model();

            $data = [
                'id_rombel' => $this->request->getPost('rombel'),
                'id_mapel'  => $this->request->getPost('id_mapel'),
                'id_guru'   => $this->request->getPost('id_guru'),
                'id_sesi'   => $this->request->getPost('id_sesi'),
                'id_blok'   => $this->request->getPost('id_blok'),
                'id_tahun'  => $this->request->getPost('id_tahun'),
            ];

            $model->simpan('jadwal', $data); 

            session()->setFlashdata('success', 'Data jadwal berhasil ditambahkan.');
            return redirect()->to('jadwal/index');
        }
    }

    public function getMapelTersedia()
    {
        $id_blok   = $this->request->getPost('id_blok');
        $id_sesi   = $this->request->getPost('id_sesi');
        $id_rombel = $this->request->getPost('id_rombel');

        $db = \Config\Database::connect();

        $usedMapel = $db->table('jadwal')
            ->select('id_mapel')
            ->where([
                'id_blok'   => $id_blok,
                'id_sesi'   => $id_sesi,
                'id_rombel' => $id_rombel
            ])
            ->get()
            ->getResult();

        $usedMapelIds = array_map(fn($row) => $row->id_mapel, $usedMapel);

        if (!empty($usedMapelIds)) {
            $mapel = $db->table('mapel')
                ->whereNotIn('id_mapel', $usedMapelIds)
                ->orderBy('nama_mapel', 'ASC')
                ->get()
                ->getResult();
        } else {
            $mapel = $db->table('mapel')->orderBy('nama_mapel', 'ASC')->get()->getResult();
        }

        echo '<option value="">- Pilih Mapel -</option>';
        foreach ($mapel as $m) {
            echo '<option value="' . $m->id_mapel . '">' . $m->nama_mapel . '</option>';
        }
    }

    public function getSesiTersedia()
    {
        $id_blok   = $this->request->getPost('id_blok');
        $id_rombel = $this->request->getPost('id_rombel');

        $db = \Config\Database::connect();

        $jadwal = $db->table('jadwal')
            ->select('id_sesi')
            ->where([
                'id_blok' => $id_blok,
                'id_rombel' => $id_rombel
            ])
            ->get()
            ->getResult();

        $usedSesi = array_map(function ($row) {
            return $row->id_sesi;
        }, $jadwal);

        if (!empty($usedSesi)) {
            $sesi = $db->table('sesi')
                ->whereNotIn('id_sesi', $usedSesi)
                ->orderBy('sesi', 'ASC')
                ->get()
                ->getResult();
        } else {
            $sesi = $db->table('sesi')->orderBy('sesi', 'ASC')->get()->getResult();
        }

        echo '<option value="">- Pilih Sesi -</option>';
        foreach ($sesi as $s) {
            echo '<option value="' . $s->id_sesi . '">' 
                . $s->sesi . ' (' 
                . date('H:i', strtotime($s->jam_mulai)) 
                . ' - ' 
                . date('H:i', strtotime($s->jam_selesai)) 
                . ')</option>';
        }

    }

    public function filterJadwal()
    {
        $db = \Config\Database::connect();

        $blok = $this->request->getPost('id_blok');
        $rombel = $this->request->getPost('id_rombel');

        $builder = $db->table('jadwal')
            ->select('jadwal.*, rombel.nama_r, kelas.nama_kelas, jurusan.nama_jurusan, blok.nama_b, 
            blok.semester, guru.nama as nama_guru, mapel.nama_mapel, tahun.nama_t, sesi.sesi, sesi.jam_mulai, sesi.jam_selesai')
            ->join('rombel', 'jadwal.id_rombel = rombel.id_rombel')
            ->join('kelas', 'rombel.kelas = kelas.id_kelas')
            ->join('jurusan', 'rombel.jurusan = jurusan.id_jurusan')
            ->join('blok', 'jadwal.id_blok = blok.id_blok')
            ->join('guru', 'jadwal.id_guru = guru.id_guru')
            ->join('mapel', 'jadwal.id_mapel = mapel.id_mapel')
            ->join('sesi', 'jadwal.id_sesi = sesi.id_sesi')
            ->join('tahun', 'jadwal.id_tahun = tahun.id_tahun')
            ->orderBy('rombel.nama_r', 'ASC')
            ->orderBy('sesi.sesi', 'ASC');

        if (!empty($blok)) {
            $builder->where('jadwal.id_blok', $blok);
        }
        if (!empty($rombel)) {
            $builder->where('jadwal.id_rombel', $rombel);
        }

        $query = $builder->get();
        $data = $query->getResult();

        return $this->response->setJSON($data);
    }

    public function getSesiTersediaEdit()
    {
        $id_blok = $this->request->getPost('id_blok');
        $id_rombel = $this->request->getPost('id_rombel');
        $current_sesi = $this->request->getPost('current_sesi');
        $model = new M_jadwal();

        $sesiList = $model->getSesiAvailableExcludeUsed($id_blok, $id_rombel, $current_sesi);

        $exists = array_filter($sesiList, fn($s) => $s['id_sesi'] == $current_sesi);
        if (!$exists && $current_sesi) {
            $currentData = $this->jadwalModel->getSesiById($current_sesi);
            if ($currentData) {
                $sesiList[] = $currentData;
            }
        }

        $options = '<option value="">- Pilih Sesi -</option>';
            foreach ($sesiList as $sesi) {
                $selected = ($sesi['id_sesi'] == $current_sesi) ? 'selected' : '';

                $jamMulai = date('H:i', strtotime($sesi['jam_mulai']));
                $jamSelesai = date('H:i', strtotime($sesi['jam_selesai']));

                $options .= '<option value="'.$sesi['id_sesi'].'" '.$selected.'>'.
                    $sesi['sesi'].' ('.$jamMulai.' - '.$jamSelesai.')'.
                '</option>';
            }

        echo $options;
    }

    public function edit_jadwal($id)
    {
        $level = session()->get('level');
        $id_user = session()->get('id');
        $id_jabatan = $this->menuModel->getJabatanByLevel($level);

        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new M_model();
            $db = \Config\Database::connect();

            $data['title'] = 'Edit Jadwal';
            $data['mapel'] = $model->tampil('mapel');
            $data['sesi'] = $model->tampil('sesi');
            $data['tahun'] = $db->table('tahun')->where('status', 'Aktif')->get()->getResultArray();
            $data['guru'] = $model->tampil('guru');
            $data['rombel'] = $model->getAllRombel();
            $data['blok'] = $model->tampil('blok');
            $data['jadwal'] = $model->getWhere('jadwal', ['id_jadwal' => $id]);

            $data['group'] = $this->menuModel->getGroup($level);
            $data['menus'] = $this->menuModel->getMenusWithAccess($level);
            $akses['menus'] = $this->menuModel->getMenusByGroup($level);

            echo view('partial/header_datatable', $data);
            echo view('partial/side1', $akses);
            echo view('partial/top_menu');
            echo view('jadwal/edit_jadwal', $data);
            echo view('partial/footer_datatable');
        } else {
            return redirect()->to('login');
        }
    }

    public function aksi_edit_jadwal()
    {
        $id = $this->request->getPost('id_jadwal');
        $id_tahun = $this->request->getPost('id_tahun');
        $id_blok = $this->request->getPost('id_blok');
        $id_rombel = $this->request->getPost('rombel');  
        $id_sesi = $this->request->getPost('id_sesi');
        $id_mapel = $this->request->getPost('id_mapel');
        $id_guru = $this->request->getPost('id_guru');

        $data = [
            'id_tahun' => $id_tahun,
            'id_blok' => $id_blok,
            'id_rombel' => $id_rombel,
            'id_sesi' => $id_sesi,
            'id_mapel' => $id_mapel,
            'id_guru' => $id_guru,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $model = new M_model();
        $model->qedit('jadwal', $data, ['id_jadwal' => $id]);

        return redirect()->to('jadwal');
    }

	public function delete_jadwal($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2 ||  session()->get('level')==3){
			$model=new m_model();
			$where=array('id_jadwal'=>$id);
			$model->hapus('jadwal',$where);
			return redirect()->to('jadwal');
		}else{
			return redirect()->to('login');
		}
	}
}
