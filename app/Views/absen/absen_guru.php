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

          <div class="mb-3">
              <form method="get">
                  <label class="form-label">Pilih Ekskul</label>
                  <select name="id_ekstra" class="form-select"
                          onchange="this.form.submit()" required>
                      <option value="">-- Pilih Ekskul --</option>
                      <?php foreach ($ekstraList as $e): ?>
                          <option value="<?= $e['id_ekstra'] ?>"
                              <?= ($idEkstra == $e['id_ekstra']) ? 'selected' : '' ?>>
                              <?= $e['nama_ekstra'] ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </form>
          </div>

          <?php if ($idEkstra): ?>
          <form action="<?= base_url('simpan') ?>" method="post">
            <?= csrf_field() ?>
              <input type="hidden" name="id_ekstra" value="<?= $idEkstra ?>">

              <button class="btn btn-primary mb-3" type="submit">
                  Simpan Absensi
              </button>

              <div class="table-responsive">
                  <table class="table" id="table1">
                      <thead>
                          <tr>
                              <th>Nama Siswa</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($siswaData as $siswa): ?>
                          <tr>
                              <td><?= $siswa['nama_siswa']; ?></td>
                              <td>
                                  <input type="radio"
                                        name="status[<?= $siswa['id_siswa']; ?>]"
                                        value="H" checked> Hadir
                                  <input type="radio"
                                        name="status[<?= $siswa['id_siswa']; ?>]"
                                        value="S"> Sakit
                                  <input type="radio"
                                        name="status[<?= $siswa['id_siswa']; ?>]"
                                        value="I"> Izin
                                  <input type="radio"
                                        name="status[<?= $siswa['id_siswa']; ?>]"
                                        value="TK"> Tanpa Keterangan
                              </td>
                          </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </form>
          <?php endif; ?>

      </div>

      </div>
    </section>
  </div>

  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
  const statusRadioButtons = document.querySelectorAll('input[type="radio"][name^="status["]');

  const today = new Date();
  const formattedDate = today.toISOString().split("T")[0];

  const idSiswaElements = document.querySelectorAll('table#table1 tbody tr td:first-child');

  idSiswaElements.forEach((idSiswaElement, index) => {
    const idSiswa = idSiswaElement.textContent; 

    fetch("get_status_by_date", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ tanggal: formattedDate, id_siswa: idSiswa }), 
    })
    .then((response) => response.json())
    .then((data) => {
      const radioHadir = statusRadioButtons[index * 4];
      const radioSakit = statusRadioButtons[index * 4 + 1];
      const radioIzin = statusRadioButtons[index * 4 + 2];

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
        radioHadir.checked = true;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  });
});
</script>

