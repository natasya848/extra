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
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
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
				<form id="form" action="<?= base_url('agendapkl/data_agenda/aksi_create/')?>" method="post" class="row g-3" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $jojo->id_agenda ?>">
					<div class="card-body">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3 id="form-title" class="mb-4">Rencana Pekerjaan</h3>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-step" id="step-1" style="display: none;">
									<!-- Langkah 2 -->
									<div class="mb-3">
										<label for="username" class="form-label">Rencana Pekerjaan 1</label>
										<input type="text" class="form-control" id="rencana1" placeholder="Masukkan Rencana Pekerjaan 1" name="rencana1" value="<?php echo $jojo->renper_1 ?>" required>
									</div>
									<div class="mb-3">
										<label for="pwd" class="form-label">Rencana Pekerjaan 2</label>
										<input type="text" class="form-control" id="rencana2" placeholder="Masukkan Rencana Pekerjaan 2" name="rencana2" value="<?php echo $jojo->renper_2 ?>">
									</div>
									<div class="mb-3">
										<label for="email" class="form-label">Rencana Pekerjaan 3</label>
										<input type="text" class="form-control" id="rencana3" placeholder="Masukkan Rencana Pekerjaan 3" name="rencana3" value="<?php echo $jojo->renper_3 ?>">
									</div>
									<div class="mb-3">
										<label for="namasiswa" class="form-label">Rencana Pekerjaan 4</label>
										<input type="text" class="form-control" id="rencana4" placeholder="Masukkan Rencana Pekerjaan 4" name="rencana4" value="<?php echo $jojo->renper_4 ?>">
									</div>
									<div class="mb-3">
										<label for="namasiswa" class="form-label">Rencana Pekerjaan 5</label>
										<input type="text" class="form-control" id="rencana5" placeholder="Masukkan Rencana Pekerjaan 5" name="rencana5" value="<?php echo $jojo->renper_5 ?>">
									</div>
									<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
									<button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
								</div>

								<div class="form-step" id="step-2" style="display: none;">
									<!-- Langkah 3 -->
									<div class="mb-3">
										<label for="realisasi1" class="form-label">Realisasi Pekerjaan 1</label>
										<input type="text" class="form-control" id="realisasi1" placeholder="Masukkan Realisasi Pekerjaan 1" name="realisasi1" value="<?php echo $jojo->reape_1 ?>" required>
									</div>
									<div class="mb-3">
										<label for="realisasi2" class="form-label">Realisasi Pekerjaan 2</label>
										<input type="text" class="form-control" id="realisasi2" placeholder="Masukkan Realisasi Pekerjaan 2" name="realisasi2" value="<?php echo $jojo->reape_2 ?>">
									</div>
									<div class="mb-3">
										<label for="realisasi3" class="form-label">Realisasi Pekerjaan 3</label>
										<input type="text" class="form-control" id="realisasi3" placeholder="Masukkan Realisasi Pekerjaan 3" name="realisasi3" value="<?php echo $jojo->reape_3 ?>">
									</div>
									<div class="mb-3">
										<label for="realisasi4" class="form-label">Realisasi Pekerjaan 4</label>
										<input type="text" class="form-control" id="realisasi4" placeholder="Masukkan Realisasi Pekerjaan 4" name="realisasi4" value="<?php echo $jojo->reape_4 ?>">
									</div>
									<div class="mb-3">
										<label for="realisasi5" class="form-label">Realisasi Pekerjaan 5</label>
										<input type="text" class="form-control" id="realisasi5" placeholder="Masukkan Realisasi Pekerjaan 5" name="realisasi5" value="<?php echo $jojo->reape_5 ?>">
									</div>
									<button type="button" class="btn btn-secondary" onclick="previousStep()">Previous</button>
									<button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
								</div>

								<div class="form-step" id="step-3" style="display: none;">
									<!-- Langkah 4 -->
									<div class="mb-3">
										<label for="realisasi1" class="form-label">Penugasan Khusus 1</label>
										<input type="text" class="form-control" id="penugasan1" placeholder="Masukkan Penugasan Khusus 1" name="penugasan1" value="<?php echo $jojo->pk_1 ?>">
									</div>
									<div class="mb-3">
										<label for="realisasi2" class="form-label">Penugasan Khusus 2</label>
										<input type="text" class="form-control" id="penugasan2" placeholder="Masukkan Penugasan Khusus 2" name="penugasan2" value="<?php echo $jojo->pk_2 ?>">
									</div>
									<div class="mb-3">
										<label for="realisasi3" class="form-label">Penugasan Khusus 3</label>
										<input type="text" class="form-control" id="penugasan3" placeholder="Masukkan Penugasan Khusus 3" name="penugasan3" value="<?php echo $jojo->pk_3 ?>">
									</div>
									<button type="button" class="btn btn-secondary" onclick="previousStep()">Previous</button>
									<button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
								</div>

								<div class="form-step" id="step-4">
									<!-- Langkah 1 -->
									<div class="mb-3">
										<label for="username" class="form-label">Penemuan Masalah 1</label>
										<input type="text" class="form-control" id="pm1" placeholder="Masukkan Penemuan Masalah 1" name="pm1" value="<?php echo $jojo->pm_1 ?>">
									</div>
									<div class="mb-3">
										<label for="username" class="form-label">Penemuan Masalah 2</label>
										<input type="text" class="form-control" id="pm2" placeholder="Masukkan Penemuan Masalah 2" name="pm2" value="<?php echo $jojo->pm_2 ?>">
									</div>
									<div class="mb-3">
										<label for="username" class="form-label">Penemuan Masalah 3</label>
										<input type="text" class="form-control" id="pm3" placeholder="Masukkan Penemuan Masalah 3" name="pm3" value="<?php echo $jojo->pm_3 ?>">
									</div>
									<button type="button" class="btn btn-secondary" onclick="previousStep()">Previous</button>
									<button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>

	<script>
		const formSteps = document.querySelectorAll('.form-step');
		const steps = document.querySelectorAll('.step');
		const titleElement = document.querySelector('#form-title');
		const submitButton = document.querySelector('#submitBtn');

		let currentStep = 0;

		function showStep(step) {
			formSteps.forEach((formStep, index) => {
				if (index === step) {
					formStep.style.display = 'block';
				} else {
					formStep.style.display = 'none';
				}
			});

			steps.forEach((stepElement, index) => {
				if (index === step) {
					stepElement.classList.add('active');
				} else {
					stepElement.classList.remove('active');
				}
			});

			if (step === 0) {
				titleElement.textContent = 'Rencana Pekerjaan';
			} else if (step === 1) {
				titleElement.textContent = 'Realisasi Pekerjaan';
			} else if (step === 2) {
				titleElement.textContent = 'Penugasan Khusus dari Atasan';
			} else if (step === 3) {
				titleElement.textContent = 'Penemuan Masalah';
			}


		}

		function nextStep() {
			currentStep++;
			if (currentStep >= formSteps.length) {
				currentStep = formSteps.length - 1;
			}
			showStep(currentStep);
			if (currentStep === formSteps.length - 1) {
				submitButton.textContent = 'Submit';
			}
		}

		function previousStep() {
			currentStep--;
			if (currentStep < 0) {
				currentStep = 0;
			}
			showStep(currentStep);
			if (currentStep !== formSteps.length - 1) {
				submitButton.textContent = 'Next';
			}
		}

		showStep(currentStep);

		submitButton.addEventListener('click', function() {
			document.getElementById('form').submit();
		});
	</script>
