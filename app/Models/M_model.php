<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_model extends Model
{
    public function tampil($table) {
        return $this->db->table($table)
        ->orderBy('created_at', 'desc')
        ->get()
        ->getResult();
    }

    public function tampil1($table)
    {
        return $this->db->table($table)->get()->getResult(); 
    }
    
    public function geta()
    {
        return $this->findAll();
    }

    public function hapus($table, $where){
        return $this->db->table($table)->delete($where);
    }

    public function simpan($table, $data){
        return $this->db->table($table)->insert($data);
    }

    public function getWhere($table, $where){
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function qedit($table, $data, $where){
        return $this->db->table($table)->update($data, $where);
    }

    public function join2($table1, $table2, $on){
        return $this->db->table($table1)
        ->join($table2, $on, 'left')
        ->orderBy("$table2.created_at", 'desc') 
        ->get()
        ->getResult();
    }

    public function getAllRombelDetails()
    {
        $jenjang = session()->get('jenjang'); 
        
        $query = $this->db->table('guru')
        ->select('rombel.nama_r, user.jenjang, guru.user, guru.id_guru, guru.nik, guru.nama, kelas.nama_kelas, jurusan.nama_jurusan')
            ->join('user', 'user.id_user = guru.user') 
            ->join('rombel', 'rombel.id_rombel = guru.rombel')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->orderBy('guru.created_at', 'desc');
            
        if ($jenjang) {
            $query->where('user.jenjang', $jenjang);
        }
            
        return $query->get()->getResult();
    }
        
        
    public function getAllRombelDetaial($id_user)
    {
        $jenjang = session()->get('jenjang');
        
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
    
    public function getAllRombelDet($id_user)
    {
        $jenjang = session()->get('jenjang'); 

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
        ->where('user.level', 5) 
        ->orderBy('siswa.created_at', 'desc');
            
        return $query->get()->getResult();
    }
        
        
    public function getAllRombel() 
    {
        return $this->db->table('rombel')
                        ->select('rombel.nama_r, rombel.id_rombel,kelas.nama_kelas, jurusan.nama_jurusan')
                        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
                        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
                        ->get()
                        ->getResult();
    }

    public function joinuser($table1, $table2, $table3, $on1, $on2)
    {
        return $this->db->table($table1)
            ->join($table2, $on1, 'left')
            ->join($table3, $on2, 'left')
            ->orderBy("$table1.created_at", 'desc')
            ->get()
            ->getResult();
    }

    public function joinusera($table1, $table2, $table3, $on1, $on2)
    {
        $jenjang = session()->get('jenjang'); 
        
        $query = $this->db->table($table1)
        ->join($table2, $on1, 'left')
        ->join($table3, $on2, 'left')
        ->orderBy("$table1.created_at", 'desc');
        
        if ($jenjang) {
            $query->where("$table1.jenjang", $jenjang);
        }
        
        return $query->get()->getResult();
    }

    public function join_with_user_id($table1, $table2, $on, $user_id) 
    {
        return $this->db->table($table1)
        ->join($table2, $on, 'left')
        ->where("$table1.user", $user_id) 
        ->get()
        ->getResult();
    }
    
    public function joinaa($table1, $table2, $on, $where = array())
    {
        return $this->db->table($table1)
        ->join($table2, $on, 'left')
        ->where($where)
        ->get()
        ->getResult();
    }

    public function getblokById($id_blok)
    {
        return $this->db->table('blok')->where('id_blok', $id_blok)->get()->getRow();
    }

    public function gettahunById($id_tahun)
    {
        return $this->db->table('tahun')->where('id_tahun', $id_tahun)->get()->getRow();
    }
    
    public function getPelajaranById($id_pel)
    {
        return $this->db->table('pelajaran')->where('id_pel', $id_pel)->get()->getRow();
    }
    
    public function getWhere2($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function join3($table1, $table2,$table3, $on,$on1,$where)
    {
        return $this->db->table($table1)
        ->join($table2, $on, 'left')
        ->join($table3, $on1, 'left')
        ->getWhere($where)
        ->getResult();
    }

    public function join4($tabel1, $tabel2, $tabel3, $tabel4, $on1, $on2, $on3)
    {
        return $this->db->table($tabel1)
            ->join($tabel2, $on1)
            ->join($tabel3, $on2)
            ->join($tabel4, $on3);
    }

    public function join8($table1, $table2, $table3, $table4, $table5, $table6,$table7,$table8,$on1, $on2, $on3,$on4,$on5,$on6,$on7)
    {
        $builder = $this->db->table($table1);
        $builder->select('*');
        $builder->join($table2, $on1);
        $builder->join($table3, $on2);
        $builder->join($table4, $on3);
        $builder->join($table5, $on4);
        $builder->join($table6, $on5);
        $builder->join($table7, $on6);
        $builder->join($table8, $on7);
        $builder->orderBy($table1 . '.created_at', 'desc');

        
        $query = $builder->get();
        return $query->getResult();
    }

    public function joint($table1, $table2, $on, $userLevel, $userId)
    {
        $query = $this->db->table($table1)
        ->join($table2, $on, 'left');

        if ($userLevel >= 1 && $userLevel <= 4) {
            $query->where('pembayaran.deleted_at', null);
        } elseif ($userLevel == 5) {
            $query->where('siswa.user', $userId)
            ->where('pembayaran.deleted_at', null);
        } else {
            return [];
        }

        return $query->get()->getResult();
    }

    public function joiny($table1, $table2, $on){
        return $this->db->table('pengeluaran')
        ->join('siswa', 'pengeluaran.siswa = siswa.id_siswa', 'left')
        ->where('pengeluaran.deleted_at', null)
        ->where('siswa.deleted_at', null)
        ->get()
        ->getResult();
    }

    public function filter2($table, $awal, $akhir, $status)
    {
        return $this->db->query("
            SELECT *
            FROM ".$table."
            INNER JOIN kamar ON ".$table.".kamar = kamar.id_kamar
            WHERE ".$table.".tgl_out BETWEEN '".$awal."' AND '".$akhir."'
            AND ".$table.".status = '".$status."'
            ")->getResult();
    }
    public function simpanDataNilai($data)
    {
        $builder = $this->db->table('nilai');
        $builder->insertBatch($data);
    }

    public function getDataByFilter22($rombel)
    {
        $builder = $this->db->table('siswa');
    
        $builder->select('siswa.*, rombel.*, kelas.*, jurusan.*');
    
        $builder->join('rombel', 'rombel.id_rombel = siswa.rombel', 'left');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas', 'left');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan', 'left');
    
        $builder->where('siswa.rombel', $rombel);
    
        $builder->orderBy('siswa.nama_siswa', 'asc');
    
        $query = $builder->get();
            
        $results = $query->getResult();
        return $results;
    }

    public function getSiswaInfo($rombel)
    {
        return $this->db->table('siswa')
            ->join('rombel', 'rombel.id_rombel = siswa.rombel', 'left')
            ->where('siswa.rombel', $rombel)
            ->get()
            ->getResult();
    }

    public function getDataNilailah($tahun, $blok, $rombel, $id_siswa)
    {
        $builder = $this->db->table('nilai');
        $builder->select('siswa.nis, siswa.nama_siswa, mapel.nama_mapel, nilai.harian, nilai.uts, nilai.final');
        $builder->join('siswa', 'siswa.id_siswa = nilai.siswa');
        $builder->join('jadwal', 'jadwal.id_jadwal = nilai.id_jadwal');
        $builder->join('mapel', 'mapel.id_mapel = jadwal.id_mapel');
        
        $builder->where('jadwal.id_rombel', $rombel);
        $builder->where('jadwal.id_tahun', $tahun);
        $builder->where('jadwal.id_blok', $blok);
        $builder->where('nilai.siswa', $id_siswa);

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllSiswaNilai($tahun, $blok, $rombel)
    {
        $builder = $this->db->table('siswa');

        $builder->join('nilai', 'nilai.siswa = siswa.id_siswa');
        $builder->join('mapel', 'mapel.id_mapel = nilai.mapel');
        $builder->join('blok', 'blok.id_blok = nilai.blok');
        $builder->join('rombel', 'rombel.id_rombel = nilai.rombel');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
        $builder->join('tahun', 'tahun.id_tahun = nilai.tahun');

        $builder->where('nilai.blok', $blok);
        $builder->where('nilai.tahun', $tahun);
        $builder->where('nilai.rombel', $rombel);

        $builder->select('siswa.id_siswa, siswa.nis, siswa.nama_siswa, mapel.nama_mapel, nilai.pengetahuan, nilai.keterampilan');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataByFilter2($blok, $tahun, $rombel)
    {
        $builder = $this->db->table('absen');
    
        $builder->join('siswa', 'siswa.id_siswa = absen.siswa');
    
        $builder->join('rombel', 'rombel.id_rombel = absen.rombel');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
    
        $builder->join('blok', 'blok.id_blok = absen.blok');
        $builder->join('tahun', 'tahun.id_tahun = absen.tahun');
    
        if ($blok) {
            $builder->where('absen.blok', $blok);
        }
        if ($tahun) {
            $builder->where('absen.tahun', $tahun);
        }
        if ($rombel) {
            $builder->where('absen.rombel', $rombel);
        }
    
        $builder->select('siswa.id_siswa, 
                          siswa.nama_siswa, 
                          SUM(CASE WHEN absen.status = "H" THEN 1 ELSE 0 END) AS hadir,
                          SUM(CASE WHEN absen.status = "S" THEN 1 ELSE 0 END) AS sakit,
                          SUM(CASE WHEN absen.status = "I" THEN 1 ELSE 0 END) AS izin,
                          SUM(CASE WHEN absen.status = "TK" THEN 1 ELSE 0 END) AS tanpa_keterangan');
    
        $builder->groupBy('siswa.id_siswa, siswa.nama_siswa');
    
        $builder->orderBy('siswa.nama_siswa', 'asc');
    
        $query = $builder->get();
        
        $results = $query->getResultArray();
    
        foreach ($results as &$row) {
            $hadir = $row['hadir'];
            $total = $hadir + $row['sakit'] + $row['izin'] + $row['tanpa_keterangan'];
    
            $persen = ($total > 0) ? ($hadir / $total) * 100 : 0;
            $row['persen'] = $persen;
        }
    
        return $results;
    }

    public function getBlokInfo($blok)
    {
        return $this->db->table('blok')
            ->where('id_blok', $blok)
            ->get()
            ->getRow();
    }

    public function getRombelInfo($rombel)
    {
        return $this->db->table('rombel')
            ->join('kelas', 'kelas.id_kelas = rombel.kelas')
            ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
            ->where('id_rombel', $rombel)
            ->get()
            ->getRow();
    }

    public function getTahunInfo($tahun)
    {
        return $this->db->table('tahun')
            ->where('id_tahun', $tahun)
            ->get()
            ->getRow();
    }

   public function getDataNilai($tahun, $blok, $rombel, $id_siswa)
    {
        $builder = $this->db->table('nilai');

        $builder->select('
            nilai.*, 
            siswa.*, 
            rombel.*, 
            kelas.*, 
            jurusan.*, 
            tahun.*, 
            blok.*, 
            guru.*, 
            mapel.*
        ');

        $builder->join('siswa', 'siswa.id_siswa = nilai.siswa');
        $builder->join('jadwal', 'jadwal.id_jadwal = nilai.id_jadwal');
        $builder->join('guru', 'guru.id_guru = jadwal.id_guru');
        $builder->join('mapel', 'mapel.id_mapel = jadwal.id_mapel');
        $builder->join('rombel', 'rombel.id_rombel = jadwal.id_rombel');
        $builder->join('tahun', 'tahun.id_tahun = jadwal.id_tahun');
        $builder->join('blok', 'blok.id_blok = jadwal.id_blok');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
        

        $builder->where('jadwal.id_rombel', $rombel);
        $builder->where('nilai.siswa', $id_siswa);

        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataabsen($blok, $tahun, $rombel, $id_siswa)
    {
        $builder = $this->db->table('absen');
    
        $builder->join('siswa', 'siswa.id_siswa = absen.siswa');
        $builder->join('rombel', 'rombel.id_rombel = absen.rombel');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
        $builder->join('blok', 'blok.id_blok = absen.blok');
        $builder->join('tahun', 'tahun.id_tahun = absen.tahun');
    
        $builder->where('absen.blok', $blok);
        $builder->where('absen.tahun', $tahun);
        $builder->where('absen.rombel', $rombel);
        $builder->where('absen.siswa', $id_siswa);
    
        $builder->select('siswa.id_siswa, 
                          siswa.nama_siswa, 
                          SUM(CASE WHEN absen.status = "H" THEN 1 ELSE 0 END) AS hadir,
                          SUM(CASE WHEN absen.status = "S" THEN 1 ELSE 0 END) AS sakit,
                          SUM(CASE WHEN absen.status = "I" THEN 1 ELSE 0 END) AS izin,
                          SUM(CASE WHEN absen.status = "TK" THEN 1 ELSE 0 END) AS tanpa_keterangan');
    
        $builder->groupBy('siswa.id_siswa, siswa.nama_siswa');
    
        $query = $builder->get();
    
        $result = $query->getRowArray();
    
        if ($result) {
            $hadir = $result['hadir'];
            $total = $hadir + $result['sakit'] + $result['izin'] + $result['tanpa_keterangan'];
            $persen = ($total > 0) ? ($hadir / $total) * 100 : 0;
            $result['persen'] = $persen;
        } else {
            $result = ['persen' => 0];
        }
    
        return $result;
    }
    
  public function getDataNilai2($tahun, $semester, $rombel, $id_siswa)
    {
        $builder = $this->db->table('nilai');

        $builder->select('
            jadwal.id_mapel AS mapel,
            AVG(nilai.harian) AS rata_harian, 
            AVG(nilai.uts) AS rata_uts,
            AVG(nilai.final) AS rata_final,
            mapel.nama_mapel,
            mapel.jenis,
            guru.nama AS nama_guru
        ');

        $builder->join('siswa', 'siswa.id_siswa = nilai.siswa');
        $builder->join('jadwal', 'jadwal.id_jadwal = nilai.id_jadwal');
        $builder->join('guru', 'guru.id_guru = jadwal.id_guru');
        $builder->join('mapel', 'mapel.id_mapel = jadwal.id_mapel');
        $builder->join('rombel', 'rombel.id_rombel = jadwal.id_rombel');
        $builder->join('tahun', 'tahun.id_tahun = jadwal.id_tahun');
        $builder->join('blok', 'blok.id_blok = jadwal.id_blok');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');

        $blokRange = ($semester == 1) ? [2, 3, 4, 5] : [6, 7, 8, 9];
        $builder->whereIn('jadwal.id_blok', $blokRange);
        $builder->where('jadwal.id_rombel', $rombel);
        $builder->where('jadwal.id_tahun', $tahun);
        $builder->where('nilai.siswa', $id_siswa);

        $builder->groupBy('jadwal.id_mapel');

        $query = $builder->get();

        if (!$query) {
            return []; 
        }

        return $query->getResult();
    }

    public function getIdSemesterBlok($idSemester)
    {
        return $this->db->table('blok')
        ->where('semester', $idSemester)
        ->get()
        ->getResultArray();
    }

    public function getDataByFilter3($blok, $tahun, $rombel, $semester, $idSiswa)
    {
        $builder = $this->db->table('absen');
        
        $builder->join('siswa', 'siswa.id_siswa = absen.siswa');
        
        $builder->join('rombel', 'rombel.id_rombel = absen.rombel');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
        
        $builder->join('blok', 'blok.id_blok = absen.blok');
        $builder->join('tahun', 'tahun.id_tahun = absen.tahun');
        
        if ($blok) {
            $builder->where('absen.blok', $blok);
        }
        if ($tahun) {
            $builder->where('absen.tahun', $tahun);
        }
        if ($rombel) {
            $builder->where('absen.rombel', $rombel);
        }
        if ($semester) {
            $idBlokResults = $this->getIdSemesterBlok($semester);
            $idBloks = array_column($idBlokResults, 'id_blok');
            $builder->whereIn('absen.blok', $idBloks);
        }
        
        $builder->where('absen.siswa', $idSiswa);

        $builder->select('siswa.id_siswa, 
          siswa.nama_siswa, 
          SUM(CASE WHEN absen.status = "H" THEN 1 ELSE 0 END) AS hadir,
          SUM(CASE WHEN absen.status = "S" THEN 1 ELSE 0 END) AS sakit,
          SUM(CASE WHEN absen.status = "I" THEN 1 ELSE 0 END) AS izin,
          SUM(CASE WHEN absen.status = "TK" THEN 1 ELSE 0 END) AS tanpa_keterangan');
        
        $builder->groupBy('siswa.id_siswa, siswa.nama_siswa');
        
        $builder->orderBy('siswa.nama_siswa', 'asc');
        
        $query = $builder->get();
        
        $results = $query->getResultArray();
        
        foreach ($results as &$row) {
            $hadir = $row['hadir'];
            $total = $hadir + $row['sakit'] + $row['izin'] + $row['tanpa_keterangan'];
            
            $persen = ($total > 0) ? ($hadir / $total) * 100 : 0;
            $row['persen'] = $persen;
        }
        
        return $results;
    }

    public function getDataByFilter($semester, $tahun, $rombel)
    {
        $builder = $this->db->table('absen');
        $builder->join('siswa', 'siswa.id_siswa = absen.siswa');
        $builder->join('rombel', 'rombel.id_rombel = absen.rombel');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
        $builder->join('blok', 'blok.id_blok = absen.blok');
        $builder->join('tahun', 'tahun.id_tahun = absen.tahun');
        
        if ($semester == 1) {
            $builder->whereIn('absen.blok', [2, 3, 4, 5]);
        } elseif ($semester == 2) {
            $builder->whereIn('absen.blok', [6, 7, 8, 9]);
        }
        
        if ($tahun) {
            $builder->where('absen.tahun', $tahun);
        }
        
        if ($rombel) {
            $builder->where('absen.rombel', $rombel);
        }
        
        $builder->select('siswa.id_siswa, 
          siswa.nama_siswa, 
          SUM(CASE WHEN absen.status = "H" THEN 1 ELSE 0 END) AS hadir,
          SUM(CASE WHEN absen.status = "S" THEN 1 ELSE 0 END) AS sakit,
          SUM(CASE WHEN absen.status = "I" THEN 1 ELSE 0 END) AS izin,
          SUM(CASE WHEN absen.status = "TK" THEN 1 ELSE 0 END) AS tanpa_keterangan');
        $builder->groupBy('siswa.id_siswa, siswa.nama_siswa');
        $builder->orderBy('siswa.nama_siswa', 'asc');
        
        $query = $builder->get();
        $results = $query->getResultArray();
        
        foreach ($results as &$row) {
            $hadir = $row['hadir'];
            $total = $hadir + $row['sakit'] + $row['izin'] + $row['tanpa_keterangan'];
            $persen = ($total > 0) ? ($hadir / $total) * 100 : 0;
            $row['persen'] = $persen;
        }
        
        return $results;
    }
    
    public function filterAbsensi($table, $blok, $tahun, $rombel)
    {
        $query = "
        SELECT $table.*
        FROM $table
        JOIN tahun ON $table.tahun = tahun.id_tahun
        JOIN blok ON $table.blok = blok.id_blok
        JOIN rombel ON $table.rombel = rombel.id_rombel
        JOIN siswa ON $table.siswa = siswa.id_siswa
        WHERE $table.blok = ? AND $table.tahun = ? AND $table.rombel = ?";
        
        return $this->db->query($query, [$blok, $tahun, $rombel])->getResult();
    }
    
    public function filter_hadir($table, $tanggal)
    {
        return $this->db->query("
            SELECT *
            FROM " . $table . "
            LEFT JOIN siswa ON " . $table . ".siswa = siswa.id_siswa
            WHERE " . $table . ".tanggal = '" . $tanggal . "'
            ")->getResult();
    }

    public function filter_hadir_e($table, $tanggal)
    {
        return $this->db->query("
            SELECT *
            FROM " . $table . "
            LEFT JOIN siswa ON " . $table . ".siswa = siswa.id_siswa
            LEFT JOIN mapel ON " . $table . ".mapel = mapel.id_mapel
            WHERE " . $table . ".tanggal = '" . $tanggal . "'
            ORDER BY sesi ASC
            ")->getResult();
    }
    
    public function filter_hadir_guru($table, $tanggal, $id_user)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->join('siswa', $table . '.siswa = siswa.id_siswa', 'left');
        $builder->join('kelas as kelas_siswa', 'siswa.kelas = kelas_siswa.id_kelas', 'left');
        $builder->join('guru', 'kelas_siswa.id_kelas = guru.kelas', 'left');
        $builder->where('guru.user', $id_user);
        $builder->where($table . '.tanggal', $tanggal);
        $builder->orderBy($table . '.created_at', 'desc');
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function filter_hadir_guru_e($table, $tanggal, $id_user)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->join('siswa', $table . '.siswa = siswa.id_siswa', 'left');
        $builder->join('mapel', $table . '.mapel = mapel.id_mapel');
        $builder->join('kelas as kelas_siswa', 'siswa.kelas = kelas_siswa.id_kelas', 'left');
        $builder->join('guru', 'kelas_siswa.id_kelas = guru.kelas', 'left');
        $builder->where('guru.user', $id_user);
        $builder->where($table . '.tanggal', $tanggal);
        $builder->orderBy($table . '.sesi', 'asc');
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function filterrr($table, $awal, $akhir)
    {
        return $this->db->query("
            SELECT *
            FROM ".$table."
            INNER JOIN siswa ON ".$table.".siswa = siswa.id_siswa
            WHERE ".$table.".tanggal BETWEEN '".$awal."' AND '".$akhir."'
            ")->getResult();
    }

    public function getPaymentDataBySiswaId($id_siswa)
    {
        return $this->db->table('pembayaran')
        ->join('siswa', 'pembayaran.siswa = siswa.id_siswa', 'left')
        ->where('pembayaran.siswa', $id_siswa)
        ->where('pembayaran.deleted_at', null)
        ->where('siswa.deleted_at', null)
        ->where('pembayaran.status', 'Uang-Kas') 
        ->where('pembayaran.status2', 'Lunas')   
        ->get()
        ->getResult();
    }

    public function getPaymenttDataBySiswaId($id_siswa)
    {
        return $this->db->table('pembayaran')
        ->join('siswa', 'pembayaran.siswa = siswa.id_siswa', 'left')
        ->where('pembayaran.siswa', $id_siswa)
        ->where('pembayaran.deleted_at', null)
        ->where('siswa.deleted_at', null)
        ->where('pembayaran.status', 'Uang-Kas')
        ->where('pembayaran.status2', 'Belum-Lunas')    
        ->get()
        ->getResult();
    }

    public function getdenda($id_siswa)
    {
        return $this->db->table('pembayaran')
        ->join('siswa', 'pembayaran.siswa = siswa.id_siswa', 'left')
        ->where('pembayaran.siswa', $id_siswa)
        ->where('pembayaran.deleted_at', null)
        ->where('siswa.deleted_at', null)
        ->where('pembayaran.status', 'Uang-Denda') 
        ->where('pembayaran.status2', 'Lunas')   
        ->get()
        ->getResult();
    }
        
    public function getdendaa($id_siswa)
    {
        return $this->db->table('pembayaran')
        ->join('siswa', 'pembayaran.siswa = siswa.id_siswa', 'left')
        ->where('pembayaran.siswa', $id_siswa)
        ->where('pembayaran.deleted_at', null)
        ->where('siswa.deleted_at', null)
        ->where('pembayaran.status', 'Uang-Denda') 
        ->where('pembayaran.status2', 'Belum-Lunas')    
        ->get()
        ->getResult();
    }

    public function getSiswaWithConditions($on, $on1, $on2, $id_guru)
    {
        $query = $this->db->table('siswa')
        ->join('kelas', $on)
        ->join('jurusan', $on1)
        ->join('rombel', $on2)
        ->where('rombel.guru', $id_guru) 
        ->get()
        ->getResult();
    }

    public function getGuruByUserId($id_user)
    {

        $query = $this->db->table('guru')
            ->where('user', $id_user)
            ->get();

        return $query->getRowArray();
    }

    public function join4_where($table1, $table2, $table3, $table4, $on1, $on2, $on3, $where)
    {
        $builder = $this->db->table($table1);
        $builder->select('*');
        $builder->join($table2, $on1);
        $builder->join($table3, $on2);
        $builder->join($table4, $on3);
        $builder->where($where);
        $query = $builder->get();

        return $query->getResult();
    }

    public function getSiswaByGuruId($id_user)
    {
        $builder = $this->db->table('siswa');
        $builder->select('*');
        $builder->join('kelas as kelas_siswa', 'siswa.kelas = kelas_siswa.id_kelas');
        $builder->join('guru', 'kelas_siswa.id_kelas = guru.kelas');
        $builder->where('guru.user', $id_user);
        $builder->orderBy('siswa.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getSiswaBySiswaId($id_user)
    {
        $builder = $this->db->table('siswa');
        $builder->select(['siswa.*', 'kelas.nama_kelas']);
        $builder->join('kelas', 'siswa.kelas = kelas.id_kelas');
            
        $kelasSiswa = $builder->where('siswa.user', $id_user)->get()->getRow();
        $id_kelas_siswa = $kelasSiswa->kelas;
            
        $builder->resetQuery();
        $builder->select(['siswa.*', 'kelas.nama_kelas']);
        $builder->join('kelas', 'siswa.kelas = kelas.id_kelas');
        $builder->where('siswa.kelas', $id_kelas_siswa);
        $builder->orderBy('siswa.created_at', 'desc');
            
        $query = $builder->get();
        return $query->getResult();
    }

    public function getSiswaBySiswaIdd($id_user)
    {
        $builder = $this->db->table('hadir');
        $builder->select('*');
            
        $kelasSiswa = $this->db->table('siswa')
        ->select('kelas')
        ->where('user', $id_user)
        ->get()
        ->getRow();
        $id_kelas_siswa = $kelasSiswa->kelas;

        $builder->join('siswa', 'hadir.siswa = siswa.id_siswa');
        $builder->where('siswa.kelas', $id_kelas_siswa);
        $builder->orderBy('hadir.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function filter_hadir_siswa($table, $tanggal, $id_user)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
            
        $kelasSiswa = $this->db->table('siswa')
            ->select('kelas')
            ->where('user', $id_user)
            ->get()
            ->getRow();
        $id_kelas_siswa = $kelasSiswa->kelas;

        $builder->join('siswa', $table . '.siswa = siswa.id_siswa');
        $builder->where('siswa.kelas', $id_kelas_siswa);
        $builder->where($table . '.tanggal', $tanggal);
        $builder->orderBy($table . '.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();

    }

    public function filter_hadir_siswa_e($table, $tanggal, $id_user)
    {
        $builder = $this->db->table($table);
        $builder->select('*');

        $kelasSiswa = $this->db->table('siswa')
        ->select('kelas')
        ->where('user', $id_user)
        ->get()
        ->getRow();
        $id_kelas_siswa = $kelasSiswa->kelas;

        $builder->join('siswa', $table . '.siswa = siswa.id_siswa');
        $builder->join('mapel', $table . '.mapel = mapel.id_mapel');
        $builder->where('siswa.kelas', $id_kelas_siswa);
        $builder->where($table . '.tanggal', $tanggal);
        $builder->orderBy($table . '.sesi', 'asc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getSiswaBySiswaIId($id_user)
    {
        $builder = $this->db->table('pelajaran');
        $builder->select('*');
            
        $kelasSiswa = $this->db->table('siswa')
        ->select('kelas')
        ->where('user', $id_user)
        ->get()
        ->getRow();
        $id_kelas_siswa = $kelasSiswa->kelas;

        $builder->join('mapel', 'pelajaran.mapel = mapel.id_mapel');
        $builder->join('siswa', 'pelajaran.siswa = siswa.id_siswa', 'left');
        $builder->where('siswa.kelas', $id_kelas_siswa);
        $builder->orderBy('pelajaran.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getSiswaByGuruId2($id_user)
    {
        $builder = $this->db->table('siswa');
        $builder->select('*');
        $builder->join('kelas as kelas_siswa', 'siswa.kelas = kelas_siswa.id_kelas');
        $builder->join('guru', 'kelas_siswa.id_kelas = guru.kelas');
        $builder->join('user', 'siswa.user = user.id_user');
        $builder->where('user.level', 4); 
        $builder->where('guru.user', $id_user);
        $builder->orderBy('siswa.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getSiswaByGuruIdd($id_user)
    {
        $builder = $this->db->table('hadir');
        $builder->select('*');
        $builder->join('siswa', 'hadir.siswa = siswa.id_siswa');
        $builder->join('kelas as kelas_siswa', 'siswa.kelas = kelas_siswa.id_kelas');
        $builder->join('guru', 'kelas_siswa.id_kelas = guru.kelas');
        $builder->where('guru.user', $id_user);
        $builder->orderBy('hadir.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getSiswaByGuruIId($id_user)
    {
        $builder = $this->db->table('pelajaran');
        $builder->select('*');
        $builder->join('siswa', 'pelajaran.siswa = siswa.id_siswa', 'left');
        $builder->join('mapel', 'pelajaran.mapel = mapel.id_mapel');
        $builder->join('kelas as kelas_siswa', 'siswa.kelas = kelas_siswa.id_kelas');
        $builder->join('guru', 'kelas_siswa.id_kelas = guru.kelas');
        $builder->where('guru.user', $id_user);
        $builder->orderBy('pelajaran.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllPaymentData()
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('*');
        $builder->join('siswa', 'pembayaran.siswa = siswa.id_siswa');
        $builder->where('pembayaran.deleted_at IS NULL');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllPData()
    {
        $jenjang = session()->get('jenjang'); 

        $query = $this->db->table('siswa')
        ->select('rombel.nama_r, user.id_user, user.jenjang, siswa.user, siswa.id_siswa, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan')
        ->join('rombel', 'rombel.id_rombel = siswa.rombel')
        ->join('user', 'user.id_user = siswa.user')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->orderBy('siswa.created_at', 'desc');

        if ($jenjang) {
            $query->where('user.jenjang', $jenjang);
        }

        return $query->get()->getResult();
    }

    public function getAllPDatat()
    {
        $jenjang = session()->get('jenjang'); 

        $query = $this->db->table('siswa')
        ->select('rombel.nama_r, user.id_user, user.jenjang, siswa.user, siswa.id_siswa, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, jurusan.nama_jurusan')
        ->join('rombel', 'rombel.id_rombel = siswa.rombel')
        ->join('user', 'user.id_user = siswa.user')
        ->join('kelas', 'kelas.id_kelas = rombel.kelas')
        ->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan')
        ->orderBy('siswa.created_at', 'desc');

        if ($jenjang) {
            $query->where('user.jenjang', $jenjang);
        }

        $query->where('user.level', 5);

        return $query->get()->getResult();
    }

    public function getAllPDatta()
    {
        $builder = $this->db->table('pelajaran');
        $builder->select('*');
        $builder->join('siswa', 'pelajaran.siswa = siswa.id_siswa', 'left');
        $builder->join('mapel', 'pelajaran.mapel = mapel.id_mapel');
        
        $builder->orderBy('pelajaran.created_at', 'desc');
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllPDataa()
    {
        $builder = $this->db->table('hadir');
        $builder->select('*');
        $builder->join('siswa', 'hadir.siswa = siswa.id_siswa');
        
        $builder->orderBy('hadir.created_at', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllPData2()
    {
        $builder = $this->db->table('siswa');
        $builder->select('*');
        $builder->join('kelas', 'siswa.kelas = kelas.id_kelas');
            $builder->join('user', 'siswa.user = user.id_user');
            $builder->where('user.level', 4);
            $builder->orderBy('siswa.created_at', 'desc');

            $query = $builder->get();
            return $query->getResult();
        }

    public function getPaymentDataByUserId($id_user)
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('*');
        $builder->join('siswa', 'pembayaran.siswa = siswa.id_siswa');
        $builder->join('rombel', 'siswa.rombel = rombel.id_rombel');
        $builder->join('guru', 'rombel.guru = guru.id_guru'); 
        $builder->where('guru.user', $id_user); 

        $query = $builder->get();
        return $query->getResult();
    }

    public function getPaymentDataByLoggedInStudent($userId)
    {
        $builder = $this->db->table('siswa');
        $builder->select('rombel');
        $builder->where('user', $userId);
            
        $query = $builder->get();
        $result = $query->getRow();

        if ($result) {
            $builder = $this->db->table('pembayaran');
            $builder->select('*');
            $builder->join('siswa', 'pembayaran.siswa = siswa.id_siswa');
            $builder->join('rombel', 'siswa.rombel = rombel.id_rombel');
            $builder->where('siswa.rombel', $result->rombel); 
            
            $query = $builder->get();
            return $query->getResult();
        }

        return []; 
    }

    public function getPaymentDataByLoggedInStudentpem($userId)
    {
        $builder = $this->db->table('siswa');
        $builder->select('rombel');
        $builder->where('user', $userId);
        
        $query = $builder->get();
        $result = $query->getRow();

        if ($result) {
            $builder = $this->db->table('siswa');
            $builder->select('*');
            $builder->join('kelas', 'siswa.kelas = kelas.id_kelas');
            $builder->join('jurusan', 'siswa.jurusan = jurusan.id_jurusan');
            $builder->join('rombel', 'siswa.rombel = rombel.id_rombel');
            $builder->where('rombel.id_rombel', $result->rombel);
            $builder->where('siswa.deleted_at', null); 
            
            $query = $builder->get();
            return $query->getResult();
        }

        return []; 
    }

    public function getPaymentDataByLoggedInStudentpen($userId)
    {
        $builder = $this->db->table('siswa');
        $builder->select('rombel');
        $builder->where('user', $userId);
        
        $query = $builder->get();
        $result = $query->getRow();

        if ($result) {
            $builder = $this->db->table('siswa');
            $builder->select('*');
            $builder->join('kelas', 'siswa.kelas = kelas.id_kelas');
            $builder->join('jurusan', 'siswa.jurusan = jurusan.id_jurusan');
            $builder->join('rombel', 'siswa.rombel = rombel.id_rombel');
            $builder->where('rombel.id_rombel', $result->rombel);
            $builder->where('siswa.deleted_at', null); 
            
            $query = $builder->get();
            return $query->getResult();
        }

        return []; 
    }

    public function getPaymentDataByLoggedInStudentt($userId)
    {
    
        $builder = $this->db->table('siswa');
        $builder->select('rombel');
        $builder->where('user', $userId);
        
        $query = $builder->get();
        $result = $query->getRow();

        if ($result) {
            $builder = $this->db->table('pengeluaran');
            $builder->select('*');
            $builder->join('siswa', 'pengeluaran.siswa = siswa.id_siswa');
            $builder->join('rombel', 'siswa.rombel = rombel.id_rombel');
            $builder->where('siswa.rombel', $result->rombel);
            
            $query = $builder->get();
            return $query->getResult();
        }

        return []; 
    }
    public function getPaymentDataByUserIdd($id_user)
    {
        $builder = $this->db->table('pengeluaran');
        $builder->select('*');
        $builder->join('siswa', 'pengeluaran.siswa = siswa.id_siswa');
        $builder->join('rombel', 'siswa.rombel = rombel.id_rombel');
        $builder->join('guru', 'rombel.guru = guru.id_guru'); 
        $builder->where('guru.user', $id_user); 

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllPaymentDataa()
    {
        $builder = $this->db->table('pengeluaran');
        $builder->select('*');
        $builder->join('siswa', 'pengeluaran.siswa = siswa.id_siswa');
        $builder->where('pengeluaran.deleted_at IS NULL');

        $query = $builder->get();
        return $query->getResult();
    }

    public function join9($table, $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $on, $on2, $on3, $on4, $on5, $on6, $on7, $on8)
    {
        return $this->db->table($table)
            ->join($t1, $on)
            ->join($t2, $on2)
            ->join($t3, $on3)
            ->join($t4, $on4)
            ->join($t5, $on5)
            ->join($t6, $on6)
            ->join($t7, $on7)
            ->join($t8, $on8)
            ->get()
            ->getResult();
    }

    public function getDataByFilterRombel($blok, $tahun, $rombel, $semester)
    {
        $builder = $this->db->table('absen');

        $builder->join('siswa', 'siswa.id_siswa = absen.siswa');
        $builder->join('rombel', 'rombel.id_rombel = absen.rombel');
        $builder->join('kelas', 'kelas.id_kelas = rombel.kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = rombel.jurusan');
        $builder->join('blok', 'blok.id_blok = absen.blok');
        $builder->join('tahun', 'tahun.id_tahun = absen.tahun');

        if ($blok) {
            $builder->where('absen.blok', $blok);
        }
        if ($tahun) {
            $builder->where('absen.tahun', $tahun);
        }
        if ($rombel) {
            $builder->where('absen.rombel', $rombel);
        }
        if ($semester) {
            $idBlokResults = $this->getIdSemesterBlok($semester);
            $idBloks = array_column($idBlokResults, 'id_blok');
            $builder->whereIn('absen.blok', $idBloks);
        }

        $builder->select('
            siswa.id_siswa, 
            siswa.nama_siswa, 
            SUM(CASE WHEN absen.status = "H" THEN 1 ELSE 0 END) AS hadir,
            SUM(CASE WHEN absen.status = "S" THEN 1 ELSE 0 END) AS sakit,
            SUM(CASE WHEN absen.status = "I" THEN 1 ELSE 0 END) AS izin,
            SUM(CASE WHEN absen.status = "TK" THEN 1 ELSE 0 END) AS tanpa_keterangan
        ');

        $builder->groupBy('siswa.id_siswa, siswa.nama_siswa');
        $builder->orderBy('siswa.nama_siswa', 'asc');

        $query = $builder->get();
        $results = $query->getResultArray();

        foreach ($results as &$row) {
            $hadir = $row['hadir'];
            $total = $hadir + $row['sakit'] + $row['izin'] + $row['tanpa_keterangan'];
            $persen = ($total > 0) ? ($hadir / $total) * 100 : 0;
            $row['persen'] = $persen;
        }

        return $results;
    }

    public function getNilaiSikap($id_siswa, $tahun, $blok)
    {
        return $this->db->table('nilai_sikap')
            ->select('catatan_wali')
            ->where('id_siswa', $id_siswa)
            ->where('id_tahun', $tahun)
            ->where('id_blok', $blok)
            ->get()
            ->getRow();
    }

    public function hitungPersenAbsen($id_siswa, $id_tahun, $id_blok, $id_rombel)
    {
        $query = $this->db->table('absen')
            ->select('status')
            ->where([
                'siswa' => $id_siswa,
                'tahun' => $id_tahun,
                'blok' => $id_blok,
                'rombel' => $id_rombel
            ])
            ->get();

        $rows = $query->getResult();

        $totalPertemuan = count($rows);
        if ($totalPertemuan == 0) {
            return 100;
        }

        $totalPoin = 0;
        foreach ($rows as $r) {
            $status = strtoupper($r->status);
            if ($status == 'H') {
                $totalPoin += 2;
            } elseif ($status == 'S' || $status == 'I') {
                $totalPoin += 1;
            }
        }

        $maksimalPoin = $totalPertemuan * 2;
        $persen = ($totalPoin / $maksimalPoin) * 100;

        return round($persen, 2);
    }

}