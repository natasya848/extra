<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Input <?= $title ?></h3>
          <p class="text-subtitle text-muted">Silakan Masukkan <?= $title ?></p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url('login/dashboard') ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Input <?= $title ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <form 
                  class="form-horizontal form-label-left" 
                  novalidate 
                  action="<?= base_url('aksi_tambah_rombel') ?>" 
                  method="post"
                >
                <?= csrf_field() ?>
                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label for="first-name-horizontal">Nama Rombel</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input
                          type="text"
                          id="first-name-horizontal"
                          class="form-control"
                          name="nama"
                          placeholder="Nama Rombel"
                        />
                      </div>

                      <div class="col-md-4">
                        <label>Jenjang</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select class="form-select" name="jenjang" id="jenjang" required>
                          <option value="">-PILIH-</option>
                          <?php foreach ($jenjang as $j) : ?>
                            <option value="<?= $j->id_jenjang ?>"><?= $j->nama_jenjang ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label>Kelas</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select class="form-select" name="kelas" id="kelas">
                          <option value="">-PILIH-</option>
                          <?php foreach ($g as $h) : ?>
                            <option 
                              value="<?= $h->id_kelas ?>" 
                              data-id_kelas="<?= $h->id_kelas ?>"
                            >
                              <?= $h->nama_kelas ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div id="jurusan-wrapper">
                        <div class="col-md-4">
                          <label>Jurusan</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" name="jurusan_select" id="jurusan_select">
                            <option value="">-PILIH-</option>
                            <?php foreach ($a as $b) : ?>
                              <?php if ($b->id_jurusan != 5 && $b->id_jurusan != 6) : ?>
                                <option value="<?= $b->id_jurusan ?>"><?= $b->nama_jurusan ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <input type="hidden" name="jurusan" id="jurusan">

                      <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div> 
          </div> 
        </div> 
      </div>
    </section>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const jenjangSelect = document.getElementById("jenjang");
    const jurusanWrapper = document.getElementById("jurusan-wrapper");
    const jurusanSelect = document.getElementById("jurusan_select");
    const jurusanHidden = document.getElementById("jurusan");
    const kelasSelect = document.getElementById("kelas");

    const ID_SMK = "2";
    const ID_SMP = "1";
    const ID_TIDAK_MENGAJAR = "5";

    function updateJurusan() {
      const jenjangVal = jenjangSelect.value;

      if (jenjangVal === ID_SMK) {
        jurusanWrapper.style.display = "flex";
        jurusanHidden.value = jurusanSelect.value;
      } else if (jenjangVal === ID_TIDAK_MENGAJAR) {
        jurusanWrapper.style.display = "none";
        jurusanHidden.value = "6";
      } else {
        jurusanWrapper.style.display = "none";
        jurusanHidden.value = "5";
      }
    }

    function filterKelas() {
    const jenjangVal = jenjangSelect.value;
    const allowedSMK = ["2", "5", "7"];
    const allowedSMP = ["8", "9", "14"];
    const ID_TIDAK_MENGAJAR = "5";
    const ID_KELAS_TIDAK_MENGAJAR = "15";

    Array.from(kelasSelect.options).forEach(option => {
      const idKelas = option.getAttribute("data-id_kelas");
      if (!idKelas) return;

      if (jenjangVal === "2") {
        option.style.display = allowedSMK.includes(idKelas) ? "block" : "none";
      } else if (jenjangVal === "1") {
        option.style.display = allowedSMP.includes(idKelas) ? "block" : "none";
      } else if (jenjangVal === ID_TIDAK_MENGAJAR) {
        option.style.display = idKelas === ID_KELAS_TIDAK_MENGAJAR ? "block" : "none";
      } else {
        option.style.display = "none";
      }
    });

    if (jenjangVal === ID_TIDAK_MENGAJAR) {
      kelasSelect.value = ID_KELAS_TIDAK_MENGAJAR;
    } else {
      kelasSelect.value = "";
    }
  }

    jenjangSelect.addEventListener("change", function () {
      updateJurusan();
      filterKelas();
    });

    jurusanSelect.addEventListener("change", function () {
      if (jenjangSelect.value === ID_SMK) {
        jurusanHidden.value = jurusanSelect.value;
      }
    });

    updateJurusan();
    filterKelas();
  });
</script>

