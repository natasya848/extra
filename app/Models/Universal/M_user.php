<?php

namespace App\Models\Universal;
use CodeIgniter\Model;

class M_user extends Model
{		
	protected $table      = 'user';
	protected $primaryKey = 'id_user';
	protected $allowedFields = ['username', 'password', 'email', 'level', 'foto'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->get()->getResult();
	}

	public function qedit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}
	public function join2($table1, $table2, $on)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('user.deleted_at', null)
		->orderBy('user.level', 'asc') 
		->get()
		->getResult();
	}
	public function join2WithExcludedLevel($table1, $table2, $on, $excludedLevel)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('user.deleted_at', null)
		->where('user.level !=', $excludedLevel)
		->orderBy('user.level', 'asc') 
		->get()
		->getResult();
	}


	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}