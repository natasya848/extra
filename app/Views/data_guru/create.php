<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Input <?= $title ?></h3>
					<p class="text-subtitle text-muted">
						Silakan Masukkan <?= $title ?>
					</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Input <?= $title ?>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<form action="<?= base_url('aksi_tambah_guru') ?>" method="post" class="row g-3" enctype="multipart/form-data">
				<?= csrf_field() ?>    
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
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">NIK</label>
									<input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="city-column">Username</label>
									<input type="text" id="username" class="form-control" placeholder="Username" name="username" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="country-floating">Nama Guru</label>
									<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Guru" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="company-column">Password</label>
									<input type="password" id="password" class="form-control" name="password" placeholder="Password" />
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Rombel</label>
									<select class="form-select" id="basicSelect" name="rombel">
										<option>-PILIH-</option>
										<?php
										foreach ($a as $b) {
										?>
											<option value="<?= $b->id_rombel ?>"><?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Jenjang</label>
									<select class="form-select" id="basicSelect" name="jenjang">
										<option>-PILIH-</option>
										<?php
										foreach ($c as $d) {
										?>
											<option value="<?= $d->id_jenjang ?>"><?php echo $d->nama_jenjang ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Jabatan</label>
									<select class="form-select" id="basicSelect" name="jabatan">
										<option>-PILIH-</option>
										<?php
										foreach ($j as $jabatan) {
										?>
											<option value="<?= $jabatan->id_jabatan ?>"><?php echo $jabatan->nama_jabatan ?>
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