
<style>
	.legend-dot {
		display: inline-block;
		height: 12px;
		width: 12px;
		border-radius: 50%;
		margin-right: 6px;
	}
	.legend-item {
		margin-right: 20px;
		display: inline-flex;
		align-items: center;
		font-size: 14px;
	}
	.tr-ketua,
	.tr-ketua * {
		background-color: #6ECB63 !important;
		color: #000 !important;
	}

	.tr-sekretaris,
	.tr-sekretaris * {
		background-color: #FFD966 !important;
		color: #000 !important;
	}

	.table-warning * {
		color: #000 !important;
	}
	.table-success * {
		color: #000 !important;
	}

</style>

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
				</div>
				<div class="card-body">
					<div class="mb-3">
						<div class="legend-item"><span class="legend-dot" style="background-color:#6ECB63;"></span> Ketua Kelas</div>
						<div class="legend-item"><span class="legend-dot" style="background-color:#FFD966;"></span> Sekretaris</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="selectKetua" class="form-label fw-bold">Pilih Ketua Kelas</label>
							<select id="selectKetua" class="form-select" data-role="Ketua Kelas">
								<option value="">-- Pilih Ketua Kelas --</option>
								<?php foreach ($siswa as $s): ?>
									<option value="<?= $s->id_siswa ?>" <?= $s->nama_jabatan == 'Ketua Kelas' ? 'selected' : '' ?>>
										<?= $s->nama_siswa ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="selectSekretaris" class="form-label fw-bold">Pilih Sekretaris</label>
							<select id="selectSekretaris" class="form-select" data-role="Sekretaris">
								<option value="">-- Pilih Sekretaris --</option>
								<?php foreach ($siswa as $s): ?>
									<option value="<?= $s->id_siswa ?>" <?= $s->nama_jabatan == 'Sekretaris' ? 'selected' : '' ?>>
										<?= $s->nama_siswa ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="mb-3 d-flex flex-wrap gap-2">
						<ul class="nav nav-tabs mb-3 ms-4" style="--bs-nav-tabs-link-active-bg: #AEE2FF;">
							<?php for ($i = 1; $i <= 8; $i++): ?>
								<li class="nav-item">
									<a class="nav-link <?= ($id_blok == $i) ? 'active' : '' ?>" 
									href="<?= base_url('nilai_siswa/nilai_kelas/' . $id_rombel . '/' . $i) ?>"
									style="<?= ($id_blok == $i) ? 'background-color:#AEE2FF; color:#000;' : 'color:#555;' ?>">
										Blok <?= $i ?>
									</a>
								</li>
							<?php endfor; ?>
						</ul>
					</div>

					
							<div class="table-responsive">
								<table class="table table-striped" id="table9">
									<thead>
										<tr>
											<th>No</th>
											<th>NIS</th>
											<th>Nama Siswa</th>
											<th>Sikap Sosial</th>
											<th>Sikap Spiritual</th>
											<th>Catatan</th>
											<th>Absensi</th>
											<th>Nilai Ekstrakurikuler</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($siswa as $s): ?>
											<tr class="<?= $s->nama_jabatan == 'Ketua Kelas' ? 'tr-ketua' : ($s->nama_jabatan == 'Sekretaris' ? 'tr-sekretaris' : '') ?>">
												<td><?= $no++ ?></td>
												<td>
													<?= $s->nis ?>
													<input type="hidden" name="id_siswa[]" value="<?= $s->id_siswa ?>">
												</td>
												<td><?= $s->nama_siswa ?></td>
												<td>
													<select class="form-select input-edit" data-nis="<?= $s->nis; ?>" data-field="sikap_sosial">
														<option value="" <?= $s->sikap_sosial == '' ? 'selected' : '' ?>>-</option>
														<option value="Baik" <?= $s->sikap_sosial == 'Baik' ? 'selected' : '' ?>>Baik</option>
														<option value="Cukup" <?= $s->sikap_sosial == 'Cukup' ? 'selected' : '' ?>>Cukup</option>
														<option value="Kurang" <?= $s->sikap_sosial == 'Kurang' ? 'selected' : '' ?>>Kurang</option>
													</select>
												</td>
												<td>
													<select class="form-select input-edit" data-nis="<?= $s->nis; ?>" data-field="sikap_spiritual">
														<option value="" <?= $s->sikap_spiritual == '' ? 'selected' : '' ?>>-</option>
														<option value="Baik" <?= $s->sikap_spiritual == 'Baik' ? 'selected' : '' ?>>Baik</option>
														<option value="Cukup" <?= $s->sikap_spiritual == 'Cukup' ? 'selected' : '' ?>>Cukup</option>
														<option value="Kurang" <?= $s->sikap_spiritual == 'Kurang' ? 'selected' : '' ?>>Kurang</option>
													</select>
												</td>
												<td>
													<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCatatan<?= $s->id_siswa ?>">
														Lihat Catatan
													</button>
													<input type="hidden" name="catatan_wali[]" id="catatanInput<?= $s->id_siswa ?>" value="<?= htmlspecialchars($s->catatan_wali) ?>">
												</td>
												<td>
													<?php
														$hadir = $s->absen_hadir ?? 0;
														$sakit = $s->absen_sakit ?? 0;
														$izin = $s->absen_izin ?? 0;
														$alpha = $s->absen_alpha ?? 0;
														$total = $hadir + $sakit + $izin + $alpha;
														$persen_hadir = $total > 0 ? round(($hadir / $total) * 100, 2) : 0;
													?>
													<button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAbsensi<?= $s->id_siswa ?>">
														Persen Hadir: <strong><?= $persen_hadir ?>%</strong>
													</button>
												</td>
												<td>
													<button class="btn btn-sm btn-outline-info"
														onclick="bukaModalEkstraDetail('<?= $s->id_siswa ?>')">
														Lihat Nilai Ekstra
													</button>

													<button type="button" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalEkstra<?= $s->id_siswa ?>">
														<i class="bi bi-pencil-square me-1"></i> Input Nilai
													</button>

														<div class="modal fade" id="modalEkstra<?= $s->id_siswa ?>" tabindex="-1" aria-labelledby="labelEkstra<?= $s->id_siswa ?>" aria-hidden="true">
															<div class="modal-dialog">
																<form class="form-ekstra" method="post" id="formEkstra<?= $s->id_siswa ?>">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Input Nilai Ekstrakurikuler - <?= $s->nama_siswa ?></h5>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<input type="hidden" name="id_siswa" value="<?= $s->id_siswa ?>">
																			<input type="hidden" name="id_tahun" value="<?= $id_tahun ?>">
																			<input type="hidden" name="id_blok" value="<?= $id_blok ?>">
																			<input type="hidden" name="input_by" value="<?= session()->get('id') ?>">

																		<div class="mb-3">
																			<label class="form-label">Semester</label>
																			<input type="text" class="form-control" value="Semester <?= ($id_blok <= 4) ? 1 : 2 ?>" readonly>
																		</div>

																		<div class="mb-3">
																			<label for="id_ekstra<?= $s->id_siswa ?>" class="form-label">Ekstrakurikuler</label>
																			<select name="id_ekstra" id="id_ekstra<?= $s->id_siswa ?>" class="form-select" required>
																				<option value="">-- Pilih Ekstra --</option>
																					<?php foreach ($ekstraList as $ek): ?>
																						<option value="<?= $ek->id_ekstra ?>"><?= $ek->nama_ekstra ?></option>
																					<?php endforeach; ?>
																			</select>
																		</div>

																		<div class="mb-3">
																			<label for="nilai<?= $s->id_siswa ?>" class="form-label">Nilai</label>
																			<select name="nilai" id="nilai<?= $s->id_siswa ?>" class="form-select" required>
																				<option value="">-- Pilih Nilai --</option>
																				<option value="A">A - Sangat Baik</option>
																				<option value="B">B - Baik</option>
																				<option value="C">C - Cukup</option>
																				<option value="D">D - Kurang</option>
																			</select>
																		</div>

																		<div class="mb-3">
																			<label for="keterangan<?= $s->id_siswa ?>" class="form-label">Keterangan</label>
																				<textarea name="keterangan" id="keterangan<?= $s->id_siswa ?>" class="form-control" rows="3"></textarea>
																		</div>
																	</div>

																	<div class="modal-footer">
																		<div id="statusEkstra<?= $s->id_siswa ?>" class="me-auto"></div>
																			<button type="button" class="btn btn-success btn-simpan-ekstra" data-id="<?= $s->id_siswa ?>">Simpan</button>
																			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>

												</td>
												<td>
													<div class="mt-2">
														<span class="status-icon-ekstra" id="statusEkstra<?= $s->nis ?>"></span>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</tr>
								</tbody>
							</table>

							
						<?php foreach ($siswa as $s): ?>
							<!-- Modal Catatan -->
							<div class="modal fade" id="modalCatatan<?= $s->id_siswa ?>" tabindex="-1" aria-labelledby="catatanLabel<?= $s->id_siswa ?>" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content">
										<div class="modal-header bg-secondary text-white">
											<h5 class="modal-title">Catatan Wali Kelas - <?= $s->nama_siswa ?></h5>
											<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
										</div>
										<div class="modal-body">
											<textarea class="form-control input-edit" data-nis="<?= $s->nis; ?>" data-field="catatan_wali"><?= $s->catatan_wali; ?></textarea>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" onclick="simpanCatatan(<?= $s->id_siswa ?>)" data-bs-dismiss="modal">Simpan</button>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>


