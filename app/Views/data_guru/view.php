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
					<a href="<?php echo base_url('tambah_guru') ?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
							Tambah</button></a>
					<div class="btn-group">
						<!-- <div class="dropdown">
					<button class="btn btn-success btn-block dropdown-toggle me-1 mt-2" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Import
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
						<a class="dropdown-item" href="<?= base_url('template/template-guru/template-guru.xlsx') ?>"><i class="faj-button fa-solid fa-download"></i>Download Template
						</a>
						<a class="dropdown-item" data-bs-toggle="modal"
						data-bs-target="#modal-import">
						<i class="faj-button fa-solid fa-upload"></i>Import Data
					</a>
				</div>
			</div> -->
					</div>
				</div>

				<!-- Modal Import -->

				<div class="modal fade text-left" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="myModalLabel1">
									Import Data
								</h5>
								<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
									<i data-feather="x"></i>
								</button>
							</div>

							<form action="<?= base_url('data_guru/import_excel') ?>" method="post" enctype="multipart/form-data">
								<div class="modal-body">
									<label class="mb-2">File Excel</label>
									<input type="file" name="file_excel" class="form-control" required>
								</div>
								<div class="modal-footer">
									<?php if (session()->get('level') == 1) { ?>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
											<i class="bx bx-x d-block d-sm-none"></i>
											<span class="d-none d-sm-block">Cancel</span>
										</button>
										<button type="submit" class="btn btn-primary ms-1">
											<i class="bx bx-check d-block d-sm-none"></i>
											<span class="d-none d-sm-block">Upload</span>
										</button>
									<?php } ?>
								</div>
							</form>

						</div>
					</div>
				</div>

				<!-- =================================================================================== -->

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table2">
							<thead>
								<tr>
									<th>No</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Rombel</th>
									<th>Jabatan</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$no = 1;
							foreach ($a as $b) {
							?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $b->nik ?> </td>
									<td><?php echo $b->nama ?> </td>
									<td>
										<?php
										if ($b->nama_kelas === $b->nama_r) {
											echo $b->nama_kelas;
										} else {
											echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan;
										}
										?>
									</td>
									<td><?php echo $b->nama_jabatan ?></td>
									<td>
										<a href="<?= base_url('edit_guru/'.$b->user) ?>" class="btn btn-warning btn-sm my-1">
											<i class="fa-solid fa-pen-to-square"></i>
										</a>

										<a href="<?= base_url('delete_guru/'.$b->user) ?>" 
										class="btn btn-danger btn-sm my-1"
										onclick="return confirm('Yakin ingin menghapus data guru ini?')">
											<i class="fa-solid fa-trash"></i>
										</a>
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
					$('#table2').DataTable({});
				});
			</script>