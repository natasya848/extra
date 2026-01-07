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
		<div class="card-header">
			<a href="<?php echo base_url('jadwal/tambah_jadwal/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
			Tambah</button></a>
		</div>

	<div class="card-body">
		<div class="row mb-3">
			<div class="col-md-4">
				<label for="filter_blok">Blok:</label>
				<select class="form-control" id="filter_blok">
					<option value="">- Semua Blok -</option>
					<?php foreach ($blok as $b): ?>
						<option value="<?= $b->id_blok ?>"><?= $b->nama_b ?> (Semester <?= $b->semester ?>)</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-md-4">
				<label for="filter_rombel">Rombel:</label>
				<select class="form-control" id="filter_rombel">
					<option value="">- Semua Rombel -</option>
					<?php foreach ($rombel as $r): ?>
						<option value="<?= $r->id_rombel ?>"><?= $r->nama_kelas ?>.<?= $r->nama_r ?> - <?= $r->nama_jurusan ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped" id="table12">
				<thead>
					<tr>
						<th>No</th>
						<th>Rombel</th>
						<th>Mapel</th>
						<th>Guru</th>
                        <th>Sesi</th>
                        <th>Blok</th>
                        <th>Tahun Ajaran</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				$no=1;
				foreach ($a as $b) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b->nama_kelas . '.' . $b->nama_r . ' - '  . $b->nama_jurusan?> </td>
						<td><?php echo $b->nama_mapel?> </td>
                        <td><?php echo $b->nama?> </td>
                        <td>
							<?= $b->sesi ?>
							<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalSesi<?= $b->id_jadwal ?>">
								<i class="fa fa-clock"></i>
							</button>

							<div class="modal fade" id="modalSesi<?= $b->id_jadwal ?>" tabindex="-1" aria-labelledby="modalLabel<?= $b->id_jadwal ?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalLabel<?= $b->id_jadwal ?>">Detail Waktu Sesi</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
								</div>
								<div class="modal-body">
									<p><strong>Jam Mulai:</strong> <?= $b->jam_mulai ?></p>
									<p><strong>Jam Selesai:</strong> <?= $b->jam_selesai ?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
								</div>
								</div>
							</div>
							</div>
						</td>
						<td><?php echo $b->nama_b . ', Semester ' . $b->semester ?> </td>
						<td><?php echo $b->nama_t ?></td>
						<td>
							<a href="<?php echo base_url('jadwal/edit_jadwal/'. $b->id_jadwal)?>" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>

							<a href="<?php echo base_url('jadwal/delete_jadwal/'. $b->id_jadwal)?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
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
	$(document).ready(function() {
		const table = $('#table12').DataTable();

		function loadFilteredJadwal() {
			const blok = $('#filter_blok').val();
			const rombel = $('#filter_rombel').val();

			$.ajax({
				url: "<?= base_url('jadwal/filterJadwal') ?>",
				type: "POST",
				data: {
					id_blok: blok,
					id_rombel: rombel
				},
				dataType: 'json',
				success: function(data) {
					table.clear();

					if (data.length === 0) {
						table.draw();
						return;
					}

    let no = 1;
	data.forEach(function(item) {
    const modalId = `modalSesi${item.id_jadwal}`;

    const sesiColumn = `
        ${item.sesi}
        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#${modalId}">
            <i class="fa fa-clock"></i>
        </button>

        <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="modalLabel${item.id_jadwal}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel${item.id_jadwal}">Detail Waktu Sesi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Jam Mulai:</strong> ${item.jam_mulai}</p>
                        <p><strong>Jam Selesai:</strong> ${item.jam_selesai}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    `;

		table.row.add([
			no++,
			item.nama_r + '.' + item.nama_kelas + ' - ' + item.nama_jurusan,
			item.nama_mapel,
			item.nama_guru,
			sesiColumn, 
			item.nama_b + ', Semester ' + item.semester,
			item.nama_t,
			`<a href="<?= base_url('jadwal/edit_jadwal/') ?>${item.id_jadwal}" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
			<a href="<?= base_url('jadwal/delete_jadwal/') ?>${item.id_jadwal}" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>`
		]);
	});

                table.draw();
            },
            error: function(xhr, status, error) {
                alert('Gagal memuat data: ' + error);
            }
        });
    }

    $('#filter_blok, #filter_rombel').on('change', function() {
        loadFilteredJadwal();
    });
});
</script>
