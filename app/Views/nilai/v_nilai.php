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

	<!-- Tampilkan pesan sukses jika ada -->
	<?php if (session()->getFlashdata('success')) : ?>
	<div class="alert alert-success alert-dismissible show fade">
		<?= session()->getFlashdata('success') ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif; ?>

<section class="section">
	<div class="card">
		<div class="card-header">
			<a href="<?php echo base_url('nilai/tambah_nilai/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
			Tambah</button></a>
		
	</div>

	<!-- Modal Import -->

	

	<!-- =================================================================================== -->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped" id="table2">
				<thead>
					<tr>
						<th>No</th>
						<th>Siswa</th>
						<th>Nilai Pengetahuan</th>
						<th>Nilai Keterampilan</th>
                        <th>Blok</th>
                        <th>Mapel</th>
                        <th>Rombel</th>
                        <th>Guru</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				$no=1;
				foreach ($a as $b) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b->nama_siswa?> </td>
						<td><?php echo $b->pengetahuan?> </td>
                        <td><?php echo $b->keterampilan?> </td>
                        <td><?php echo $b->nama_b?> </td>
                        <td><?php echo $b->nama_mapel?> </td>
						<td><?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?></td>
                        <td><?php echo $b->nama?> </td>
						<td>
							<a href="<?php echo base_url('nilai/edit_nilai/'. $b->id_nilai)?>" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>

							<a href="<?php echo base_url('nilai/delete_nilai/'. $b->id_nilai)?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
						</td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#table2').DataTable({
		});
	});
</script>