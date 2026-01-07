<?php

namespace App\Models\Universal;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'mapel'; 
    protected $primaryKey = 'id_mapel';
    protected $allowedFields = ['nama_mapel', 'jenis', 'created_at', 'updated_at', 'deleted_at'];
}
