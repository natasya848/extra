<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kepala Surat</title>
    <style>
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px; /* Atur ukuran logo sesuai kebutuhan */
            height: auto;
        }
        .judul {
            font-size: 24px;
            font-weight: bold;
        }
        .alamat {
            font-size: 14px;
        }
        /* Add the Bootstrap CSS styles here */
        .table {
          width: 100%;
          margin-bottom: 1rem;
          color: #212529;
      }
      .table-bordered {
          border: 1px solid #dee2e6;
      }
      .table-bordered th,
      .table-bordered td {
          border: 1px solid #dee2e6;
          padding: 0.75rem;
          vertical-align: top;
      }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="header">
        <img src="<?=base_url('agendapkl/logo/logo_pdf/logo_pdf_contoh.svg')?>"> 
        <div class="judul mt-2">Sekolah GT</div>
        <div class="alamat">Jl. Raya Pahlawan No. 123, Kel. Sukajadi, Kec. Sukasari, Kota Batam 29424.</div>
        <div class="notel">Telp: (0778) 417852 Fax: (0778) 517523</div>
    </div>

    <h3><?= $title ?></h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($absensi as $riz) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $riz['nis'] ?></td>
                <td><?= $riz['nama_siswa'] ?></td>
                <td><?= date('d F Y', strtotime($riz['tanggal'])) ?></td>
                <td><?= $riz['nama_keterangan'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

</body>
</html>

<script>
  window.print();
</script>