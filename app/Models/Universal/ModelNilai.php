<?php

namespace App\Models\Universal;

use CodeIgniter\Model;

class ModelNilai extends Model
{
    protected $table = 'nilai'; 
    protected $primaryKey = 'id_nilai';
    protected $allowedFields = ['siswa', 'id_jadwal', 'harian', 'uts', 'final', 'rata', 'created_at', 'created_by',
                                'updated_at', 'updated_by'];
    protected $useTimestamps = true;

    public function getNilaiByRombel($id_rombel)
    {
        return $this->db->table('nilai')
            ->select('
                nilai.*,
                siswa.nis,
                siswa.nama_siswa,
                mapel.nama_mapel,
                sesi.sesi,
                guru.nama as nama_guru,
                jadwal.id_mapel,
                jadwal.id_guru,
                jadwal.id_blok
            ')
            ->join('siswa', 'siswa.id_siswa = nilai.siswa')
            ->join('jadwal', 'jadwal.id_jadwal = nilai.id_jadwal')
            ->join('mapel', 'mapel.id_mapel = jadwal.id_mapel')
            ->join('sesi', 'sesi.id_sesi = jadwal.id_sesi')
            ->join('guru', 'guru.id_guru = jadwal.id_guru')
            ->where('jadwal.id_rombel', $id_rombel)
            ->get()
            ->getResult();
    }

}
