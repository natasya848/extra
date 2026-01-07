<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3><?=$title?></h3>
          <p class="text-subtitle text-muted">
            Silakan <?=$title?>
          </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav
          aria-label="breadcrumb"
          class="breadcrumb-header float-start float-lg-end"
          >
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=base_url('login/dashboard')?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               <?=$title?>
            </li>
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
              <form class="form-horizontal form-label-left" novalidate action="<?= base_url('nilai/aksi_edit_nilai')?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $jojo->id_nilai ?>">
                  <div class="form-body">
                    <div class="row">
                    <div class="col-md-4">
    <label for="first-name-horizontal">Siswa</label>
</div>
<div class="col-md-8 form-group">
    <select class="form-select" id="basicSelect" name="siswa">
        <?php
            foreach ($z as $b) {
                $selected = ($jojo->siswa == $b->id_siswa) ? "selected" : "";
        ?>
        <option value="<?= $b->id_siswa ?>" <?= $selected ?>>
            <?php echo $b->nama_siswa ?>
        </option>
        <?php } ?>
    </select>
</div>

                    <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Pengetahuan</label
                              > 
                            </div>
                            <div class="col-md-8 form-group">
                              <input
                                type="text"
                                id="first-name-horizontal"
                                class="form-control"
                                name="pengetahuan"
                                placeholder="Pengetahuan" value="<?php echo $jojo->pengetahuan?>"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="first-name-horizontal"
                                >Keterampilan</label
                              > 
                            </div>
                            <div class="col-md-8 form-group">
                              <input
                                type="text"
                                id="first-name-horizontal"
                                class="form-control"
                                name="keterampilan"
                                placeholder="keterampilan" value="<?php echo $jojo->keterampilan?>"
                              />
                            </div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal"
                        >Blok</label
                        >
                      </div>
                      <div class="col-md-8 form-group">
                      <select class="form-select" id="basicSelect" name="blok" >
                              <?php
                                    foreach ($e as $b) {
                                        
                                        $selected = ($jojo->blok == $b->id_blok) ? "selected" : "";
                                        ?>
                                        <option value="<?= $b->id_blok ?>" <?= $selected ?>>
                                            <?php echo $b->nama_b?>
                                        </option>
                                    <?php } ?>
                                </select>
                      </div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal"
                        >Mapel</label
                        >
                      </div>
                      <div class="col-md-8 form-group">
                      <select class="form-select" id="basicSelect" name="mapel" >
                              <?php
                                    foreach ($c as $b) {
                                        
                                        $selected = ($jojo->mapel == $b->id_mapel) ? "selected" : "";
                                        ?>
                                        <option value="<?= $b->id_mapel ?>" <?= $selected ?>>
                                            <?php echo $b->nama_mapel?>
                                        </option>
                                    <?php } ?>
                                </select>
                      </div>
                      <div class="col-md-4">
                        <label for="first-name-horizontal"
                        >Rombel</label
                        >
                      </div>
                      <div class="col-md-8 form-group">
                      <select class="form-select" id="basicSelect" name="rombel" >
                              <?php
                                    foreach ($a as $b) {
                                        
                                        $selected = ($jojo->rombel == $b->id_rombel) ? "selected" : "";
                                        ?>
                                        <option value="<?= $b->id_rombel ?>" <?= $selected ?>>
                                            <?php echo $b->nama_kelas . '.' . $b->nama_r . ' - ' . $b->nama_jurusan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                      </div>
                      <div class="col-md-4">
                        <label for="first-name-horizontal"
                        >Guru</label
                        >
                      </div>
                      <div class="col-md-8 form-group">
                      <select class="form-select" id="basicSelect" name="guru" >
                              <?php
                                    foreach ($g as $b) {
                                        
                                        $selected = ($jojo->guru == $b->id_guru) ? "selected" : "";
                                        ?>
                                        <option value="<?= $b->id_guru ?>" <?= $selected ?>>
                                            <?php echo $b->nama?>
                                        </option>
                                    <?php } ?>
                                </select>
                      </div>
                      <div class="col-sm-12 d-flex justify-content-end">
                        <button
                        type="submit"
                        class="btn btn-primary me-1 mb-1"
                        >
                        Submit
                      </button>
                      <button
                      type="reset"
                      class="btn btn-light-secondary me-1 mb-1"
                      >
                      Reset
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    