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

<section class="section">
	<div class="card">
		<div class="card-header">
	    </div>

        <div class="card-body">
		<div id="main-content">
    <h3><?= $title ?></h3>
    <p>Tahun: <?= $tahun->nama_t ?? '-' ?> | Semester: <?= $id_semester ?></p>

    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <td><?= $siswa->nis ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?= $siswa->nama_siswa ?></td>
        </tr>
        <tr>
            <th>Sikap Spiritual</th>
            <td><?= $siswa->sikap_spiritual ?></td>
        </tr>
        <tr>
            <th>Sikap Sosial</th>
            <td><?= $siswa->sikap_sosial ?></td>
        </tr>
        <tr>
            <th>Catatan Wali</th>
            <td><?= $siswa->catatan_wali ?></td>
        </tr>
    </table>

    <h4>Nilai Ekstra</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Ekstra</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ekstraList as $i => $ekstra): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $ekstra->nama_ekstra ?></td>
                    <td><?= $ekstra->nilai ?></td>
                    <td><?= $ekstra->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

	</div>
</div>

</script>
