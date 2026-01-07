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
				<div class="card-header">
					<a href="<?php echo base_url('agendapkl/data_agenda/aksi_tambah/') ?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
							Tambah</button></a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tanggal</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$no = 1;
							foreach ($jojo as $riz) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?php echo $riz->nama_siswa ?></td>
									<td><?php echo date('d F Y', strtotime($riz->tanggal)) ?></td>
									<td>
										<?php if ($riz->senyum === null && $riz->kondisi === null) { ?>
											<a href="<?php echo base_url('agendapkl/data_agenda/create/' . $riz->id_agenda) ?>" class="btn btn-secondary rounded-pill my-1"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="<?php echo base_url('agendapkl/data_agenda/aksi_logout/' . $riz->id_agenda) ?>" class="btn btn-warning rounded-pill my-1"><i class="fa-solid fa-power-off"></i></a>
											<span class="rounded-pill bg-danger text-white px-3 py-2">Belum Review</span>

										<?php } else if ($riz->senyum === null && $riz->approve_g === null || $riz->kondisi === 1) { ?>
											<span class="rounded-pill bg-danger text-white px-3 py-2">Belum Review & Approve</span>

										<?php } else if ($riz->senyum !== null && $riz->approve_g === null || $riz->kondisi === 1) { ?>
											<a href="<?php echo base_url('agendapkl/data_agenda/agenda/' . $riz->id_agenda) ?>" class="btn btn-primary rounded-pill my-1">
												<i class="fa-solid fa-circle-info"></i>
											</a>
											<span class="rounded-pill bg-warning text-dark px-3 py-2">Belum Approve</span>

										<?php } else if ($riz->senyum !== null && $riz->approve_g !== null || $riz->kondisi === 1) { ?>
											<a href="<?php echo base_url('agendapkl/data_agenda/agenda/' . $riz->id_agenda) ?>" class="btn btn-primary rounded-pill my-1">
												<i class="fa-solid fa-circle-info"></i>
											</a>
											<span class="rounded-pill bg-success text-white px-3 py-2">Selesai</span>
										<?php } ?>

									</td>
								</tr>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>