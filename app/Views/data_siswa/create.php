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
				<form action="<?= base_url('data_siswa/aksi_tambah_siswa/') ?>" method="post" class="row g-3" enctype="multipart/form-data">
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
									<label for="last-name-column">NIS</label>
									<input type="text" id="nis" class="form-control" placeholder="NIS" name="nis" />
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="country-floating">Nama Siswa</label>
									<input type="text" id="nama_guru" class="form-control" name="nama" placeholder="Nama Siswa" />
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
											<option value="<?= $b->id_rombel ?>"><?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?></option>

											</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label for="last-name-column">Jurusan</label>
									<select class="form-select" id="basicSelect" name="jurusan">
										<option>-PILIH-</option>
										<?php
										foreach ($jur as $jurusan) {
										?>
											<option value="<?= $jurusan->id_jurusan ?>"><?php echo $jurusan->nama_jurusan ?>
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