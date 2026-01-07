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
					<a href="javascript:history.back()"><button class="btn btn-secondary mt-2"><i class="fa-solid fa-backward"></i>
							Back</button></a>
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
										<a href="<?php echo base_url('agendapkl/data_agenda_instruktur/agenda/' . $riz->id_agenda) ?>" class="btn btn-primary rounded-pill my-1">
											<i class="fa-solid fa-circle-info"></i>
										</a>
										<a href="<?php echo base_url('agendapkl/data_agenda_instruktur/cek_pdf/') ?>" class="btn btn-secondary rounded-pill my-1 pdfButton" data-id="<?php echo $riz->id_agenda ?>">
											<i class="fa-solid fa-file-pdf"></i>
										</a>
										<?php if ($riz->senyum === null) : ?>
											<a href="<?php echo base_url('agendapkl/data_agenda_instruktur/edit/' . $riz->id_agenda) ?>" class="btn btn-danger my-1 rounded-pill">
												<i class="fa-solid fa-pen-to-square"></i> Review
											</a>
										<?php else : ?>
											<span class="rounded-pill bg-success text-white px-3 py-2">Selesai</span>
										<?php endif; ?>
									</td>
								</tr>

							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>

			<script>
				document.querySelectorAll('.pdfButton').forEach(button => {
					button.addEventListener('click', function(event) {
						event.preventDefault();
						var idAgenda = this.getAttribute('data-id');
						var form = document.createElement('form');
						form.method = 'POST';
						form.action = '<?php echo base_url('agendapkl/data_agenda_instruktur/cek_pdf/') ?>';
						form.innerHTML = '<input type="hidden" name="id_agenda" value="' + idAgenda + '">';
						document.body.appendChild(form);
						form.submit();
					});
				});
			</script>