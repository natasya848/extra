<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6">
          <h3>Edit <?= esc($title) ?></h3>
          <p class="text-subtitle text-muted">
            Silakan edit data tugas.
          </p>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="card">
        <div class="card-body">

          <form action="<?= base_url('task/update/' . $task['id_task']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label>Nama Tugas</label>
              <input type="text" name="nama_tugas" class="form-control"
                     value="<?= esc($task['nama_tugas']) ?>" required>
            </div>

            <div class="mb-3">
              <label>Prioritas</label>
              <select name="prioritas" class="form-control" required>
                <option value="Rendah" <?= $task['prioritas']=='Rendah'?'selected':'' ?>>Rendah</option>
                <option value="Sedang" <?= $task['prioritas']=='Sedang'?'selected':'' ?>>Sedang</option>
                <option value="Tinggi" <?= $task['prioritas']=='Tinggi'?'selected':'' ?>>Tinggi</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Tanggal</label>
              <input type="date" name="tanggal" class="form-control"
                     value="<?= esc($task['tanggal']) ?>" required>
            </div>

            <div class="mb-3">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="Belum" <?= $task['status']=='Belum'?'selected':'' ?>>Belum</option>
                <option value="Selesai" <?= $task['status']=='Selesai'?'selected':'' ?>>Selesai</option>
              </select>
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary me-2">
                Update
              </button>
              <a href="<?= base_url('task') ?>" class="btn btn-secondary">
                Batal
              </a>
            </div>

          </form>

        </div>
      </div>
    </section>
  </div>
</div>
