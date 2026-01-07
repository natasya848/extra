<?php

namespace App\Models\Universal;

use CodeIgniter\Model;

class ModelEkstra extends Model
{
    protected $table = 'nilai_ekstra';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_siswa', 'id_ekstra', 'nilai', 'keterangan', 
    'id_tahun', 'id_semester', 'input_by', 'created_at'];
    public $timestamps = true;
}