<?php foreach ($siswa as $s): 
    $hadir = $s->absen_hadir ?? 0;
    $sakit = $s->absen_sakit ?? 0;
    $izin = $s->absen_izin ?? 0;
    $alpha = $s->absen_alpha ?? 0;

	$total1 = $hadir;
    $total = $hadir + $sakit + $izin + $alpha;
    $persen_hadir = $total > 0 ? round(($hadir / $total) * 100, 2) : 0;
?>
<div class="modal fade" id="modalAbsensi<?= $s->id_siswa ?>" tabindex="-1" aria-labelledby="absensiLabel<?= $s->id_siswa ?>" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="absensiLabel<?= $s->id_siswa ?>">Detail Absensi - <?= $s->nama_siswa ?></h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
			</div>
			<div class="modal-body">
				<div class="row text-center">
					<div class="col-md-3 mb-3">
						<div class="border rounded py-2 bg-light">
							<h6 class="text-muted">Hadir</h6>
							<h4 class="text-success"><?= $hadir ?> Hari</h4>
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<div class="border rounded py-2 bg-light">
							<h6 class="text-muted">Sakit</h6>
							<h4 class="text-warning"><?= $sakit ?> Hari</h4>
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<div class="border rounded py-2 bg-light">
							<h6 class="text-muted">Izin</h6>
							<h4 class="text-primary"><?= $izin ?> Hari</h4>
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<div class="border rounded py-2 bg-light">
							<h6 class="text-muted">Tanpa Keterangan</h6>
							<h4 class="text-danger"><?= $alpha ?> Hari</h4>
						</div>
					</div>
				</div>

				<hr>

				<div class="text-center">
					<h5>Total Kehadiran: <?= $total1 ?> Hari</h5>
					<h5 class="text-success">Persentase Hadir: <?= $persen_hadir ?>%</h5>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>


