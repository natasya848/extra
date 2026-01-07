<?php

namespace App\Models\Universal;
use CodeIgniter\Model;

class M_perizinan extends Model
{		
	protected $table      = 'perizinan';
	protected $primaryKey = 'id_perizinan';
	protected $allowedFields = ['siswa', 'tanggal', 'status', 'foto'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->get()->getResult();
	}
	public function tampil2($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
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
	public function join3($table1, $table2, $table3, $on, $on2, $idSiswa)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->join($table3, $on2, 'left')
		->where('perizinan.siswa', $idSiswa)
		->orderBy('perizinan.created_at', 'desc')
		// ->where($table1 . '.deleted_at', null)
		// ->where($table2 . '.deleted_at', null)
		->get()
		->getResult();
	}

	public function getSiswaData($idSiswa)
	{
		return $this->db->table('siswa')
		->where('user', $idSiswa)
		->get()
		->getRowArray();
	}

	public function getSiswaData2($idUser)
{
    return $this->db->table('siswa')
        ->select('siswa.id_siswa, siswa.rombel, jadwal.id_blok AS blok, jadwal.id_tahun AS tahun')
        ->join('jadwal', 'jadwal.id_rombel = siswa.rombel')
        ->where('siswa.user', $idUser)
        ->get()
        ->getRowArray();
}


	public function getPerizinanById($id_perizinan)
	{
		return $this->db->table('perizinan')
		->where('id_perizinan', $id_perizinan)
		->get()
		->getRow();
	}

	public function getIzinSakitHariIni($siswa_id, $tanggal)
	{
		return $this->db->table('perizinan')
		->where('siswa', $siswa_id)
		->where('tanggal', $tanggal)
		->countAllResults();
	}

	public function getAllRombel() {
		return $this->db->table('rombel')
		->select('rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan')
		->join('kelas', 'kelas.id_kelas = rombel.kelas')
		->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
		->get()
		->getResult();
	}

	public function getIdSemesterBlok($idSemester)
	{
		return $this->db->table('blok')
		->where('semester', $idSemester)
		->get()
		->getResultArray();
	}

	public function getDataByFilter($blok, $tahun, $rombel, $semester, $idRombel)
	{
		$builder = $this->db->table('perizinan');

    // Join dengan tabel lain
		$builder->join('siswa', 'siswa.id_siswa = perizinan.siswa');
		$builder->join('keterangan_perizinan', 'keterangan_perizinan.kode_keterangan = perizinan.status');

		$builder->join('rombel', 'rombel.id_rombel = perizinan.rombel');
		$builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
		$builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');

		$builder->join('blok', 'blok.id_blok = perizinan.blok');
		$builder->join('tahun', 'tahun.id_tahun = perizinan.tahun');

    // Buat kondisi filter berdasarkan input pengguna
		if ($blok) {
			$builder->where('perizinan.blok', $blok);
		}
		if ($tahun) {
			$builder->where('perizinan.tahun', $tahun);
		}
		if ($rombel) {
			$builder->where('perizinan.rombel', $rombel);
		} 
		if ($semester) {
        // Ambil ID semester dari blok yang dipilih
			$idBlokResults = $this->getIdSemesterBlok($semester);
			$idBloks = array_column($idBlokResults, 'id_blok');
			$builder->whereIn('perizinan.blok', $idBloks);
		}

		$builder->where('perizinan.rombel', $idRombel);
		$builder->orderBy('perizinan.created_at', 'desc');

    // Execute the query and return the results
		$query = $builder->get();

		return $query->getResultArray();
	}

	public function getDataByFilter1($blok, $tahun, $rombel, $semester)
	{
		$builder = $this->db->table('perizinan');

    // Join dengan tabel lain
		$builder->join('siswa', 'siswa.id_siswa = perizinan.siswa');
		$builder->join('keterangan_perizinan', 'keterangan_perizinan.kode_keterangan = perizinan.status');

		$builder->join('rombel', 'rombel.id_rombel = perizinan.rombel');
		$builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
		$builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');

		$builder->join('blok', 'blok.id_blok = perizinan.blok');
		$builder->join('tahun', 'tahun.id_tahun = perizinan.tahun');

    // Buat kondisi filter berdasarkan input pengguna
		if ($blok) {
			$builder->where('perizinan.blok', $blok);
		}
		if ($tahun) {
			$builder->where('perizinan.tahun', $tahun);
		}
		if ($rombel) {
			$builder->where('perizinan.rombel', $rombel);
		} 
		if ($semester) {
        // Ambil ID semester dari blok yang dipilih
			$idBlokResults = $this->getIdSemesterBlok($semester);
			$idBloks = array_column($idBlokResults, 'id_blok');
			$builder->whereIn('perizinan.blok', $idBloks);
		}

		$builder->orderBy('perizinan.created_at', 'desc');

    // Execute the query and return the results
		$query = $builder->get();

		return $query->getResultArray();
	}


	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}