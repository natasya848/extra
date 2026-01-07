<?php
$id_user = session()->get('id');
$level = session()->get('level');
$db = \Config\Database::connect();

$query = $db->table('guru')
    ->select('rombel.jurusan') // Pilih kolom jurusan dari tabel rombel
    ->join('rombel', 'rombel.id_rombel = guru.rombel') // Bergabung dengan tabel rombel berdasarkan kolom rombel pada tabel guru dan id_rombel pada tabel rombel
    ->where('guru.user', $id_user) // Sesuaikan pengecekan berdasarkan kolom user pada tabel guru
    ->get();

if ($query->getNumRows() > 0) {
    $row = $query->getRow();
    $jurusan = $row->jurusan;

    // Langsung redirect jika level dan jurusan sesuai
    if ($level == 3 && $jurusan == 2) {
        header("Location: " . base_url('agendapkl/data_agenda_all/menu_print_rpl/'));
        exit(); // Pastikan untuk keluar dari script setelah melakukan redirect
    }

	if ($level == 3 && $jurusan == 3) {
        header("Location: " . base_url('agendapkl/data_agenda_all/menu_print_akl/'));
        exit(); // Pastikan untuk keluar dari script setelah melakukan redirect
    }

	if ($level == 3 && $jurusan == 4) {
        header("Location: " . base_url('agendapkl/data_agenda_all/menu_print_bdp/'));
        exit(); // Pastikan untuk keluar dari script setelah melakukan redirect
    }
	
    // Lanjutkan menampilkan halaman jika level dan jurusan tidak sesuai
?>

<?php } ?>