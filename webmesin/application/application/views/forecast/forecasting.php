<!-- application/views/forecast/forecasting.php -->
<section class="content-header">
    <h1>Forecasting
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Forecasting</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">PrediksiPanen Bawang Merah Per Kabupaten</h3>
        </div>
        <div class="box-body">
            <form action="<?= site_url('forecasting/process') ?>" method="POST">
                <div class="form-group">
                    <label for="kabupaten">Pilih Kabupaten</label>
                    <select class="form-control" id="kabupaten" name="kabupaten">
                        <option value="">-- Pilih Kabupaten --</option>
                        <?php foreach ($kabupaten as $row): ?>
                            <option value="<?= $row['kabupaten'] ?>" 
                                <?= isset($selected_kabupaten) && $selected_kabupaten == $row['kabupaten'] ? 'selected' : '' ?>>
                                <?= $row['kabupaten'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Proses</button>
            </form>
        </div>
    </div>

    <?php if (isset($hasil_prediksi)): ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hasil Prediksi Sebelumnya</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Total Produksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hasil_prediksi as $index => $prediksi): ?>
                        <?php if (isset($prediksi[0]) && isset($prediksi[1]) && isset($prediksi[2])): ?>
                            <tr>
                                <td><?= htmlspecialchars($prediksi[0]) ?></td> <!-- No -->
                                <td><?= htmlspecialchars($prediksi[1]) ?></td> <!-- Tahun -->
                                <td><?= htmlspecialchars($prediksi[2]) ?></td> <!-- Total Produksi -->
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">Data tidak lengkap</td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hasil Prediksi 12 Bulan ke Depan</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Bulan</th>
                        <th>Hasil Prediksi (ton)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hasil_prediksi_2024 as $index => $prediksi): ?>
                        <tr>
                            
                            <td><?= $prediksi[0] ?></td>
                            <td><?= $prediksi[1] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Grafik Hasil Prediksi</h3>
        </div>
        <div class="box-body">
        <img src="<?= base_url('uploads/hasil_grafik_latih.png') ?>" alt="Grafik Data latih" class="img-responsive">
            <img src="<?= base_url('uploads/hasil_grafik.png') ?>" alt="Grafik Hasil Uji" class="img-responsive">
            <img src="<?= base_url('uploads/grafik_prediksi.png') ?>" alt="Grafik Hasil Prediksi" class="img-responsive">
        </div>
    </div>
    <?php endif; ?>
</section>
