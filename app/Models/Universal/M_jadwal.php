<?php

namespace App\Models\Universal;
use CodeIgniter\Model;

class M_jadwal extends Model
{		
	protected $table      = 'jadwal';
	protected $primaryKey = 'id_jadwal';
	protected $allowedFields = ['id_rombel', 'id_mapel', 'id_guru', 'id_sesi', 'id_semester', 'id_tahun', 'created_at', 'updated_at'];
	protected $useSoftDeletes = false;
	protected $useTimestamps = true;

    public function getRombelJoin() 
    {
        return $this->db->table('rombel')
            ->select('rombel.*, kelas.nama_kelas, jurusan.nama_jurusan')
            ->join('kelas', 'kelas.id_kelas = rombel.id_kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.id_jurusan')
            ->get()->getResult();
    }

    public function getOrder($table, $orderBy, $order = 'ASC') 
    {
        return $this->db->table($table)->orderBy($orderBy, $order)->get()->getResult();
    }

    public function join3($table1, $table2, $table3, $on1, $on2)
    {
        return $this->db->table($table1)
            ->join($table2, $on1)
            ->join($table3, $on2)
            ->get()
            ->getResult();
    }

    public function getSesiAvailableExcludeUsed($id_semester, $id_rombel, $current_sesi = null)
    {
        $usedQuery = $this->db->table('jadwal')
            ->select('id_sesi')
            ->where('id_semester', $id_semester)
            ->where('id_rombel', $id_rombel);

        if ($current_sesi) {
            $usedQuery->where('id_sesi !=', $current_sesi);
        }

        $used = $usedQuery->get()->getResultArray();
        $usedIds = array_column($used, 'id_sesi');

        $builder = $this->db->table('sesi');
        $builder->select('id_sesi, sesi, jam_mulai, jam_selesai');
        if (!empty($usedIds)) {
            $builder->whereNotIn('id_sesi', $usedIds);
        }

        return $builder->get()->getResultArray();
    }

    public function getSesiById($id_sesi)
    {
        return $this->db->table('sesi')
            ->where('id_sesi', $id_sesi)
            ->get()
            ->getRowArray();
    }

    public function getMapelBlok()
    {
        return $this->select('jadwal.id_mapel, jadwal.id_semester, mapel.nama_mapel, mapel.jenis')
            ->join('mapel', 'mapel.id_mapel = jadwal.id_mapel')
            ->groupBy(['jadwal.id_mapel', 'jadwal.id_semester']) 
            ->findAll();
    }

}