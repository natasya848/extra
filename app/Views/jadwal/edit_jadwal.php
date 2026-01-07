<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit <?= $title ?></h3>
          <p class="text-subtitle text-muted">Silakan edit data <?= $title ?></p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Edit <?= $title ?>
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
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <form class="form-horizontal" action="<?= base_url('jadwal/aksi_edit_jadwal/' . $jadwal->id_jadwal) ?>" method="post">
                  <input type="hidden" name="id_jadwal" value="<?= $jadwal->id_jadwal ?>">
                  <div class="form-body">

                    <div class="row mb-3">
                      <div class="col-md-4"><label>Tahun Ajaran</label></div>
                      <div class="col-md-8">
                        <select name="id_tahun" class="form-control" required>
                          <?php foreach ($tahun as $t) : ?>
                            <option value="<?= $t['id_tahun'] ?>" <?= ($t['id_tahun'] == $jadwal->id_tahun) ? 'selected' : '' ?>>
                              <?= $t['nama_t'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-4"><label>Blok</label></div>
                      <div class="col-md-8">
                        <select name="id_blok" class="form-control" id="blok" required>
                          <option value="">- Pilih Blok -</option>
                          <?php foreach ($blok as $b) : ?>
                            <option value="<?= $b->id_blok ?>" <?= ($b->id_blok == $jadwal->id_blok) ? 'selected' : '' ?>>
                              <?= $b->nama_b ?> - Semester <?= $b->semester ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-4"><label for="rombel">Rombel</label></div>
                      <div class="col-md-8">
                        <select name="rombel" class="form-control" id="rombel" required>
                          <option value="">- Pilih Rombel -</option>
                          <?php foreach ($rombel as $r) : ?>
                            <option value="<?= $r->id_rombel ?>" <?= ($r->id_rombel == $jadwal->id_rombel) ? 'selected' : '' ?>>
                              <?= $r->nama_kelas ?>.<?= $r->nama_r ?> - <?= $r->nama_jurusan ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><label>Sesi</label></div>
                        <div class="col-md-8">
                            <select name="id_sesi" class="form-control" id="sesi" required>
                            <option value="">- Pilih Sesi -</option>
                            <?php foreach ($sesi as $s) : ?>
                                <option value="<?= $s->id_sesi ?>" <?= ($s->id_sesi == $jadwal->id_sesi) ? 'selected' : '' ?>>
                                <?= $s->sesi ?> (<?= date('H:i', strtotime($s->jam_mulai)) ?> - <?= date('H:i', strtotime($s->jam_selesai)) ?>)
                                </option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-4"><label>Mata Pelajaran</label></div>
                      <div class="col-md-8">
                        <select name="id_mapel" class="form-control" id="mapel" required>
                          <option value="">- Pilih Mapel -</option>
                          <?php foreach ($mapel as $m) : ?>
                            <option value="<?= $m->id_mapel ?>" <?= ($m->id_mapel == $jadwal->id_mapel) ? 'selected' : '' ?>>
                              <?= $m->nama_mapel ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-4"><label>Guru</label></div>
                      <div class="col-md-8">
                        <select name="id_guru" class="form-control" required>
                          <option value="">- Pilih Guru -</option>
                          <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g->id_guru ?>" <?= ($g->id_guru == $jadwal->id_guru) ? 'selected' : '' ?>>
                              <?= $g->nama ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                        <a href="<?= base_url('jadwal') ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div><!-- end card-body -->
            </div><!-- end card-content -->
          </div><!-- end card -->
        </div>
      </div>
    </section>
  </div>
</div>

<script>
function loadSesiEdit() {
  let blok = $('#blok').val();
  let rombel = $('#rombel').val();
  let currentSesi = "<?= $jadwal->id_sesi ?? '' ?>"; 

  if (blok && rombel) {
    $('#sesi').html('<option>Loading...</option>');

    $.ajax({
      url: "<?= base_url('jadwal/getSesiTersediaEdit') ?>",
      type: "POST",
      data: {
        id_blok: blok,
        id_rombel: rombel,
        current_sesi: currentSesi
      },
      success: function (data) {
        $('#sesi').html(data);
        loadMapel(); 
      }
    });
  } else {
    $('#sesi').html('<option value="">- Pilih Sesi -</option>');
    $('#mapel').html('<option value="">- Pilih Mapel -</option>');
  }
}

$('#blok, #rombel').on('change', loadSesiEdit);


function loadMapel() {
  let blok = $('#blok').val();
  let sesi = $('#sesi').val();
  let rombel = $('#rombel').val();

  if (blok && sesi && rombel) {
    $('#mapel').html('<option>Loading...</option>');

    $.ajax({
      url: "<?= base_url('jadwal/getMapelTersedia') ?>",
      type: "POST",
      data: {
        id_blok: blok,
        id_sesi: sesi,
        id_rombel: rombel
      },
      success: function (data) {
        $('#mapel').html(data);
      }
    });
  } else {
    $('#mapel').html('<option value="">- Pilih Mapel -</option>');
  }
}

$('#sesi').on('change', loadMapel); 

$(document).ready(function () {
  loadSesiEdit();

  setTimeout(function () {
    $('#sesi').val("<?= $jadwal->id_sesi ?>"); 
    loadMapel(); 
  }, 500);
});
</script>
