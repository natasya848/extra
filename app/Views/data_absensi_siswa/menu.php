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
       <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
       <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
     </ol>
   </nav>
 </div>
</div>
</div>

<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-12">
        <div class="card">
         <form action="<?= base_url('data_absensi_siswa')?>" method="post">
          <div class="card-header bg-primary">
            <h4 class="card-title text-white d-flex justify-content-center align-items-center">Form Data Absensi</h4>
          </div>

          <div class="card-content">
            <div class="card-body">
              <form class="form form-horizontal">
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-4">
                      <label for="nama_karyawan">Blok : </label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group" style="display:flex;">
                        <select class="form-select" name="blok" id="blok">
                          <option value="">- Pilih -</option>
                          <?php foreach($blok as $b) { ?>
                            <option value="<?=$b->id_blok?>">Blok <?=$b->nama_b?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="nama_karyawan">Semester : </label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group" style="display:flex;">
                        <select class="form-select" name="semester" id="semester">
                          <option value="">- Pilih -</option>
                          <?php foreach($semester as $s) { ?>
                            <option value="<?=$s->id_semester?>"><?=$s->nama_s?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="nama_karyawan">Tahun : </label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group" style="display:flex;">
                        <select class="form-select" name="tahun" id="tahun" required>
                          <option value="">- Pilih -</option>
                          <?php foreach($tahun as $t) { ?>
                            <option value="<?=$t->id_tahun?>"><?=$t->nama_t?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1"></i>Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

