<?php

namespace App\Models\Universal;

use CodeIgniter\Model;

class M_Ekstra extends Model
{
    protected $table = 'ekstra';
    protected $primaryKey = 'id_ekstra';
    protected $allowedFields = ['nama_ekstra', 'pembina', 'hari', 'keterangan', 
    'jam_mulai', 'jam_selesai', 'status', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function getAllWithGuru()
    {
        return $this->select('ekstra.*, guru.nama')
                    ->join('guru', 'guru.id_guru = ekstra.pembina')
                    ->findAll();
    }

}
