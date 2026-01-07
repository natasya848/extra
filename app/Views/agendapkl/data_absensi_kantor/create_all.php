<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Input <?=$title?></h3>
					<p class="text-subtitle text-muted">
						Silakan Masukkan <?=$title?>
					</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav
					aria-label="breadcrumb"
					class="breadcrumb-header float-start float-lg-end"
					>
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?=base_url('agendapkl/login/dashboard')?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Input <?=$title?>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<section class="section">
		<div class="card">
			<form action="<?= base_url('agendapkl/data_absensi_kantor/aksi_create_all/') ?>" method="post" class="row g-3"
				enctype="multipart/form-data">
				<div class="card-body">
					<!-- Looping untuk menampilkan seluruh siswa beserta radio button -->
					<?php foreach ($siswa as $s) : ?>
						<div class="col-lg-6 col-md-12">
							<div class="mb-3">
								<!-- Hidden input field to submit the user_siswa -->
								<input type="hidden" name="user_siswa[]" value="<?= $s->user ?>">

								<label for="keterangan" class="form-label">Keterangan <?= $s->nama_siswa ?></label>
								<select class="form-select" id="keterangan" name="keterangan[]">
									<option value="">- Pilih -</option>
									<?php foreach ($keterangan as $k) : ?>
										<option value="<?= $k->id_keterangan ?>"><?= $k->nama_keterangan ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					<?php endforeach; ?>

					<!-- bagian tombol submit -->
					<div class="col-12">
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-0 col-md-offset-0">
								<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>
					<!-- bagian tombol submit -->
				</div>
			</form>
		</div>
	</section>

</body>
</html>