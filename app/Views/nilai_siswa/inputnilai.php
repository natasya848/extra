<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3> <?= $title ?></h3>
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
                 <?= $title ?>
              </li>
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

    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">

              <a href="<?= base_url('nilai_siswa/info/' . $id_rombel) ?>" class="btn btn-secondary mb-3">
                  <i class="fas fa-arrow-left"></i> Kembali
              </a>

                <form method="get" action="">
                  <input type="hidden" name="id_rombel" value="<?= $id_rombel ?>">
                  
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="id_blok">Pilih Blok</label>
                      <select name="id_blok" id="id_blok" class="form-control">
                        <option value="">-- Pilih Blok --</option>
                        <?php foreach ($blok_list as $b): ?>
                          <option value="<?= $b->id_blok ?>"><?= $b->nama_b ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="id_jadwal">Pilih Jadwal</label>
                      <select name="id_jadwal" id="id_jadwal" class="form-control" disabled>
                        <option value="">-- Pilih Jadwal --</option>
                      </select>
                    </div>
                  </div>

              <div id="nilai-siswa-container">
                <!-- <?php if ($selected_jadwal && $siswa_list): ?>
                  <form method="post" action="<?= base_url('nilai_siswa/simpan') ?>">
                    <input type="hidden" name="id_jadwal" value="<?= $selected_jadwal ?>">
                       <div class="table-responsive">
                        <table class="table table-bordered mt-3 datatable-nilai" id="tabel-nilai">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Predikat</th>
                                <th>Nilai Keterampilan</th>
                                <th>Predikat</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($siswa_list as $siswa): 
                                    $id_siswa = $siswa['id_siswa']; $nilai_lama = isset($nilai_per_siswa[$id_siswa]) ? $nilai_per_siswa[$id_siswa] : null;?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $siswa['nis'] ?></td>
                                    <td><?= $siswa['nama_siswa'] ?></td>
                                    <td>
                                        <input type="number" name="pengetahuan[<?= $id_siswa ?>]" class="form-control pengetahuan-input" data-id="<?= $id_siswa ?>" 
                                            value="<?= $nilai_lama ? $nilai_lama['pengetahuan'] : '' ?>" required>
                                    </td>
                                    <td><span id="predikat-pengetahuan-<?= $id_siswa ?>"></span></td>
                                    <td>
                                        <input type="number" name="keterampilan[<?= $id_siswa ?>]" class="form-control keterampilan-input" data-id="<?= $id_siswa ?>" 
                                            value="<?= $nilai_lama ? $nilai_lama['keterampilan'] : '' ?>" required>
                                    </td>
                                    <td><span id="predikat-keterampilan-<?= $id_siswa ?>"></span></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-start mt-3 gap-2">
                        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                        <a href="<?= base_url("nilai_siswa/info/$id_rombel") ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                    </div>
                  </form>
                <?php elseif ($selected_jadwal): ?>
                  <div class="alert alert-warning mt-3">Tidak ada siswa dalam rombel ini.</div>
                <?php endif; ?> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>


<script>
    $(document).ready(function() {
        const table = $('#tabel-nilai').DataTable();
    });

    function getPredikat(nilai) {
      if (nilai >= 90) return "A";
      if (nilai >= 80) return "B";
      if (nilai >= 70) return "C";
      if (nilai > 0)   return "D";
      return "";
    }

    $('.pengetahuan-input').each(function() {
        const id = $(this).data('id');
        const nilai = parseFloat($(this).val());
        const predikat = getPredikat(nilai);
        $('#predikat-pengetahuan-' + id).text(predikat);
    });

    $('.keterampilan-input').each(function() {
        const id = $(this).data('id');
        const nilai = parseFloat($(this).val());
        const predikat = getPredikat(nilai);
        $('#predikat-keterampilan-' + id).text(predikat);
    });

    $('.pengetahuan-input').on('input', function() {
        const id = $(this).data('id');
        const nilai = parseFloat($(this).val());
        const predikat = getPredikat(nilai);
        $('#predikat-pengetahuan-' + id).text(predikat);
    });

    $('.keterampilan-input').on('input', function() {
        const id = $(this).data('id');
        const nilai = parseFloat($(this).val());
        const predikat = getPredikat(nilai);
        $('#predikat-keterampilan-' + id).text(predikat);
    });

    $(document).ready(function () {
      $('#id_blok').on('change', function () {
        const id_blok = $(this).val();
        const id_rombel = <?= $id_rombel ?>;

        $('#id_jadwal').prop('disabled', true).html('<option>Loading...</option>');

        $.get('<?= base_url('nilai_siswa/get_jadwal_ajax') ?>', { id_blok, id_rombel }, function (data) {
          $('#id_jadwal').prop('disabled', false).html(data);
        });
      });

      $('#id_jadwal').on('change', function () {
        const id_jadwal = $(this).val();
        const id_rombel = <?= $id_rombel ?>;

        $('#nilai-siswa-container').html('<p>Mengambil data nilai siswa...</p>');

        $.get('<?= base_url('nilai_siswa/get_siswa_ajax') ?>', { id_jadwal, id_rombel }, function (data) {
          $('#nilai-siswa-container').html(data);
        });
      });
    });

</script>