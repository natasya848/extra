<?php

namespace App\Models;
use CodeIgniter\Model;

class M_guru extends Model
{		
	protected $table      = 'guru';
	protected $primaryKey = 'id_guru';
	protected $allowedFields = ['nik', 'nama', 'rombel', 'user'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->get()->getResult();
	}
    public function hapus($table, $where)
    {
    	return $this->db->table($table)->delete($where);
    }
    public function simpan($table, $data)
    {
    	return $this->db->table($table)->insert($data);
    }
    public function qedit($table, $data, $where)
    {
    	return $this->db->table($table)->update($data, $where);
    }
    public function getWhere($table, $where)
    {
    	return $this->db->table($table)->getWhere($where)->getRow();
    }
    public function getWhere2($table, $where)
    {
    	return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function getAllRombelDetails()
    {
        $jenjang = session()->get('jenjang'); // Ambil jenjang dari sesi saat login
        
        $query = $this->db->table('guru')
        ->select('rombel.nama_r, user.jenjang, guru.user, guru.id_guru, guru.nik, guru.nama, kelas.nama_kelas, 
        jurusan.nama_jurusan, user.jabatan, jabatan_guru.*')
            ->join('user', 'user.id_user = guru.user')
            ->join('rombel', 'rombel.id_rombel = guru.rombel')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->join('jabatan_guru', 'jabatan_guru.id_jabatan = user.jabatan')
            ->orderBy('guru.created_at', 'desc');
            
            if ($jenjang) {
            // Jika ada jenjang dalam sesi, tambahkan klausa WHERE untuk membatasi berdasarkan jenjang
                $query->where('user.jenjang', $jenjang);
            }
            
            return $query->get()->getResult();
        }

        public function getAllRombel() {
            return $this->db->table('rombel')
            ->select('rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->get()
            ->getResult();
        }

        public function join2($table1, $table2, $on){
            return $this->db->table($table1)
            ->join($table2, $on, 'left')
            ->orderBy("$table2.created_at", 'desc') 
            ->get()
            ->getResult();
        }

	//CI4 Model
        public function insertt($data)
        {
            return $this->insert($data);
        }
        
        public function deletee($id)
        {
           return $this->delete($id);
       }
   }