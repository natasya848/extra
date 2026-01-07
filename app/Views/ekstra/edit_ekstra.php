<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit <?= $title ?></h3>
          <p class="text-subtitle text-muted">Silakan edit data <?= $title ?></p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Edit <?= $title ?>
              </li>
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
          <div class="card">
            <div class="card-content">
              <div class="card-body pt-2">
                <form class="form-horizontal" action="<?= base_url('aksi_edit_ekstra/' . $ekstra['id_ekstra']) ?>" method="post">
                  <?= csrf_field() ?>
                  <input type="hidden" name="id_ekstra" value="<?= $ekstra['id_ekstra'] ?>">
                  <div class="form-body">

                    <div class="mb-3">
                        <label>Nama Ekstrakurikuler</label>
                        <input type="text" name="nama_ekstra" class="form-control" value="<?= $ekstra['nama_ekstra'] ?>" required>
                    </div>

                     <div class="mb-3">
                        <label>Pembina</label>
                        <select name="pembina" class="form-control" required>
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['id_guru'] ?>" <?= $g['id_guru'] == $ekstra['pembina'] ? 'selected' : '' ?>>
                                    <?= $g['nama'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Hari</label>
                        <input type="text" name="hari" class="form-control" value="<?= $ekstra['hari'] ?>">
                    </div>

                    <div class="mb-3">
                        <label>Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" value="<?= $ekstra['jam_mulai'] ?>">
                    </div>

                    <div class="mb-3">
                        <label>Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" value="<?= $ekstra['jam_selesai'] ?>">
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"><?= $ekstra['keterangan'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Aktif" <?= $ekstra['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="Tidak Aktif" <?= $ekstra['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                        <a href="<?= base_url('ekstra') ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div><!-- end card-body -->
            </div><!-- end card-content -->
          </div><!-- end card -->
        </div>
      </div>
    </section>
  </div>
</div>
