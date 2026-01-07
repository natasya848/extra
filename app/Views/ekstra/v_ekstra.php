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

		<section class="section">
			<div class="card">
				<div class="card-header">
                    <a href="<?=base_url('tambah_ekstra')?>">
                        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                        Tambah</button>
                    </a>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table20">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Ekskul</th>
									<th>Pembina</th>
									<th>Hari</th>
									<th>Jam</th>
									<th>Status</th>
									<th>Keterangan</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach ($ekstra as $e): ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= esc($e['nama_ekstra']) ?></td>
										<td><?= esc($e['nama']) ?></td>
										<td><?= esc($e['hari']) ?></td>
										<td><?= esc($e['jam_mulai']) ?> - <?= esc($e['jam_selesai']) ?></td>
										<td>
											<?php if ($e['status'] == 'Aktif'): ?>
                                                <span class="badge bg-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Tidak Aktif</span>
                                            <?php endif; ?>
										</td>
										<td>
											<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalKeterangan<?= $e['id_ekstra'] ?>">
												Lihat
											</button>
										</td>
                                        <td>
                                            <a href="<?php echo base_url('edit_ekstra/'. $e['id_ekstra'])?>" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>

                                            <a href="<?php echo base_url('delete_ekstra/'. $e['id_ekstra'])?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
                                        </td>
									</tr>

									<div class="modal fade" id="modalKeterangan<?= $e['id_ekstra'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $e['id_ekstra'] ?>" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalLabel<?= $e['id_ekstra'] ?>">Keterangan Ekskul</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<?= !empty($e['keterangan']) ? esc($e['keterangan']) : 'Tidak ada keterangan.' ?>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
												</div>
											</div>
										</div>
									</div>

								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<script>
$(document).ready(function() {
	$('#table20').DataTable();
});
</script>