<?php foreach ($siswa as $s): ?>
<div class="modal fade" id="modalEkstraDetail<?= $s->id_siswa ?>" tabindex="-1" aria-labelledby="modalEkstraDetailLabel<?= $s->id_siswa ?>" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEkstraDetailLabel<?= $s->id_siswa ?>">Detail Nilai Ekstrakurikuler</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
			</div>
			<div class="modal-body">
				<?php if (!empty($s->ekstra)): ?> 
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Ekstrakulikuler</th>
								<th>Nilai</th>
								<th>Deskripsi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($s->ekstra as $e): 
								$badgeClass = match ($e->nilai) {
									'A' => 'success',
									'B' => 'primary',
									'C' => 'warning',
									'D' => 'danger',
									default => 'secondary'
								};
								$deskripsiNilai = match ($e->nilai) {
									'A' => 'Sangat Baik',
									'B' => 'Baik',
									'C' => 'Cukup',
									'D' => 'Kurang',
									default => ''
								};
							?>
								<tr>
									<td><?= htmlspecialchars($e->nama_ekstra) ?></td>
									<td>
										<span class="badge bg-<?= $badgeClass ?>">
											<?= $e->nilai ?><?= $deskripsiNilai ? ' - ' . $deskripsiNilai : '' ?>
										</span>
									</td>
									<td><?= htmlspecialchars($e->keterangan) ?></td>
									<td>
										<form method="post" action="/nilai_siswa/hapus" onsubmit="return confirm('Yakin ingin menghapus nilai ini?');">
											<input type="hidden" name="id" value="<?= $e->id ?>">
											<button type="submit" class="btn btn-sm btn-danger ms-2">Hapus</button>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php else: ?>
					<p class="text-center">Belum ada data ekstrakurikuler.</p>
				<?php endif; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

