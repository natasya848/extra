<?php

namespace App\Models\Universal;
use CodeIgniter\Model;

class M_absensi extends Model
{		
	protected $table = 'absen';
    protected $primaryKey = 'id_absen';
    protected $allowedFields = ['siswa','tanggal', 'status', 'id_ekstra', 'blok','tahun','persen'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

	
}