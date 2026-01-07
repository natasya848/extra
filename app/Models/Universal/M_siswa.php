<?php

namespace App\Models\Universal;

use CodeIgniter\Model;

class M_siswa extends Model
{
    protected $table      = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nis', 'nama_siswa', 'rombel', 'user'];
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

    public function getAllRombelDetaial($id_user)
    {
        $jenjang = session()->get('jenjang'); // Ambil jenjang dari sesi saat login

        // Mengambil ID rombel dari guru yang login
        $query = $this->db->table('guru')
            ->select('rombel')
            ->where('user', $id_user)
            ->get()
            ->getRow();

        if (!$query) {
            return [];
        }

        $id_rombel = $query->rombel;

        $query = $this->db->table('siswa')
            ->select('rombel.nama_r, user.id_user, user.jenjang, siswa.user, siswa.id_siswa, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan')
            ->join('rombel', 'rombel.id_rombel = siswa.rombel')
            ->join('user', 'user.id_user = siswa.user')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->where('siswa.rombel', $id_rombel)
            ->where('user.jenjang', $jenjang)
            ->orderBy('siswa.created_at', 'desc');


        return $query->get()->getResult();
    }

    public function getAllPData()
    {
        $jenjang = session()->get('jenjang'); // Ambil jenjang dari sesi saat login

        $query = $this->db->table('siswa')
            ->select('rombel.nama_r, user.id_user, user.jenjang, siswa.user, siswa.id_siswa, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan')
            ->join('rombel', 'rombel.id_rombel = siswa.rombel')
            ->join('user', 'user.id_user = siswa.user')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->orderBy('siswa.created_at', 'desc');

        if ($jenjang) {
            // Jika ada jenjang dalam sesi, tambahkan klausa WHERE untuk membatasi berdasarkan jenjang
            $query->where('user.jenjang', $jenjang);
        }

        return $query->get()->getResult();
    }

    public function getAllRombel()
    {
        return $this->db->table('rombel')
            ->select('rombel.nama_r, rombel.id_rombel, kelas.nama_kelas, jurusan.nama_jurusan')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->where('rombel.nama_r !=', 'Baru')
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
