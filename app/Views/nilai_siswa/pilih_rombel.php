<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3><?= $title ?></h3>
					<p class="text-subtitle text-muted">Silakan pilih rombel di bawah ini</p>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
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

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

		<form method="get" action="<?= base_url('nilai_siswa/pilih_rombel') ?>" class="mb-3">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> 
                                <label for="id_semester" class="form-label">Filter Semester</label> 
                                <select name="id_semester" id="id_semester" class="form-select"> 
                                    <option value="">- Pilih Semester -</option> <?php foreach ($semesterList as $semester): ?> 
                                        <option value="<?= $semester->id_semester ?>"><?= $semester->nama_s ?></option> 
                                        <?php endforeach; ?> 
                                    </select> 
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-rombel">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rombel</th>
                                        <th>Wali Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <p id="no-blok-info" class="text-muted" style="<?= ($id_semester) ? 'display:none;' : '' ?>">
                                Silakan pilih blok terlebih dahulu untuk menampilkan daftar rombel.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </form>
	</div>
</div>


<script>
    $(document).ready(function () {
        const allRombels = <?= json_encode($rombels); ?>;
        const initialBlok = '<?= $id_semester ?? '' ?>';
        const baseUrl = '<?= base_url('nilai_perkelas') ?>'; // simpan base_url di JS

        const $blokSelect = $('#id_semester');
        const $tableRombel = $('#table-rombel');
        const $noBlokInfo = $('#no-blok-info');

        if ($blokSelect.length) {
            $blokSelect.val(initialBlok);
        }

        if ($tableRombel.length) {
            let table = $tableRombel.DataTable({
                destroy: true,
                data: [],
                columns: [
                    { title: "No" },
                    { title: "Rombel" },
                    { title: "Wali Kelas" },
                    { title: "Aksi" }
                ]
            });

            function renderTable(data) {
                table.clear();

                if (data.length > 0) {
                    $.each(data, function (i, rombel) {
                        let url = `<?= base_url('nilai_perkelas') ?>/${rombel.id_rombel}/${rombel.id_semester}`;
                        table.row.add([
                            i + 1,
                            `${rombel.nama_kelas} . ${rombel.nama_r}, ${rombel.jurusan_detail} - ${rombel.nama_jenjang}`,
                            rombel.nama || '-',
                            `<a href="${url}" class="btn btn-primary btn-lg fw-bold">
                                <i class="fas fa-eye me-1"></i> Lihat Nilai
                            </a>`
                        ]);
                    });
                } else {
                    table.row.add(['', 'Tidak ada data rombel untuk blok ini.', '', '']);
                }

                table.draw();
            }

            function handleBlokChange(blokId) {
                if (!blokId) {
                    $noBlokInfo.show();
                    table.clear().draw();
                    return;
                }

                $noBlokInfo.hide();

                const filtered = allRombels.filter(r => r.id_semester == blokId);
                renderTable(filtered);
            }

            handleBlokChange(initialBlok);

            $blokSelect.on('change', function () {
                const selectedBlok = $(this).val();
                handleBlokChange(selectedBlok);
            });
        } else {
            console.warn('⚠️ Elemen #table-rombel tidak ditemukan. DataTable tidak diinisialisasi.');
        }
    });
</script>

