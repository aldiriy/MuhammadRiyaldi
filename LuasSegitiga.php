<?php
$hasil = array();
if (isset($_POST['submit'])) {
    $alas = $_POST['alas'];
    $tinggi = $_POST['tinggi'];
    $jumlah_data = count($alas);

    // Validasi input: pastikan bahwa semua nilai alas dan tinggi adalah angka
    $semuaAngka = true;
    foreach ($alas as $nilai) {
        if (!is_numeric($nilai)) {
            $semuaAngka = false;
            break;
        }
    }
    foreach ($tinggi as $nilai) {
        if (!is_numeric($nilai)) {
            $semuaAngka = false;
            break;
        }
    }

    if ($semuaAngka) {
        for ($i = 0; $i < $jumlah_data; $i++) {
            $luas = 0.5 * $alas[$i] * $tinggi[$i];
            $hasil[] = $luas;
        }
    } else {
        echo "<p>Silakan masukkan angka untuk alas dan tinggi segitiga.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Segitiga</title>
</head>
<body>
    <h2>Hitung Luas Segitiga</h2>
    <form method="post" action="">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <label for="alas<?= $i ?>">Alas Segitiga <?= $i + 1 ?>:</label>
            <input type="text" name="alas[]" id="alas<?= $i ?>"><br>
            <label for="tinggi<?= $i ?>">Tinggi Segitiga <?= $i + 1 ?>:</label>
            <input type="text" name="tinggi[]" id="tinggi<?= $i ?>"><br><br>
        <?php endfor; ?>
        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    // Jika hasil sudah dihitung dan validasi sukses, tampilkan hasilnya
    if (!empty($hasil)) {
        $jumlah_data = count($hasil);
        for ($i = 0; $i < $jumlah_data; $i++) {
            echo "Luas segitiga ke-" . ($i + 1) . ": " . $hasil[$i] . "<br>";
        }
    }
    ?>
</body>
</html>