<script>
	$(document).ready(function() {
		const table = $('#table9').DataTable();
	});

	function simpanCatatan(idSiswa) {
        var catatan = document.getElementById('textareaCatatan' + idSiswa).value;
        document.getElementById('catatanInput' + idSiswa).value = catatan;
    }

	$(document).ready(function () {
	$('.input-edit').on('change', function () {
		let $el = $(this);
		let nis = $el.data('nis');
		let field = $el.data('field');
		let value = $el.val();

		let $status = $('#statusEkstra' + nis);

		$status.html('<i class="fa fa-spinner fa-spin fa-2x text-warning"></i>');

		$.ajax({
		url: '<?= base_url('nilai_siswa/update_sikap') ?>',
		method: 'POST',
		data: {
			nis: nis,
			field: field,
			value: value
		},
		success: function (res) {
			$status.html('<i class="fa fa-check fa-2x text-success"></i>');
		},
		error: function (err) {
			$status.html('<i class="fa fa-exclamation-triangle fa-2x text-danger"></i>');
		}
		});
	});
	});
</script>

<script>
	let formData = $('#form-nilai').serialize();
	console.log(formData); 

	function bukaModalEkstraDetail(idSiswa) {
		const modalElement = document.getElementById('modalEkstraDetail' + idSiswa);
		if (modalElement) {
			const modal = new bootstrap.Modal(modalElement);
			modal.show();
		} else {
			console.warn("Modal tidak ditemukan untuk siswa ID:", idSiswa);
			alert("Data ekstrakurikuler belum tersedia.");
		}
	}


	$(document).on('click', '.btn-simpan-ekstra', function () {
		const idSiswa = $(this).data('id');
		const form = $('#formEkstra' + idSiswa);
		const formData = form.serialize();

		$.ajax({
			url: '<?= base_url('nilai_siswa/simpan_ekstra') ?>', 
			method: 'POST',
			data: formData,
			dataType: 'json',
			success: function (response) {
				if (response.status === 'success') {
					$('#statusEkstra' + idSiswa).html('<span class="text-success">Tersimpan</span>');
					setTimeout(() => {
						let modal = bootstrap.Modal.getInstance(document.getElementById('modalEkstra' + idSiswa));
							if (modal) {
								modal.hide();
							}
						location.reload(); 
					}, 1000);
				} else {
					$('#statusEkstra' + idSiswa).html('<span class="text-danger">' + response.message + '</span>');
				}
			},
			error: function () {
				$('#statusEkstra' + idSiswa).html('<span class="text-danger">Terjadi kesalahan saat menyimpan.</span>');
			}
		});
	});

	$('#selectKetua, #selectSekretaris').on('change', function () {
		const id_siswa = $(this).val();
		const nama_jabatan = $(this).data('role');

		$.ajax({
			url: '<?= base_url('nilai_siswa/update_jabatan') ?>',
			type: 'POST',
			data: {
				id_siswa: id_siswa,
				nama_jabatan: nama_jabatan,
				id_rombel: <?= $id_rombel ?>
			},
			success: function (response) {
				console.log('Jabatan diperbarui:', response);
				location.reload(); 
			},
			error: function () {
				alert('Gagal mengupdate jabatan.');
			}
		});
	});
</script>


