<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pendaftaran Ekskul</h3>
                    <p class="text-subtitle text-muted">
                        Silakan Masukkan Pendaftaran Ekskul
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb"
                        class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Pendaftaran Ekskul
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- SECTION -->
        <section class="section">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <?php if ($totalEkskul >= 4): ?>
                                    <div class="alert alert-warning">
                                        Kamu sudah mengambil maksimal 4 ekskul
                                    </div>
                                <?php else: ?>
                                    <form action="<?= base_url('simpan') ?>" method="post">
                                        <?= csrf_field() ?>
                                        

                                        <div class="mb-3">
                                            <label class="form-label">Nama Siswa</label>
                                            <input type="text"
                                                class="form-control"
                                                value="<?= session()->get('nama') ?>"
                                                readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Pilih Ekstrakurikuler</label>
                                            <select name="id_ekstra"
                                                class="form-select"
                                                required>
                                                <option value="">-- Pilih Ekskul --</option>
                                                <?php foreach ($ekstra as $e): ?>
                                                    <option value="<?= $e['id_ekstra'] ?>">
                                                        <?= $e['nama_ekstra'] ?>
                                                        (<?= $e['hari'] ?>
                                                        <?= $e['jam_mulai'] ?> -
                                                        <?= $e['jam_selesai'] ?>)
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit"
                                                class="btn btn-primary">
                                                Daftar Ekskul
                                            </button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
