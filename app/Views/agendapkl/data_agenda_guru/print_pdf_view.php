<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Agenda PKL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header, .alamat {
            text-align: center;
            margin-bottom: 20px;
        }
        .judul {
            font-size: 20px;
            font-weight: bold;
        }
        .tabel-agenda {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .tabel-agenda th,
        .tabel-agenda td {
            border: 1px solid #000;
            padding: 1px;
            text-align: center;
        }
        .tabel-agenda th {
            background-color: #f0f0f0;
        }
        .tabel-agenda th:first-child,
        .tabel-agenda td:first-child {
            width: 150px;
        }
        .tabel-pekerjaan {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .tabel-pekerjaan th,
        .tabel-pekerjaan td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .tabel-pekerjaan th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<?php foreach ($agenda as $riz) { ?>
    <body>
        <div class="page-break">

            <div class="header">
                <div class="judul">Sekolah GT</div>
                <div class="alamat">Daily Report PRAKERIND</div>
            </div>

            <table class="tabel-agenda">
                <tr>
                    <th>Tanggal</th>
                    <th>Jam Datang</th>
                    <th>Jam Pulang</th>
                </tr>
                <td><?= $riz['tanggal'] ?></td>
                <td><?= date('H:i', strtotime($riz['jam_masuk'])) ?></td>
                <td><?= date('H:i', strtotime($riz['jam_keluar'])) ?></td>
            </table>

            <table class="tabel-agenda">
                <tr>
                    <th colspan="5">Rencana Pekerjaan</th>
                </tr>
                <td><?= $riz['renper_1'] ?><br><br><br><br><br></td>
                <td><?= $riz['renper_2'] ?><br><br><br><br><br></td>
                <td><?= $riz['renper_3'] ?><br><br><br><br><br></td>
                <td><?= $riz['renper_4'] ?><br><br><br><br><br></td>
                <td><?= $riz['renper_5'] ?><br><br><br><br><br></td>
            </table>

            <table class="tabel-agenda">
                <tr>
                    <th colspan="5">Realisasi Pekerjaan</th>
                </tr>
                <td><?= $riz['reape_1'] ?><br><br><br><br><br></td>
                <td><?= $riz['reape_2'] ?><br><br><br><br><br></td>
                <td><?= $riz['reape_3'] ?><br><br><br><br><br></td>
                <td><?= $riz['reape_4'] ?><br><br><br><br><br></td>
                <td><?= $riz['reape_5'] ?><br><br><br><br><br></td>
            </table>

            <table class="tabel-agenda">
                <tr>
                    <th colspan="3">Penugasan Khusus dari Atasan</th>
                </tr>
                <td><?= $riz['pk_1'] ?><br><br><br><br><br></td>
                <td><?= $riz['pk_2'] ?><br><br><br><br><br></td>
                <td><?= $riz['pk_3'] ?><br><br><br><br><br></td>
            </table>

            <table class="tabel-agenda">
                <tr>
                    <th colspan="3">Penemuan Masalah di Lapangan</th>
                </tr>
                <td><?= $riz['pm_1'] ?><br><br><br><br><br></td>
                <td><?= $riz['pm_2'] ?><br><br><br><br><br></td>
                <td><?= $riz['pm_3'] ?><br><br><br><br><br></td>
            </table>

            <h4>Penilaian Harian (Diisi Pembimbing Perusahaan)</h4>
            <table class="tabel-pekerjaan">
                <tr>
                    <th>Senyum</th>
                    <th>Keramahan</th>
                    <th>Penampilan</th>
                    <th>Komunikasi</th>
                    <th>Realisasi Kerja</th>
                </tr>
                <td><?= $riz['senyum'] ?></td>
                <td><?= $riz['keramahan'] ?></td>
                <td><?= $riz['penampilan'] ?></td>
                <td><?= $riz['komunikasi'] ?></td>
                <td><?= $riz['realisasi_kerja'] ?></td>
            </table>

            <h4>Catatan Untuk Diingat</h4>
            <table class="tabel-pekerjaan">
               <td><?= $riz['catatan'] ?></td>
           </table>

       </body>
       </html>
       <?php } ?>