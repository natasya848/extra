<?php

namespace App\Models\Universal;
use CodeIgniter\Model;

class M_pendaftaran extends Model
{		
	protected $table      = 'pendaftaran';
	protected $primaryKey = 'id_pendaftaran';
	protected $allowedFields = ['nama_lengkap', 'rombel', 'tempat_lahir', 'tanggal_lahir', 'jk', 'agama', 'no_hp', 'email', 'alamat', 'asal_sekolah', 'nama_ayah',' nama_ibu', 'pekerjaan_ortu', 'alamat_kantor_ortu', 'gambar_akta_lahir', 'gambar_kk', 'gambar_ijazah', 'kondisi'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->get()->getResult();
	}
    public function hapus($table, $where)
    {
    	return $this->db->table($table)->delete($where);
    }
    public function simpan($table, $data)
    {
    	return $this->db->table($table)->insert($data);
    }
    public function qedit($table, $data, $where)
    {
    	return $this->db->table($table)->update($data, $where);
    }
    public function getWhere($table, $where)
    {
    	return $this->db->table($table)->getWhere($where)->getRow();
    }
    public function getWhere2($table, $where)
    {
    	return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function getAllPData()
    {
        $query = $this->db->table('pendaftaran')
        ->select('rombel.nama_r, pendaftaran.*, jenis_kelamin.nama_jk, agama.nama_agama, kelas.nama_kelas, jurusan.nama_jurusan')

        ->join('rombel', 'rombel.id_rombel = pendaftaran.rombel')
        ->join('jenis_kelamin', 'jenis_kelamin.id_jk = pendaftaran.jk')
        ->join('agama', 'agama.id_agama = pendaftaran.agama')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        
        ->orderBy('pendaftaran.created_at', 'desc')
        ->orderBy('pendaftaran.rombel', 'asc')
        ->orderBy('pendaftaran.nama_lengkap', 'asc');
        
        return $query->get()->getResult();
    }

    public function getPendaftarData($id_pendaftar)
    {
        $query = $this->db->table('pendaftaran')
        ->select('rombel.*, pendaftaran.*, jenis_kelamin.*, agama.*, kelas.*, jurusan.*')
        ->join('rombel', 'rombel.id_rombel = pendaftaran.rombel')
        ->join('jenis_kelamin', 'jenis_kelamin.id_jk = pendaftaran.jk')
        ->join('agama', 'agama.id_agama = pendaftaran.agama')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->where('pendaftaran.id_pendaftaran', $id_pendaftar)
        ->orderBy('pendaftaran.rombel', 'asc')
        ->orderBy('pendaftaran.nama_lengkap', 'asc')
        ->orderBy('pendaftaran.created_at', 'desc');


        return $query->get()->getResult();
    }

    public function getUserData($id_pendaftar)
    {
        $query = $this->db->table('user')
        ->select('username')
        ->join('pendaftaran', 'user.pendaftaran = pendaftaran.id_pendaftaran')
        ->where('user.pendaftaran', $id_pendaftar);

        return $query->get()->getRow();
    }


    public function getAllPDataWhere($id)
    {
        $query = $this->db->table('pendaftaran')
        ->select('rombel.nama_r, pendaftaran.*,
            jenis_kelamin.nama_jk, agama.nama_agama, kelas.nama_kelas, jurusan.nama_jurusan')
        ->join('rombel', 'rombel.id_rombel = pendaftaran.rombel')
        ->join('jenis_kelamin', 'jenis_kelamin.id_jk = pendaftaran.jk')
        ->join('agama', 'agama.id_agama = pendaftaran.agama')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->where('pendaftaran.id_pendaftaran', $id) // Menambahkan klausa WHERE untuk menyaring data berdasarkan ID
        ->orderBy('pendaftaran.created_at', 'desc');

        return $query->get()->getResult();
    }

    public function getAllRombelBaru() {
        return $this->db->table('rombel')
        ->select('rombel.nama_r, rombel.id_rombel, kelas.nama_kelas, jurusan.nama_jurusan')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->where('rombel.nama_r', 'Baru')
        ->get()
        ->getResult();
    }

    public function getDataPendaftaranbyId($idD) 
    {
        return $this->db->table('pendaftaran')
        ->where('id_pendaftaran', $idD)
        ->get()
        ->getRowArray();
    }

    public function getDataJenjangbyId($idR) 
    {
        return $this->db->table('rombel')
        ->where('id_rombel', $idR)
        ->get()
        ->getRowArray();
    }


	//CI4 Model
    public function insertt($data)
    {
        return $this->insert($data);
    }

    public function deletee($id)
    {
     return $this->delete($id);
 }
}