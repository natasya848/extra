<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3><?= $title ?></h3>
                    <p class="text-subtitle text-muted">
                        Daftar tugas yang Anda miliki
                    </p>
                </div>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('task/tambah') ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah Tugas
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-task">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tugas</th>
                                    <th>Prioritas</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($list as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($row['nama_tugas']) ?></td>
                                    <td>
                                        <span class="badge 
                                            <?= $row['prioritas'] == 'Tinggi' ? 'bg-danger' :
                                                ($row['prioritas'] == 'Sedang' ? 'bg-warning' : 'bg-secondary') ?>">
                                            <?= $row['prioritas'] ?>
                                        </span>
                                    </td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td>
                                        <?php if ($row['status'] == 'Selesai'): ?>
                                            <span class="badge bg-success">Selesai</span>
                                        <?php else: ?>
                                            <span class="badge bg-info">Belum</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <?php if ($row['status'] == 'Belum'): ?>
                                                <a href="<?= base_url('task/selesai/' . $row['id_task']) ?>"
                                                   class="btn btn-sm btn-success">
                                                   ✔
                                                </a>
                                            <?php endif; ?>
                                            <a href="<?= base_url('task/edit/' . $row['id_task']) ?>"
                                               class="btn btn-sm btn-warning">
                                               ✎
                                            </a>
                                            <a href="<?= base_url('task/hapus/' . $row['id_task']) ?>"
                                               onclick="return confirm('Hapus tugas ini?')"
                                               class="btn btn-sm btn-danger">
                                               🗑
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#table-task').DataTable();
    });
</script>
