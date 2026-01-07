<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranEkstraModel extends Model
{
    protected $table            = 'pendaftaran_ekstra';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 
    protected $useSoftDeletes   = false; 

    protected $allowedFields    = [
        'id_siswa', 'id_ekstra', 'id_tahun', 'id_semester', 'tanggal_daftar', 'status', 'created_at'];

    protected $useTimestamps = false; 
    protected $createdField  = 'created_at';

    protected $beforeInsert = ['setCreatedOnly'];

    protected function setCreatedOnly(array $data)
    {
        if (isset($data['data'])) {
            unset($data['data'][$this->updatedField]);
        }
        return $data;
    }
}
