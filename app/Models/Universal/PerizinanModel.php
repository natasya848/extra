<?php 
namespace App\Models\Universal;

use CodeIgniter\Model;

class PerizinanModel extends Model
{
    protected $table      = 'perizinan';
    protected $primaryKey = 'id_perizinan';
    protected $allowedFields = ['siswa', 'tanggal', 'status', 'alasan', 'foto'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    public function getStatusPerizinan($tanggal)
    {
        return $this->db->table('perizinan')
        ->select('siswa, status')
        ->where('tanggal', $tanggal)
        ->get()
        ->getResultArray();
    }

    public function getStatusPerizinanByDateAndIdSiswa($tanggal, $id_siswa)
    {
        return $this->db->table('perizinan')
        ->where('tanggal', $tanggal)
        ->where('siswa', $id_siswa)
        ->get()
        ->getResultArray();
    }

}