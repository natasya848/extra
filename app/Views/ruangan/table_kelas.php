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

    <!-- Basic Tables start -->
    <section class="section">
      <div class="card">
        <div class="card-header">
          <a href="<?=base_url('tambah_kelas')?>">
            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            Tambah</button>
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                foreach ($kelas as $b) {
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $b->nama_kelas?> </td>
                    <td>
                      <a href="<?= base_url('edit_kelas/'.$b->id_kelas) ?>" 
                        class="btn btn-primary btn-sm">
                          <i class="fa fa-edit"></i>
                      </a>

                      <a href="<?= base_url('delete_kelas/'.$b->id_kelas) ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data kelas ini?')">
                          <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- Basic Tables end -->
  </div>