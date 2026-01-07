<?php

namespace App\Controllers;
use App\Models\Universal\M_siswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Data_siswa extends BaseController
{

    public function index()
    {
       $level = session()->get('level');
       $id_user = session()->get('id');
       $data['title']='Data Siswa';

       $model = new M_siswa();
       $data['a'] = [];

        if ($level == 1 || $level == 2 || $level == 3) {
            if ($level == 3) {
                $data['a'] = $model->getAllRombelDetaial($id_user);
            } else {
                $data['a'] = $model->getAllPData();
            }
        }

        echo view('partial/header_datatable', $data);
        echo view('partial/side_menu2');
        echo view('partial/top_menu');
        echo view('data_siswa/view', $data);
        echo view('partial/footer_datatable');
    }

    public function tambah_siswa()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new M_siswa();
            $rombelDetails = $model->getAllRombel();
            $data['a'] = $rombelDetails;
            $data['c'] = $model->tampil('jenjang');
            $data['jur'] = $model->tampil('jurusan');
            $data['title']='Data Siswa';
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu2');
            echo view('partial/top_menu');
            echo view('data_siswa/create',$data);
            echo view('partial/footer_datatable');
        }else{
            return redirect()->to('login');
        }
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

        return redirect()->to('data_siswa');
        
    }

    public function edit_siswa($user)
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
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
            echo view('partial/header_datatable', $data);
            echo view('partial/side_menu2');
            echo view('partial/top_menu');
            echo view('data_siswa/edit',$data);
            echo view('partial/footer_datatable');
        }else{
            return redirect()->to('login');
        }
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
        return redirect()->to('data_siswa');
    }

    public function delete_siswa($id)
    {
        $model=new M_siswa();
        $where=array('user'=>$id);
        $where2=array('id_user'=>$id);
        $model->hapus('siswa',$where);
        $model->hapus('user',$where2);
        return redirect()->to('data_siswa');
    }

    public function import_excel()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new M_siswa();
            $file = $this->request->getFile('file_excel');
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {

                $data1 = [
                    'username' => $sheet->getCellByColumnAndRow(1, $row)->getValue(),
                    'password' => md5($sheet->getCellByColumnAndRow(2, $row)->getValue()),
                    'jenjang' => $sheet->getCellByColumnAndRow(3, $row)->getValue(),
                    'level' => 4,
                    'foto' => 'default.png',
                    'created_at'=>date('Y-m-d H:i:s')
                ];

                $model->simpan('user', $data1);
                $where=array('username'=>$sheet->getCellByColumnAndRow(1, $row)->getValue());

                $user=$model->getWhere2('user', $where);
                $iduser = $user['id_user'];

                $data2=array(
                    'nis'=>$sheet->getCellByColumnAndRow(4, $row)->getValue(),
                    'nama_siswa'=>$sheet->getCellByColumnAndRow(5, $row)->getValue(),
                    'rombel'=>$sheet->getCellByColumnAndRow(6, $row)->getValue(),
                    'user'=>$iduser,
                    'created_at'=>date('Y-m-d H:i:s')
                );
                $model->simpan('siswa', $data2);
            }

            return redirect()->back()->with('success', 'Data Excel Telah Berhasil Diimport');
        }else {
            return redirect()->to('login');
        }
    }

}