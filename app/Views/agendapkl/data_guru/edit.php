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
					<nav
					aria-label="breadcrumb"
					class="breadcrumb-header float-start float-lg-end"
					>
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
			<form action="<?= base_url('agendapkl/data_guru/aksi_edit/')?>" method="post" class="row g-3" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $rizkan->id_user ?>">
				<input type="hidden" name="id2" value="<?php echo $jojo->user_guru ?>">

				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="mb-3">
								<label for="fotoprofil" class="form-label">Foto Profil</label>
								<div class="mb-3">
									<div class="custom-file">
										<input type="file" class="image-preview-filepond" id="foto" name="foto" accept="image/*" onchange="previewImage()">
									</div>
								</div>
								<input type="hidden" name="old_foto" value="<?= $rizkan->foto ?>">
								<label for="fotoprofil" class="form-label">Foto Lama</label>
								<div id="preview">
									<?php if ($rizkan->foto): ?>
										<img src="<?=base_url('agendapkl/images/'. $rizkan->foto)?>" width="25%">
									<?php endif; ?>
								</div>
							</div>
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" value="<?php echo $rizkan->username ?>" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?php echo $rizkan->email ?>" required>
							</div>
							<div class="mb-3 mt-3">
								<label for="namasiswa" class="form-label">NIK</label>
								<input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik" value="<?php echo $jojo->nik ?>" required>
							</div>
							<div class="mb-3 mt-3">
								<label for="namasiswa" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?php echo $jojo->nama_guru ?>" required>
							</div>
							<!-- form bagian kiri -->
						</div>

						<div class="col-md-6">
							<!-- form bagian kanan -->
							<div class="mb-3">
								<label for="namasiswa" class="form-label">Telpon</label>
								<input type="text" class="form-control" id="telpon" placeholder="Masukkan Telpon" name="telpon" value="<?php echo $jojo->telpon ?>" required>
							</div>

							<div class="mb-3">
								<label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
								<select class="form-control" id="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" name="jenis_kelamin" value="<?php echo  $jojo->jenis_kelamin ?>" required>
									<option value="<?php echo $jojo->jenis_kelamin ?>">-Pilih-</option>
									<option value="1">Laki-laki</option>
									<option value="2">Perempuan</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="tempat" class="form-label">Tempat Lahir</label>
								<input type="text" class="form-control" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="<?php echo  $jojo->tempat_lahir ?>" required>
							</div>
							<div class="mb-3">
								<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="<?php echo $jojo->tanggal_lahir ?>" required>
							</div>
							<div class="mb-3">
								<label for="jeniskelamin" class="form-label">Jurusan</label>
								<select class="form-select" id="jurusan" placeholder="Masukkan Jenis Kelamin" name="jurusan" required>
									<option value="<?php echo $jojo->jurusan?>">- Pilih -</option>
									<?php 
									foreach ($jurusan as $singkat) {
										?>
										<option value="<?= $singkat->id_jurusan?>"><?= $singkat->nama_jurusan?></option>								
									<?php } ?>
								</select>
							</div>
							<!-- form bagian kanan -->
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

					<script>
						function previewImage() {
							var preview = document.querySelector('#preview');
							var file = document.querySelector('#foto').files[0];
							var reader = new FileReader();

							reader.addEventListener("load", function () {
								var image = new Image();
								image.src = reader.result;
								image.style.width = '25%';
								preview.innerHTML = '';
								preview.appendChild(image);
							}, false);

							if (file) {
								reader.readAsDataURL(file);
							}
						}
					</script>

				</div>
			</body>
			</html>