<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 
    protected $useSoftDeletes   = false; 

    protected $allowedFields    = [
        'nama', 'email', 'password', 'role', 'created_at'];

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

    public function getUserById($id)
    {
        return $this->db->table('user')
                        ->where('id_user', $id)
                        ->get()
                        ->getRow();
    }
}
