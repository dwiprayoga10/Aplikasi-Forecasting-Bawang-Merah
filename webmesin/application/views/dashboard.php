<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= base_url('path/to/your/styles.css') ?>">
</head>
<body>
    <section class="content-header">
        <h1>Dashboard <small>Prediksi Panen Bawang</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= site_url('kecamatan') ?>" class="info-box-link">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-area-chart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Kecamatan</span>
                            <span class="info-box-number"><?= isset($total_kecamatan) ? $total_kecamatan : 0 ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= site_url('user') ?>" class="info-box-link">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number"><?= isset($total_users) ? $total_users : 0 ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?= site_url('data') ?>" class="info-box-link">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-folder-open"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Aktual</span>
                            <span class="info-box-number"><?= isset($total_data_aktual) ? $total_data_aktual : 0 ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-magenta"><i class="fa fa-map-marker"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Visitor</span>
                        <span class="info-box-number"><?= isset($total_visitors) ? $total_visitors : 0 ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Grafik Produksi dan Luas Panen (2018-2024)</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="dataChart" style="height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('dataChart').getContext('2d');

        // Ambil data dari PHP dan format ke dalam array JavaScript
        var years = <?= json_encode(array_column($data_grafik, 'tahun')) ?>;
        var luasPanen = <?= json_encode(array_column($data_grafik, 'luas_panen')) ?>;
        var produksi = <?= json_encode(array_column($data_grafik, 'produksi')) ?>;

        new Chart(ctx, {
            type: 'bar', // Ubah jenis grafik menjadi 'bar' untuk diagram batang
            data: {
                labels: years,
                datasets: [
                    {
                        label: 'Luas Panen',
                        data: luasPanen,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Produksi',
                        data: produksi,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>
</body>
</html>
