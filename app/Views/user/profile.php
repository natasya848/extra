<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets2/img/kasir.png') ?>">
    <title>Profile - To Do List</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #FFF8E1, #ffffff);
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 235, 156, 0.4);
            border: 1px solid #FFE082;
            margin-bottom: 30px;
        }

        .profile-header h3 {
            margin: 0;
            color: #5D4037;
        }

        .btn-back {
            background-color: #F9D15B;
            color: #5D4037;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
        }

        .btn-back:hover {
            background-color: #FBC02D;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 235, 156, 0.4);
            border: 1px solid #FFE082;
        }

        .profile-card h4 {
            color: #5D4037;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border-radius: 30px;
            border: 1px solid #F9D15B;
            padding: 12px 20px;
        }

        .form-control:focus {
            border-color: #F4B400;
            box-shadow: 0 0 5px rgba(244, 180, 0, 0.4);
        }

        .form-label {
            color: #8D6E63;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .btn-update {
            background-color: #F9D15B;
            color: #5D4037;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            padding: 12px 30px;
            transition: all 0.3s ease-in-out;
            width: 100%;
        }

        .btn-update:hover {
            background-color: #FBC02D;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .alert {
            border-radius: 12px;
            border: none;
        }

        .alert-success {
            background-color: #E8F5E8;
            color: #2E7D32;
        }

        .alert-danger {
            background-color: #FFEBEE;
            color: #C62828;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 10px;
            }
            .profile-header {
                flex-direction: column;
                text-align: center;
            }
            .btn-back {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h3>Profile</h3>
            <a href="<?= base_url('home/user') ?>" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="profile-card">
            <h4>Update Profile</h4>
            <form action="<?= base_url('profile/update') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                           value="<?= esc($user['nama']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= esc($user['email']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru (Opsional)</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                           placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>

                <button type="submit" class="btn btn-update">
                    <i class="bi bi-check-circle"></i> Update Profile
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
