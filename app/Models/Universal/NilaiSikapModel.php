<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiSikapModel extends Model
{
    protected $table = 'nilai_sikap';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_siswa', 'id_tahun', 'id_semester', 
    'sikap_spiritual', 'sikap_sosial', 'catatan_wali', 'input_by', 'created_at'];
    public $timestamps = true;
}
