<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4><?=$title?></h4>
    </div>

        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Kode Barcode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>QR Code</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= esc($user->kode_barcode) ?></td>
                        <td><?= esc($user->nama_produk) ?></td>
                        <td><?= esc($user->kategori) ?></td>
                        <td><?= 'Rp ' . number_format($user->harga_jual, 0, ',', '.') ?></td>
                        <td><?= esc($user->stok) ?></td>
                        <td><?= esc($user->status) ?></td>
                        <td>
                            <img src="<?= base_url('produk/barcode/' . $user->kode_barcode) ?>" 
                                alt="QR Code" width="50" height="50">
                            <br>
                            <a href="javascript:void(0);" 
                            onclick="printQR('<?= $user->kode_barcode ?>')" 
                            class="btn btn-sm btn-outline-primary mt-1">Cetak</a>
                        </td>

                        <td><?= esc($user->created_at) ?></td>
                        <td><?= esc($user->updated_at ?? '-') ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script>
    function printQR(kode) {
        const url = "<?= base_url('produk/barcode/') ?>" + kode;
        const printWindow = window.open(url, '_blank');
        printWindow.onload = function() {
            printWindow.print();
        };
    }
</script>
