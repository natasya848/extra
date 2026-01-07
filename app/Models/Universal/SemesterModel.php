<?php 
namespace App\Models\Universal;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'id_semester';
    protected $allowedFields = ['nama_s','status'];
    


}