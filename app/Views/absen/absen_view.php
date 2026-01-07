<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3><?=$title?></h3>
          <p class="text-subtitle text-muted">Anda dapat melihat <?=$title?> di bawah</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
      <div class="card">
        <div class="card-header">Data Absensi - Tanggal : <?= date('Y-m-d'); ?></div>
        
        <div class="card-body">
          <form method="post">
            <button class="btn btn-primary" type="submit" value="submit "style="position: absolute; top: 10px; right: 10px;">Tambah Absen</button>
            <div class="table-responsive">
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th hidden>Id Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($siswaData as $siswa) : ?>
                    <tr>
                      <td hidden><?= $siswa['id_siswa']; ?></td>
                      <td><?= $siswa['nama_siswa']; ?></td>
                      <td>
                        <input class="form-check-input" type="radio" name="status[<?= $siswa['id_siswa']; ?>]" value="H" checked> Hadir
                        <input class="form-check-input" type="radio" name="status[<?= $siswa['id_siswa']; ?>]" value="S"> Sakit
                        <input class="form-check-input" type="radio" name="status[<?= $siswa['id_siswa']; ?>]" value="I"> Izin
                        <input class="form-check-input" type="radio" name="status[<?= $siswa['id_siswa']; ?>]" value="TK"> Tanpa Keterangan
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                
              </table>


              <!-- Hidden input untuk rombel dan blok -->
              <input type="hidden" name="rombel" value="<?= $siswaData[0]['id_rombel']; ?>"> <!-- Mengambil id rombel dari salah satu siswa -->
              <input type="hidden" name="blok" value="<?= $blok['id_blok']; ?>"> <!-- Mengambil id blok yang aktif -->

              <!-- Input untuk submit absen -->

            </form>

          </div>
        </div>
      </div>
    </section>
    <!-- Basic Tables end -->
  </div>

  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
  // Ambil elemen radio button status
      const statusRadioButtons = document.querySelectorAll('input[type="radio"][name^="status["]');

  // Dapatkan tanggal hari ini
      const today = new Date();
      const formattedDate = today.toISOString().split("T")[0];

  // Ambil ID siswa dari kolom "Id Siswa" dalam tabel
      const idSiswaElements = document.querySelectorAll('table#table1 tbody tr td:first-child');

  // Loop melalui semua elemen ID siswa
      idSiswaElements.forEach((idSiswaElement, index) => {
    const idSiswa = idSiswaElement.textContent; // Ambil ID siswa dari elemen saat ini

    // Kirim permintaan AJAX untuk mengambil data status dari controller
    fetch("/absen/get_status_by_date", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ tanggal: formattedDate, id_siswa: idSiswa }), // Kirim tanggal dan ID siswa ke controller
    })
    .then((response) => response.json())
    .then((data) => {
      // Setel status radio button berdasarkan data izin/sakit dari server
      const radioHadir = statusRadioButtons[index * 4];
      const radioSakit = statusRadioButtons[index * 4 + 1];
      const radioIzin = statusRadioButtons[index * 4 + 2];

      // Cek status dari data yang diterima
      if (data.length > 0) {
        const siswaData = data[0];
        if (siswaData.status === "S") {
          radioSakit.checked = true;
        } else if (siswaData.status === "I") {
          radioIzin.checked = true;
        } else {
          radioHadir.checked = true;
        }
      } else {
        // Jika tidak ada data yang dikembalikan, setel radio button ke "Hadir"
        radioHadir.checked = true;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  });
    });
  </script>