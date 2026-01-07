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
                            <li class="breadcrumb-item"><a href="<?=base_url('agendapkl/dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
               <?php if (session()->get('level') == 2) { ?>
                   <div class="card-header">
                    <a href="<?php echo base_url('agendapkl/data_absensi_sekolah/create/'. $riz->id_absensi)?>">
                        <button class="btn btn-primary mt-2">
                            <i class="fa-solid fa-plus"></i> Tambah
                        </button>
                    </a>
                </div>
            <?php } ?>
            <?php if (session()->get('level') == 3 || session()->get('level')==3) { ?>
                   <div class="card-header">
                    <a href="javascript:history.back()"><button class="btn btn-secondary mt-2"><i class="fa-solid fa-backward"></i>
                    Back</button></a>
                </div>
            <?php } ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <?php if (session()->get('level') == 2){ ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($jojo as $riz) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?php echo $riz->nis ?></td>         
                            <td><?php echo $riz->nama_siswa ?></td>
                            <td><?php echo date('d F Y', strtotime($riz->tanggal))?></td>
                            <td><?php echo $riz->nama_keterangan ?></td>
                            <?php if (session()->get('level') == 2) { ?>
                            <td>
                                <a href="<?php echo base_url('agendapkl/data_absensi_sekolah/edit/'. $riz->id_absensi)?>" class="btn btn-warning my-1"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                <a href="<?php echo base_url('agendapkl/data_absensi_sekolah/delete/'. $riz->id_absensi)?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>


