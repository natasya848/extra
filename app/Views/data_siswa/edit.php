<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Edit <?= $title ?></h3>
					<p class="text-subtitle text-muted">
						Silakan Edit <?= $title ?>
					</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Edit <?= $title ?>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<form action="<?= base_url('aksi_edit_siswa/' . $jojo->user) ?>" method="post" class="row g-3" enctype="multipart/form-data">
					<?= csrf_field() ?>
					<input type="hidden" name="id" value="<?php echo $rizkan->id_user ?>">
					<input type="hidden" name="id2" value="<?php echo $jojo->user ?>">

					<div class="card-body">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<label for="Foto" class="form-label">Foto</label>
								<div class="custom-file">
									<div class="col-12 col-md-12">
										<input type="file" class="logo-perusahaan" id="foto" name="foto" accept="image/*">
									</div>
								</div>
							</div>
							<label for="Foto" class="form-label">Foto Lama</label>
							<div id="preview">
								<?php if ($rizkan->foto) : ?>
									<img src="<?= base_url('images/' . $rizkan->foto) ?>" class="img-fluid rounded mb-3" width="100px">
								<?php endif; ?>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">NIS</label>
									<input type="text" id="nis" class="form-control" placeholder="NIS" name="nis" value="<?php echo $jojo->nis ?>" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="country-floating">Nama Siswa</label>
									<input type="text" id="nama_guru" class="form-control" name="nama" placeholder="Nama Siswa" value="<?php echo $jojo->nama_siswa ?>" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Rombel</label>
									<select class="form-select" id="basicSelect" name="rombel">
										<?php
										foreach ($a as $b) {

											$selected = ($jojo->rombel == $b->id_rombel) ? "selected" : "";
										?>
											<option value="<?= $b->id_rombel ?>" <?= $selected ?>>
												<?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Jenjang</label>
									<select class="form-select" id="basicSelect" name="jenjang">
										<?php
										foreach ($c as $d) {

											$selected = ($rizkan->jenjang == $d->id_jenjang) ? "selected" : "";
										?>
											<option value="<?= $d->id_jenjang ?>" <?= $selected ?>>
												<?php echo $d->nama_jenjang ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Jurusan</label>
									<select class="form-select" id="basicSelect" name="jurusan">
										<?php
										foreach ($jur as $jurusan) {

											$selected = ($jojo->jurusan == $jurusan->id_jurusan) ? "selected" : "";
										?>
											<option value="<?= $jurusan->id_jurusan ?>" <?= $selected ?>>
												<?php echo $jurusan->nama_jurusan ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>


							<!-- bagian tombol submit -->
							<div class="col-12">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-0 col-md-offset-0">
										<button type="submit" class="btn btn-primary">Submit</button>
										<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
									</div>
								</div>
							</div>
							<!-- bagian tombol submit -->
				</form>

			</div>
			</body>

			</html>