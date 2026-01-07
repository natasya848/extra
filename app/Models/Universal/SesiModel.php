<?php 
namespace App\Models\Universal;

use CodeIgniter\Model;

class SesiModel extends Model
{
    protected $table = 'sesi';
    protected $primaryKey = 'id_sesi';
    protected $allowedFields = ['sesi','jam_mulai', 'jam_selesai', 'created_at', 'updated_at'];

}