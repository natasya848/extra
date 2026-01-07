<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4><?=$title?></h4>
    </div>

        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= esc($user->nama) ?></td>
                        <td><?= esc($user->email) ?></td>
                        <td><?= esc($user->created_at) ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('user') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

