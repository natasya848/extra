
<style>
.legend-dot {
    display: inline-block;
    height: 12px;
    width: 12px;
    border-radius: 50%;
    margin-right: 6px;
}
.legend-item {
    margin-right: 20px;
    display: inline-flex;
    align-items: center;
    font-size: 14px;
}
</style>


<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3><?=$title?></h3>
					<p class="text-subtitle text-muted">Anda dapat melihat data <?=$title?> di bawah</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=base_url('login/dashboard')?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<section class="section">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<div class="legend-item"><span class="legend-dot" style="background-color:#6ECB63;"></span> Hadir</div>
						<div class="legend-item"><span class="legend-dot" style="background-color:#FFD966;"></span> Sakit</div>
						<div class="legend-item"><span class="legend-dot" style="background-color:#84D2F6;"></span> Izin</div>
						<div class="legend-item"><span class="legend-dot" style="background-color:#FF6B6B;"></span> Tanpa Keterangan</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Siswa</th>
									<th>Hadir</th>
									<th>Sakit</th>
									<th>Izin</th>
									<th>Tanpa Keterangan</th>
									<!-- <th>Total</th> -->
									<th>Presentase</th>
								</tr>
							</thead>
							<?php
							$no = 1;
							foreach ($a as $riz) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $riz['nama_siswa'] ?></td>
									<td><?= $riz['hadir'] ?></td>
									<td><?= $riz['sakit'] ?></td>
									<td><?= $riz['izin'] ?></td>
									<td><?= $riz['tanpa_keterangan'] ?></td>
									<!-- <td><?= $riz['hadir'] + $riz['sakit'] + $riz['izin'] + $riz['tanpa_keterangan'] ?></td> -->
									<td>
										<canvas id="chart-<?= $riz['id_siswa'] ?>" width="80" height="80"></canvas>
										<div style="font-size: 14px; margin-top: 4px;"><strong><?= $riz['persen'] ?>%</strong></div>
									</td>
								</tr>
								<?php
							}
							?>
						</td>
					</body>
				</tr>
			</table>
		</div>
	</div>
</div>

<script>
<?php foreach ($a as $riz): 
    $total = $riz['hadir'] + $riz['sakit'] + $riz['izin'] + $riz['tanpa_keterangan'];
    $data = [
        'Hadir' => $riz['hadir'],
        'Sakit' => $riz['sakit'],
        'Izin' => $riz['izin'],
        'Tanpa Keterangan' => $riz['tanpa_keterangan']
    ];
?>
const ctx<?= $riz['id_siswa'] ?> = document.getElementById('chart-<?= $riz['id_siswa'] ?>').getContext('2d');
new Chart(ctx<?= $riz['id_siswa'] ?>, {
    type: 'doughnut',
    data: {
        labels: <?= json_encode(array_keys($data)) ?>,
        datasets: [{
            data: <?= json_encode(array_values($data)) ?>,
            backgroundColor: ['#6ECB63', '#FFD966', '#84D2F6', '#FF6B6B'],
            borderColor: '#ffffff',
            borderWidth: 2
        }]
    },
    options: {
        cutout: '70%',
        responsive: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = <?= $total ?>;
                        const value = context.raw;
                        const percent = ((value / total) * 100).toFixed(1);
                        return `${context.label}: ${value} (${percent}%)`;
                    }
                }
            }
        }
    }
});
<?php endforeach; ?>
</script>
