<?php 
namespace App\Models\Universal;

use CodeIgniter\Model;

class RombelModel extends Model
{
    protected $table = 'rombel';
    protected $primaryKey = 'id_rombel';
    protected $allowedFields = ['nama_r', 'kelas','jurusan', 'jenjang', 'created_at', 'updated_at', 'deleted_at'];

    public function getRombel()
    {
        return $this->db->table('rombel')
            ->select('rombel.id_rombel, rombel.nama_r, kelas.nama_kelas, jurusan.jurusan_detail, jenjang.nama_jenjang, guru.nama') 
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->join('jenjang', 'jenjang.id_jenjang = rombel.jenjang')
            ->join('guru', 'guru.rombel = rombel.id_rombel') 
            ->join('jadwal', 'jadwal.id_rombel = rombel.id_rombel')
            ->groupBy('rombel.id_rombel') 
            ->get()->getResultArray();
    }

}