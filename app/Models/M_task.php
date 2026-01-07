<?php

namespace App\Models;

use CodeIgniter\Model;

class M_task extends Model
{
    protected $table            = 'task';
    protected $primaryKey       = 'id_task';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'id_user', 'nama_tugas', 'status', 'prioritas',
        'tanggal', 'created_at'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'tanggal';
    protected $updatedField  = null;

    protected $beforeInsert = ['setCreatedOnly'];

    protected function setCreatedOnly(array $data)
    {
        if (isset($data['data'])) {
            unset($data['data'][$this->updatedField]);
        }
        return $data;
    }

}
