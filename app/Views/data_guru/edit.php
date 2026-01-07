<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3> <?= $title ?></h3>
					<p class="text-subtitle text-muted">
						Silakan  <?= $title ?>
					</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								<?= $title ?>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<form action="<?= base_url('aksi_edit_guru/'.$jojo->id_guru) ?>" method="post" class="row g-3" enctype="multipart/form-data">
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
									<label for="last-name-column">NIK</label>
									<input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" value="<?php echo $jojo->nik ?>" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="city-column">Username</label>
									<input type="text" id="username" class="form-control" placeholder="Username" name="username" value="<?php echo $rizkan->username ?>" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="country-floating">Nama Guru</label>
									<input type="text" id="nama_Guru" class="form-control" name="nama" placeholder="Nama Guru" value="<?php echo $jojo->nama ?>" />
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
									<label for="last-name-column">Jabatan</label>
									<select class="form-select" id="basicSelect" name="jabatan">
										<?php
										foreach ($j as $jabatan) {
											$selected = ($rizkan->jabatan == $jabatan->id_jabatan) ? "selected" : "";
										?>
										?>
											<option value="<?= $jabatan->id_jabatan ?>" <?= $selected ?>><?php echo $jabatan->nama_jabatan ?>
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
										<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
							<!-- bagian tombol submit -->
				</form>

			</div>
			</body>

			</html>