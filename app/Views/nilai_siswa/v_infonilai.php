<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3><?=$title?></h3>
					<p class="text-subtitle text-muted">Anda dapat melihat <?=$title?> di bawah</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
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
		<div class="card-header d-flex gap-2">
			<a href="<?= base_url('nilai_siswa/index') ?>" class="btn btn-secondary">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
			<a href="<?= base_url('nilai_siswa/input/' . $id_rombel) ?>" class="btn btn-primary">
				<i class="fa-solid fa-plus"></i> Tambah
			</a>
		</div>

        <div class="card-body">
			<div class="row">
			<div class="col-md-4">
				<label for="filterBlok" class="form-label">Blok</label>
			</div>
			<div class="col-md-8 form-group">
				<select id="filterBlok" class="form-select">
					<option value="">- Semua Blok -</option>
					<?php foreach ($blok_list as $blok): ?>
						<option value="<?= $blok['id_blok'] ?>"><?= $blok['nama_b'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<label for="filterMapel" class="form-label">Mata Pelajaran</label>
			</div>
			<div class="col-md-8 form-group">
				<select id="filterMapel" class="form-select" disabled>
					<option value="">- Semua Mata Pelajaran -</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<label for="filterGuru" class="form-label">Guru</label>			
			</div>
			<div class="col-md-8 form-group">
				<select id="filterGuru" class="form-select">
					<option value="">- Semua Guru -</option>
					<?php foreach ($guru_list as $guru): ?>
						<option value="<?= $guru['id_guru'] ?>"><?= $guru['nama'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped" id="table17">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Mata Pelajaran & Sesi</th>
						<th>Guru</th>
						<th>Harian</th>
						<th>UTS</th>
						<th>Final</th>
						<th>Rata-rata</th>
					</tr>
				</thead>
				<tbody>
				<?php $no = 1; foreach ($nilai as $n): ?>
					<tr data-id-blok="<?= $n->id_blok ?>" data-id-mapel="<?= $n->id_mapel ?>" data-id-guru="<?= $n->id_guru ?>">
						<td><?= $no++ ?></td>
						<td><?= $n->nis ?></td>
						<td><?= $n->nama_siswa ?></td>
						<td><?= $n->nama_mapel ?> - Sesi <?= $n->sesi ?></td>
						<td><?= $n->nama_guru ?></td>
						<td class="<?= ($n->harian < 70) ? 'text-danger fw-bold' : '' ?>" data-nilai="<?= $n->harian ?>">
							<?= $n->harian ?>
							<!-- <span class="predikat"></span> -->
						</td>
						<td class="<?= ($n->uts < 70) ? 'text-danger fw-bold' : '' ?>" data-nilai="<?= $n->uts ?>">
							<?= $n->uts ?>
							<!-- <span class="predikat"></span> -->
						</td>
						<td class="<?= ($n->final < 70) ? 'text-danger fw-bold' : '' ?>" data-nilai="<?= $n->final ?>">
							<?= $n->final ?>
							<!-- <span class="predikat"></span> -->
						</td>
						<td class="rata-rata" data-harian="<?= $n->harian ?>" data-uts="<?= $n->uts ?>" data-final="<?= $n->final ?>">
							<!-- Akan diisi oleh JS -->
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		const allMapel = <?= json_encode($mapel_list) ?>;

		function predikat(nilai) {
			if (nilai >= 90) return 'A';
			if (nilai >= 80) return 'B';
			if (nilai >= 70) return 'C';
			return 'D';
		}

		$('#table17 tbody tr').each(function() {
			const harianTd = $(this).find('td').eq(5);
			const nilaiHarian = parseInt(harianTd.data('nilai'));
			harianTd.find('.predikat').text(' (' + predikat(nilaiHarian) + ')');

			const utsTd = $(this).find('td').eq(6);
			const nilaiUts = parseInt(utsTd.data('nilai'));
			utsTd.find('.predikat').text(' (' + predikat(nilaiUts) + ')');

			const finalTd = $(this).find('td').eq(7);
			const nilaiFinal = parseInt(finalTd.data('nilai'));
			finalTd.find('.predikat').text(' (' + predikat(nilaiFinal) + ')');

			const rataTd = $(this).find('td').eq(8);
			const rataNilai = Math.round((nilaiHarian + nilaiUts + nilaiFinal) / 3);
			rataTd.html(`${rataNilai} <span class="predikat">(${predikat(rataNilai)})</span>`);
		});

		$('#table17').DataTable();

		function updateMapelOptions(blokId) {
			const mapelSelect = $('#filterMapel');
			mapelSelect.empty().append('<option value="">- Semua Mata Pelajaran -</option>');

			const filteredMapel = blokId ? allMapel.filter(m => m.id_blok == blokId) : allMapel;

			if (filteredMapel.length > 0) {
				filteredMapel.forEach(m => {
					mapelSelect.append(`<option value="${m.id_mapel}">${m.nama_mapel}</option>`);
				});
				mapelSelect.prop('disabled', false); 
			} else {
				mapelSelect.prop('disabled', true); 
			}
		}

		function filterTable() {
			const selectedBlok = $('#filterBlok').val();
			const selectedMapel = $('#filterMapel').val();
			const selectedGuru = $('#filterGuru').val();

			$('#table17 tbody tr').each(function () {
				const blok = $(this).data('id-blok').toString();
				const mapel = $(this).data('id-mapel').toString();
				const guru = $(this).data('id-guru').toString();

				const blokMatch = !selectedBlok || blok === selectedBlok;
				const mapelMatch = !selectedMapel || mapel === selectedMapel;
				const guruMatch = !selectedGuru || guru === selectedGuru;

				if (blokMatch && mapelMatch && guruMatch) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		}

		$('#filterBlok').on('change', function () {
			const selectedBlok = $(this).val();
			updateMapelOptions(selectedBlok);
			filterTable();
		});

		$('#filterMapel').on('change', filterTable);
		$('#filterGuru').on('change', filterTable);

		updateMapelOptions('');
		$('#filterMapel').prop('disabled', false);
		filterTable();

		setTimeout(() => {
			$('.alert').fadeOut('slow');
		}, 4000);
	});
</script>
