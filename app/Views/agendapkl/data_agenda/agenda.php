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
                <div class="card-header">
                    <a href="javascript:history.back()"><button class="btn btn-secondary mt-2"><i class="fa-solid fa-backward"></i>
                    Back</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Rencana Pekerjaan 1</th>
                                    <th>Rencana Pekerjaan 2</th>
                                    <th>Rencana Pekerjaan 3</th>
                                    <th>Rencana Pekerjaan 4</th>
                                    <th>Rencana Pekerjaan 5</th>
                                    <th>Realisasi Pekerjaan 1</th>
                                    <th>Realisasi Pekerjaan 2</th>
                                    <th>Realisasi Pekerjaan 3</th>
                                    <th>Realisasi Pekerjaan 4</th>
                                    <th>Realisasi Pekerjaan 5</th>
                                    <th>Penugasan Khusus 1</th>
                                    <th>Penugasan Khusus 2</th>
                                    <th>Penugasan Khusus 3</th>
                                    <th>Penemuan Masalah 1</th>
                                    <th>Penemuan Masalah 2</th>
                                    <th>Penemuan Masalah 3</th>
                                    <th>Senyum</th>
                                    <th>Keramahan</th>
                                    <th>Penampilan</th>
                                    <th>Komunikasi</th>
                                    <th>Realisasi Kerja</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <?php
                            $no=1;
                            foreach ($jojo as $riz) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>   
                                    <td><?php echo $riz->nama_siswa ?></td>
                                    <td><?php echo date('d F Y', strtotime($riz->tanggal))?></td>
                                    <td><?php echo date('H:i', strtotime($riz->jam_masuk)) ?></td>
                                    <td><?php echo date('H:i', strtotime($riz->jam_keluar)) ?></td>
                                    <td><?php echo $riz->renper_1 ?></td>
                                    <td><?php echo $riz->renper_2 ?></td>
                                    <td><?php echo $riz->renper_3 ?></td>
                                    <td><?php echo $riz->renper_4 ?></td>
                                    <td><?php echo $riz->renper_5 ?></td>
                                    <td><?php echo $riz->reape_1 ?></td>
                                    <td><?php echo $riz->reape_2 ?></td>
                                    <td><?php echo $riz->reape_3 ?></td>
                                    <td><?php echo $riz->reape_4 ?></td>
                                    <td><?php echo $riz->reape_5 ?></td>
                                    <td><?php echo $riz->pk_1 ?></td>
                                    <td><?php echo $riz->pk_2 ?></td>
                                    <td><?php echo $riz->pk_3 ?></td>
                                    <td><?php echo $riz->pm_1 ?></td>
                                    <td><?php echo $riz->pm_2 ?></td>
                                    <td><?php echo $riz->pm_3 ?></td>
                                    <td><?php echo $riz->senyum ?></td>
                                    <td><?php echo $riz->keramahan ?></td>
                                    <td><?php echo $riz->penampilan ?></td>
                                    <td><?php echo $riz->komunikasi ?></td>
                                    <td><?php echo $riz->realisasi_kerja ?></td>
                                    <td><?php echo $riz->catatan ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
