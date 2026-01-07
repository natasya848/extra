<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6">
          <h3><?= esc($title) ?></h3>
          <p class="text-subtitle text-muted">
            Silakan masukkan data tugas baru
          </p>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="card">
        <div class="card-body">

          <form action="<?= base_url('task/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label>Nama Tugas</label>
              <input type="text" name="nama_tugas" class="form-control"
                     placeholder="Contoh: Mengerjakan laporan" required>
            </div>

            <div class="mb-3">
              <label>Prioritas</label>
              <select name="prioritas" class="form-control" required>
                <option value="Rendah">Rendah</option>
                <option value="Sedang" selected>Sedang</option>
                <option value="Tinggi">Tinggi</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Tanggal</label>
              <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="Belum" selected>Belum</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary me-2">
                Simpan
              </button>
              <a href="<?= base_url('task') ?>" class="btn btn-secondary">
                Kembali
              </a>
            </div>

          </form>

        </div>
      </div>
    </section>
  </div>
</div>
