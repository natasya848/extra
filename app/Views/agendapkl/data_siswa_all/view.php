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
							<li class="breadcrumb-item"><a href="<?= base_url('agendapkl/dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>NIS</th>
									<th>Nama</th>
									<th>Jurusan</th>
									<th>Instruktur</th>
									<th>Perusahaan</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$no = 1;
							foreach ($jojo as $riz) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?php echo $riz->nis ?></td>
									<td><?php echo $riz->nama_siswa ?></td>
									<td><?php echo $riz->nama_jurusan ?></td>
									<td><?php echo $riz->nama_instruktur ?></td>
									<td><?php echo $riz->nama_perusahaan ?></td>
									<td>
										<a href="<?php echo base_url('agendapkl/data_siswa_all/edit/' . $riz->user_siswa) ?>" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
									</td>
								</tr>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>