<?php if ($siswa_list): ?>
    <input type="hidden" name="id_jadwal" value="<?= $selected_jadwal ?>">
    <div class="table-responsive">
        <table class="table table-striped" id="tabel-nilai">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Harian</th>
                    <th>UTS</th>
                    <th>Final</th>
                    <th>Rata-rata</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($siswa_list as $s):
                    $id_siswa = $s['id_siswa'];
                    $nilai_lama = $nilai_per_siswa[$id_siswa] ?? null; ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $s['nis'] ?></td>
                        <td><?= $s['nama_siswa'] ?></td>

                        <!-- Harian -->
                        <td>
                            <input type="number" class="form-control harian-input" data-id="<?= $id_siswa ?>"
                                value="<?= $nilai_lama['harian'] ?? '' ?>" min="0" max="100">
                            <small id="predikat-harian-<?= $id_siswa ?>"></small>
                        </td>

                        <!-- UTS -->
                        <td>
                            <input type="number" class="form-control uts-input" data-id="<?= $id_siswa ?>"
                                value="<?= $nilai_lama['uts'] ?? '' ?>" min="0" max="100">
                            <small id="predikat-uts-<?= $id_siswa ?>"></small>
                        </td>

                        <!-- Final -->
                        <td>
                            <input type="number" class="form-control final-input" data-id="<?= $id_siswa ?>"
                                value="<?= $nilai_lama['final'] ?? '' ?>" min="0" max="100">
                            <small id="predikat-final-<?= $id_siswa ?>"></small>
                        </td>

                        <!-- Rata-rata -->
                        <td class="text-center">
                            <span id="rata-rata-<?= $id_siswa ?>"></span><br>
                            <small id="predikat-rata-<?= $id_siswa ?>"></small>
                        </td>

                        <!-- Status Simpan -->
                        <td class="text-center">
                            <span id="status-simpan-<?= $id_siswa ?>"></span>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


<?php else: ?>
    <div class="alert alert-warning mt-3">Tidak ada siswa dalam rombel ini.</div>
<?php endif; ?>

<script>
    function getPredikat(nilai) {
        if (nilai >= 90) return "A";
        if (nilai >= 80) return "B";
        if (nilai >= 70) return "C";
        return "D";
    }

    function tampilkanPredikat(idSiswa, harian, uts, final, rata) {
        const predikatHarian = getPredikat(harian);
        const predikatUts = getPredikat(uts);
        const predikatFinal = getPredikat(final);
        const predikatRata = getPredikat(rata);

        const predikatList = [
            { id: 'harian', value: predikatHarian },
            { id: 'uts', value: predikatUts },
            { id: 'final', value: predikatFinal },
            { id: 'rata', value: predikatRata },
        ];

        predikatList.forEach(item => {
            const el = $('#predikat-' + item.id + '-' + idSiswa);
            el.removeClass('text-danger text-success text-primary text-warning');

            let warna = '';
            switch (item.value) {
                case 'A':
                    warna = 'text-success'; break;
                case 'B':
                    warna = 'text-primary'; break;
                case 'C':
                    warna = 'text-warning'; break;
                case 'D':
                    warna = 'text-danger'; break;
            }

            el.html('<span class="badge ' + warna.replace('text-', 'bg-') + '">' + item.value + '</span>');
        });
    }

    function updatePredikatDanRata(id) {
        const harian = parseFloat($(`.harian-input[data-id="${id}"]`).val()) || 0;
        const uts = parseFloat($(`.uts-input[data-id="${id}"]`).val()) || 0;
        const final = parseFloat($(`.final-input[data-id="${id}"]`).val()) || 0;

        $(`#predikat-harian-${id}`).text(getPredikat(harian));
        $(`#predikat-uts-${id}`).text(getPredikat(uts));
        $(`#predikat-final-${id}`).text(getPredikat(final));

        const rata = Math.round((harian + uts + final) / 3);
        $(`#rata-rata-${id}`).text(rata);
        $(`#predikat-rata-${id}`).text(getPredikat(rata));
    }

    function showStatus(id, status) {
        const el = $('#status-simpan-' + id);
        if (status === 'loading') {
            el.html('<i class="fa fa-spinner fa-spin fa-2x text-warning"></i>');
        } else if (status === 'success') {
            el.html('<i class="fa fa-check fa-2x text-success"></i>');
        } else if (status === 'error') {
            el.html('<i class="fa fa-exclamation-triangle fa-2x text-danger"></i>');
        }
    }

    function hitungRata(h, u, f) {
        return Math.round(((h + u + f) / 3) * 100) / 100;
    }

    function initRataRata() {
        $('.harian-input').each(function () {
            const id = $(this).data('id');
            const harian = parseFloat($(this).val()) || 0;
            const uts = parseFloat($('input.uts-input[data-id="' + id + '"]').val()) || 0;
            const final = parseFloat($('input.final-input[data-id="' + id + '"]').val()) || 0;
            const rata = hitungRata(harian, uts, final);
            $('#rata-rata-' + id).text(rata);
        });
    }

    $(document).ready(function () {
        initRataRata();
    });

    $(document).on('input', '.harian-input, .uts-input, .final-input', function () {
        const input = $(this);
        const idSiswa = input.data('id');

        const harian = parseFloat($('input.harian-input[data-id="' + idSiswa + '"]').val()) || 0;
        const uts = parseFloat($('input.uts-input[data-id="' + idSiswa + '"]').val()) || 0;
        const final = parseFloat($('input.final-input[data-id="' + idSiswa + '"]').val()) || 0;
        const rata = hitungRata(harian, uts, final);

        $('#rata-rata-' + idSiswa).text(rata);

        const idJadwal = $('input[name="id_jadwal"]').val();

        showStatus(idSiswa, 'loading');

        $.ajax({
            url: '<?= base_url('nilai_siswa/simpan_otomatis') ?>',
            method: 'POST',
            data: {
                id_jadwal: idJadwal,
                id_siswa: idSiswa,
                harian: harian,
                uts: uts,
                final: final
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    showStatus(idSiswa, 'success');
                } else {
                    showStatus(idSiswa, 'error');
                }
            },
            error: function () {
                showStatus(idSiswa, 'error');
            }
        });
    });

    $(document).ready(function () {
        $('#tabel-nilai').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });

        <?php foreach ($siswa_list as $s): ?>
            updatePredikatDanRata(<?= $s['id_siswa'] ?>);
        <?php endforeach; ?>
    });

</script>
