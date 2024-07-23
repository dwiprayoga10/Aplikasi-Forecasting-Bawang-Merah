<!DOCTYPE html>
<html>
<head>
    <title>Hasil Prediksi JST</title>
</head>
<body>
    <h1>Hasil Prediksi JST</h1>

    <div>
        <!-- Tampilkan hasil prediksi sesuai kebutuhan -->
        <?php if(isset($predictions)): ?>
            <h3>Hasil Prediksi:</h3>
            <ul>
                <?php foreach($predictions as $prediksi): ?>
                    <li><?php echo $prediksi; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

</body>
</html>
