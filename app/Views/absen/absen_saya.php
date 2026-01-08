<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $title ?></h3>
                    <p class="text-subtitle text-muted">Anda dapat melihat <?= $title ?> di bawah</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
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
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Data Siswa</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NIS</th>
                        <td><?= $siswa['nis'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $siswa['nama_siswa'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <th>Tahun</th>
                        <td><?= $tahun['nama_t'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td><?= $semester['nama_s'] ?? '-' ?></td>
                    </tr>
                </table>

                <h4 class="mt-4">Rekap Absensi</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($absenData as $row): ?>
                            <tr>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
