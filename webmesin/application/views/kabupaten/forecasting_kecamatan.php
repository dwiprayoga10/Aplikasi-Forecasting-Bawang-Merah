<!-- File: application/views/kabupaten/forecasting_kecamatan.php -->

<section class="content-header">
    <h1>Forecasting Kecamatan</h1>
</section>

<!-- Main content -->
<section class="content">
    <form method="post" action="<?= site_url('forecasting_kecamatan/process') ?>">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label for="kecamatan">Pilih Kecamatan:</label>
                    <select id="kecamatan" name="kecamatan" class="form-control">
                        <?php foreach ($kecamatan as $row): ?>
                            <option value="<?= $row['kecamatan'] ?>" <?= isset($selected_kecamatan) && $selected_kecamatan === $row['kecamatan'] ? 'selected' : '' ?>>
                                <?= $row['kecamatan'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Proses</button>
            </div>
        </div>
    </form>

    <?php if (isset($hasil_prediksi)): ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hasil Prediksi</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Luas Panen</th>
                        <th>Produksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hasil_prediksi as $prediksi): ?>
                        <tr>
                            <td><?= htmlspecialchars($prediksi['tahun']) ?></td>
                            <td><?= htmlspecialchars($prediksi['luas_panen']) ?></td>
                            <td><?= htmlspecialchars($prediksi['produksi']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</section>
