<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets2/img/kasir.png') ?>">
    <title>Edit Task - To Do List</title>
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

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 235, 156, 0.4);
            border: 1px solid #FFE082;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h3 {
            color: #5D4037;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #8D6E63;
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

        .form-select {
            border-radius: 30px;
            border: 1px solid #F9D15B;
            padding: 12px 20px;
        }

        .form-select:focus {
            border-color: #F4B400;
            box-shadow: 0 0 5px rgba(244, 180, 0, 0.4);
        }

        .btn-custom {
            border-radius: 30px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            padding: 12px 24px;
        }

        .btn-primary-custom {
            background-color: #F9D15B;
            color: #5D4037;
        }

        .btn-primary-custom:hover {
            background-color: #FBC02D;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-secondary-custom {
            background-color: #FFAB91;
            color: #5D4037;
        }

        .btn-secondary-custom:hover {
            background-color: #FF8A65;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #5D4037;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 30px 20px;
            }
            .button-group {
                flex-direction: column;
            }
            .button-group .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h3>Edit Task</h3>
            <p>Silakan edit data tugas.</p>
        </div>

        <form action="<?= base_url('task/update/' . $task['id_task']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="nama_tugas">Nama Tugas</label>
                <input type="text" id="nama_tugas" name="nama_tugas" class="form-control"
                       value="<?= esc($task['nama_tugas']) ?>" required>
            </div>

            <div class="form-group">
                <label for="prioritas">Prioritas</label>
                <select id="prioritas" name="prioritas" class="form-select" required>
                    <option value="Rendah" <?= $task['prioritas']=='Rendah'?'selected':'' ?>>Rendah</option>
                    <option value="Sedang" <?= $task['prioritas']=='Sedang'?'selected':'' ?>>Sedang</option>
                    <option value="Tinggi" <?= $task['prioritas']=='Tinggi'?'selected':'' ?>>Tinggi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control"
                       value="<?= esc($task['tanggal']) ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="Belum" <?= $task['status']=='Belum'?'selected':'' ?>>Belum</option>
                    <option value="Selesai" <?= $task['status']=='Selesai'?'selected':'' ?>>Selesai</option>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-custom btn-primary-custom">
                    <i class="bi bi-check-circle"></i> Update
                </button>
                <a href="<?= base_url('home') ?>" class="btn btn-custom btn-secondary-custom">
                    <i class="bi bi-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
