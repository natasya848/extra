<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Edit <?=$title?></h3>
					<p class="text-subtitle text-muted">
						Silakan Edit <?=$title?>
					</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?=base_url('agendapkl/login/dashboard')?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Edit <?=$title?>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<form id="form" action="<?= base_url('agendapkl/data_agenda_instruktur/aksi_edit/')?>" method="post" class="row g-3" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $jojo->id_agenda ?>">
					<input type="hidden" name="id2" value="<?php echo $jojo->siswa ?>">

					<div class="card-body">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3 id="form-title" class="mb-4">Penilaian Harian</h3>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-step">
									<!-- Langkah 2 -->
									<div class="mb-3">
										<label class="form-label">Senyum</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="senyum" id="senyum_baik" value="Baik" required>
											<label class="form-check-label" for="senyum_baik">Baik</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="senyum" id="senyum_kurang" value="Kurang">
											<label class="form-check-label" for="senyum_kurang">Kurang</label>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Keramahan</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="keramahan" id="keramahan_baik" value="Baik" required>
											<label class="form-check-label" for="keramahan_baik">Baik</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="keramahan" id="keramahan_kurang" value="Kurang">
											<label class="form-check-label" for="keramahan_kurang">Kurang</label>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Penampilan</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="penampilan" id="penampilan_baik" value="Baik" required>
											<label class="form-check-label" for="penampilan_baik">Baik</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="penampilan" id="penampilan_kurang" value="Kurang">
											<label class="form-check-label" for="penampilan_kurang">Kurang</label>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Komunikasi</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="komunikasi" id="komunikasi_baik" value="Baik" required>
											<label class="form-check-label" for="komunikasi_baik">Baik</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="komunikasi" id="komunikasi_kurang" value="Kurang">
											<label class="form-check-label" for="komunikasi_kurang">Kurang</label>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label">Realisasi Kerja</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="realisasi_kerja" id="realisasi_kerja_baik" value="Baik" required>
											<label class="form-check-label" for="realisasi_kerja_baik">Baik</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="realisasi_kerja" id="realisasi_kerja_kurang" value="Kurang">
											<label class="form-check-label" for="realisasi_kerja_kurang">Kurang</label>
										</div>
									</div>
									<div class="mb-3">
										<label for="catatan1" class="form-label">Catatan</label>
										<textarea class="form-control" id="catatan1" placeholder="Masukkan Catatan" name="catatan" rows="5"><?php echo $jojo->catatan ?></textarea>
									</div>
									<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>

								<!-- Tambahkan langkah-langkah formulir berikutnya sesuai kebutuhan -->
								<!-- Jumlah langkah harus sesuai dengan jumlah halaman yang diinginkan -->
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
