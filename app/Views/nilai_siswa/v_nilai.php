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
		<div class="table-responsive">
			<table class="table table-striped" id="table17">
				<thead>
					<tr>
						<th>No</th>
                        <th>Rombel</th>
                        <th>Wali Kelas</th>
						<th>Lihat Nilai</th>
					</tr>
				</thead>
                    <?php $no = 1; foreach ($rombel as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r['nama_kelas'] ?> . <?= $r['nama_r'] ?>, <?= $r['jurusan_detail'] ?> - <?= $r['nama_jenjang'] ?></td>
                        <td><?= $r['nama'] ?></td>
                        <td>
							<a href="<?= base_url('nilai_siswa/info/'. $r['id_rombel']) ?>" class="btn btn-info btn-lg fw-bold">
								<i class="fa fa-info-circle me-1"></i> Lihat Nilai
							</a>
						</td>
                    </tr>
                    <?php endforeach; ?>
			</table>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    const table = $('#table17').DataTable();
});
</script>
