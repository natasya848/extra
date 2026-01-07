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
                            <li class="breadcrumb-item"><a href="<?=base_url('agendapkl/dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">

                <div class="card-header">
    <div class="row">
        <!-- Tombol Absensi -->
        <div class="col-md-6 d-flex align-items-center">
            <a href="<?= base_url('agendapkl/data_absensi_sekolah/create_all_bdp') ?>">
                <button class="btn btn-primary mt-2">
                    <i class="fa-solid fa-plus"></i> Absensi
                </button>
            </a>
        </div>

        <!-- Filter Tanggal -->
        <div class="col-md-6">
            <form method="get" action="<?= base_url('agendapkl/data_absensi_sekolah/bdp') ?>" class="d-flex justify-content-end">
                <input type="date" name="filter_tanggal" class="form-control me-2" value="<?= isset($_GET['filter_tanggal']) ? $_GET['filter_tanggal'] : date('Y-m-d') ?>">
                <button type="submit" class="btn btn-outline-secondary">Filter</button>
            </form>
        </div>
    </div>
</div>

                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
    <?php $no = 1; ?>
    <?php foreach ($jojo as $riz) :
        $selectedKeterangan = isset($absensiHariIni[$riz->user]) ? $absensiHariIni[$riz->user] : '';
       $idAbsensi = isset($absensiId[$riz->user]) ? $absensiId[$riz->user] : null;
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $riz->nama_siswa ?></td>
            <td>
    <?php if ($idAbsensi): ?>
    <div class="d-flex align-items-center">
        <input type="hidden" name="id" value="<?= $idAbsensi ?>">
        <select name="keterangan" class="form-select me-2 keterangan-select"
        data-id="<?= $idAbsensi ?>"
        data-url="<?= base_url('agendapkl/data_absensi_sekolah/aksi_edit_ajax') ?>"
        required>
    <option value="">- Pilih Keterangan -</option>
    <?php foreach ($keterangan as $k) : ?>
        <option value="<?= $k->id_keterangan ?>" <?= ($k->id_keterangan == $selectedKeterangan) ? 'selected' : '' ?>>
            <?= $k->nama_keterangan ?>
        </option>
    <?php endforeach; ?>
</select>
<span class="status ms-2"></span> <!-- tempat status -->

    </div>
    <?php else: ?>
        <span class="text-muted">Belum ada data</span>
    <?php endif; ?>
</td>

        </tr>
    <?php endforeach; ?>
</tbody>

    </table>
                    </div>
                </div>
            </div>

            <script>
document.querySelectorAll('.keterangan-select').forEach(select => {
    select.addEventListener('change', function () {
        const id = this.dataset.id;
        const url = this.dataset.url;
        const value = this.value;
        const statusSpan = this.nextElementSibling;

        // Tampilkan loading
        statusSpan.innerHTML = '<i class="fa fa-spinner fa-spin text-warning"></i>';

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${id}&keterangan=${value}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                statusSpan.innerHTML = '<i class="fa fa-check text-success"></i>';
            } else {
                statusSpan.innerHTML = '<i class="fa fa-times text-danger"></i>';
            }
        })
        .catch(err => {
            console.error(err);
            statusSpan.innerHTML = '<i class="fa fa-exclamation-triangle text-danger"></i>';
        });
    });
});
</script>
