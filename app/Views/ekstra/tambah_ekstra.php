<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Input <?= $title ?></h3>
          <p class="text-subtitle text-muted">Silakan Masukkan <?= $title ?></p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('login/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Input <?= $title ?></li>
            </ol> 
          </nav>
        </div>
      </div>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible show fade">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible show fade">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <section id="basic-horizontal-layouts">
      <div class="row justify-content">
        <div class="col-md-10">
          <div class="card shadow-sm">
            <div class="card-header">
            </div>
            <div class="card-body pt-2">
              <form action="<?= base_url('aksi_tambah_ekstra') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                  <label for="nama_ekstra" class="form-label">Nama Ekskul</label>
                  <input type="text" id="nama_ekstra" name="nama_ekstra" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label for="id_guru" class="form-label">Guru</label>
                  <select name="pembina" id="id_guru" class="form-control" required>
                    <option value="">- Pilih Guru -</option>
                    <?php foreach ($guru as $g): ?>
                      <option value="<?= $g->id_guru ?>"><?= $g->nama ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="hari" class="form-label">Hari</label>
                  <select name="hari" id="hari" class="form-control" required>
                    <option value="">- Pilih Hari -</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                  </select>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="jam_selesai" class="form-control" required>
                  </div>
                </div>

                <div class="mb-4">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-2">Simpan</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>
