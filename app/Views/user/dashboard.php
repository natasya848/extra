<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets2/img/kasir.png') ?>">
    <title>Dashboard - To Do List</title>
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

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
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

        .dashboard-header h3 {
            margin: 0;
            color: #5D4037;
        }

        .dashboard-header p {
            margin: 0;
            color: #8D6E63;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-custom {
            border-radius: 30px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            padding: 10px 20px;
        }

        .btn-profile {
            background-color: #F9D15B;
            color: #5D4037;
        }

        .btn-profile:hover {
            background-color: #FBC02D;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-logout {
            background-color: #FFAB91;
            color: #5D4037;
        }

        .btn-logout:hover {
            background-color: #FF8A65;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .stats-row {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            flex: 1;
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 235, 156, 0.4);
            border: 1px solid #FFE082;
            text-align: center;
        }

        .stat-card h6 {
            color: #8D6E63;
            margin-bottom: 10px;
        }

        .stat-card h3 {
            color: #5D4037;
            margin: 0;
        }

        .btn-add-task {
            background-color: #F9D15B;
            color: #5D4037;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            padding: 12px 24px;
            transition: all 0.3s ease-in-out;
            margin-bottom: 30px;
        }

        .btn-add-task:hover {
            background-color: #FBC02D;
            color: #3E2723;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .task-list-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 235, 156, 0.4);
            border: 1px solid #FFE082;
        }

        .task-item {
            border: 1px solid #FFE082;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background: #FFFDE7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-content {
            flex: 1;
        }

        .task-content h6 {
            color: #5D4037;
            margin-bottom: 5px;
        }

        .task-content small {
            color: #8D6E63;
        }

        .badge {
            font-size: 0.8em;
        }

        .task-buttons {
            margin-top: 10px;
        }

        .task-buttons .btn {
            margin-right: 5px;
            border-radius: 20px;
            font-size: 0.8em;
        }

        .check-button {
            margin-left: 15px;
        }

        .check-button .btn {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 10px;
            }
            .dashboard-header {
                flex-direction: column;
                text-align: center;
            }
            .header-buttons {
                margin-top: 10px;
            }
            .stats-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div>
                <h3>Dashboard To-Do List</h3>
                <p class="text-muted">Halo, <?= session('nama') ?> 👋</p>
            </div>
            <div class="header-buttons">
                <a href="<?= base_url('profile') ?>" class="btn btn-custom btn-profile">
                    <i class="bi bi-person-circle"></i> Profile
                </a>
                <a href="<?= base_url('logout') ?>" class="btn btn-custom btn-logout">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>

        <div class="stats-row">
            <div class="stat-card">
                <h6>Total Task</h6>
                <h3><?= $totalTask ?></h3>
            </div>
            <div class="stat-card">
                <h6>Belum Selesai</h6>
                <h3><?= $taskPending ?></h3>
            </div>
            <div class="stat-card">
                <h6>Selesai</h6>
                <h3><?= $taskDone ?></h3>
            </div>
        </div>

        <a href="<?= base_url('task/tambah') ?>" class="btn btn-add-task">
            <i class="bi bi-plus-circle"></i> Tambah Task
        </a>

        <div class="task-list-card">
            <h5>Daftar Task</h5>
            <?php if (empty($tasks)): ?>
                <p class="text-muted">Belum ada task.</p>
            <?php else: ?>
                <?php foreach ($tasks as $task): ?>
                <div class="task-item">
                    <div class="task-content">
                        <h6><?= esc($task['nama_tugas']) ?></h6>
                        <small>
                            Prioritas: <?= $task['prioritas'] ?> |
                            Tanggal: <?= $task['tanggal'] ?>
                        </small>
                        <br>
                        <span class="badge <?= $task['status']=='Selesai'?'bg-success':'bg-warning' ?>">
                            <?= ucfirst($task['status']) ?>
                        </span>

                        <div class="task-buttons">
                            <a href="<?= base_url('task/edit/'.$task['id_task']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('task/hapus/'.$task['id_task']) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus task ini?')">Hapus</a>
                        </div>
                    </div>
                    <div class="check-button">
                        <?php if ($task['status'] == 'Belum'): ?>
                            <a href="<?= base_url('task/selesai/'.$task['id_task']) ?>" class="btn btn-success btn-sm" title="Mark as Complete">
                                <i class="bi bi-check-circle"></i>
                            </a>
                        <?php else: ?>
                            <span class="btn btn-secondary btn-sm disabled" title="Already Completed">
                                <i class="bi bi-check-circle-fill"></i>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
