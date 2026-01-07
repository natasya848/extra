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
              <li class="breadcrumb-item"><a href="<?=base_url('agendapkl/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="container">
        <div class="row justify-content-center">
         <div class="col-md-6 col-12">
          <div class="card">
           <form action="<?= base_url('agendapkl/data_agenda_guru/export_excel')?>" method="post">
            <div class="card-header bg-primary">
              <h4 class="card-title text-white d-flex justify-content-center align-items-center">Form Laporan Agenda Excel</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <form class="form form-horizontal">
                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label for="nama_karyawan">Nama Siswa : </label>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group" style="display:flex;">
                          <select class="form-select" name="nama" id="nama" required>
                            <option value="">- Pilih -</option>
                            <?php foreach($nama as $siswa) { ?>
                              <option value="<?=$siswa->user_siswa?>"><?=$siswa->nama_siswa?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="nama_karyawan">Tanggal Awal : </label>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group" style="display:flex;">
                          <input type="date" class="form-control" id="awal" placeholder="Masukkan Tanggal Lahir" name="awal" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="nama_karyawan">Tanggal Akhir : </label>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group" style="display:flex;">
                          <input type="date" class="form-control" id="akhir" placeholder="Masukkan Tanggal Lahir" name="akhir" required>
                        </div>
                      </div>

                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1 mb-1"><i class="faj-button fa fa-file-excel"></i>Excel</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-12">
          <div class="card">
            <form action="<?= base_url('agendapkl/data_agenda_guru/export_pdf')?>" method="post">
              <div class="card-header bg-primary">
                <h4 class="card-title text-white d-flex justify-content-center align-items-center">Form Agenda PKL PDF</h4>
              </div>

              <div class="card-content">
                <div class="card-body">
                  <form class="form form-horizontal">
                    <div class="form-body">
                      <div class="row">

                        <div class="col-md-4">
                          <label for="nama_karyawan">Nama Siswa : </label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group" style="display:flex;">
                            <select class="form-select" name="nama" id="nama" required>
                              <option value="">- Pilih -</option>
                              <?php foreach($nama as $siswa) { ?>
                                <option value="<?=$siswa->user_siswa?>"><?=$siswa->nama_siswa?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="nama_karyawan">Tanggal Awal : </label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group" style="display:flex;">
                            <input type="date" class="form-control" id="awal" placeholder="Masukkan Tanggal Lahir" name="awal" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="nama_karyawan">Tanggal Akhir : </label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group" style="display:flex;">
                            <input type="date" class="form-control" id="akhir" placeholder="Masukkan Tanggal Lahir" name="akhir" required>
                          </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-danger me-1 mb-1"><i class="faj-button fa-solid fa-file-pdf"></i>PDF</button>
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