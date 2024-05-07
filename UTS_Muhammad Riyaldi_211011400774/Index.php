<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pertandingan</title>
</head>

<body>
    <h2>Input Data Pertandingan</h2>
    <form method="post" action="">
        <br>Data Yang diinput :
        <br>
        Negara : <input type="text" name="Negara"><br>
        Jumlah Pertandingan : <input type="text" name="P"><br>
        Jumlah Menang : <input type="text" name="M"><br>
        Jumlah Seri : <input type="text" name="S"><br>
        Jumlah Kalah : <input type="text" name="K"><br>
        Jumlah Poin : <input type="text" name="Poin"><br>
        <input type="submit" value="Masukan">
    </form>

    <?php
    session_start();

    // Fungsi untuk menghapus data berdasarkan indeks
    function hapusData($index)
    {
        unset($_SESSION['data_pertandingan'][$index]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $negara = $_POST['Negara'];
        $pertandingan = $_POST['P'];
        $menang = $_POST['M'];
        $seri = $_POST['S'];
        $kalah = $_POST['K'];
        $poin = $_POST['Poin'];

        // Masukkan data ke dalam array
        $data = array(
            'negara' => $negara,
            'pertandingan' => $pertandingan,
            'menang' => $menang,
            'seri' => $seri,
            'kalah' => $kalah,
            'poin' => $poin
        );

        // Simpan data dalam session
        if (!isset($_SESSION['data_pertandingan'])) {
            $_SESSION['data_pertandingan'] = array();
        }
        array_push($_SESSION['data_pertandingan'], $data);
    }

    // Menampilkan data dalam tabel
    if (isset($_SESSION['data_pertandingan'])) {
        echo "<h6>Data Groub A Piala Asia Qatar U-23</h6>";
        echo "<h6>Per 07 Mei 2024 20:41 (Waktu dan jam Sekarang)</h6>";
        echo "<h6>Muhamad Saeful Anhar/211011400848</h6>";
        echo "<table border='4'>";
        echo "<tr>
                <th>Negara</th>
                <th>Jumlah Pertandingan</th>
                <th>Jumlah Menang</th>
                <th>Jumlah Seri</th>
                <th>Jumlah Kalah</th>
                <th>Jumlah Poin</th>
                <th>Aksi</th>
            </tr>";
        foreach ($_SESSION['data_pertandingan'] as $index => $row) {
            echo "<tr>";
            echo "<td>" . $row['negara'] . "</td>";
            echo "<td>" . $row['pertandingan'] . "</td>";
            echo "<td>" . $row['menang'] . "</td>";
            echo "<td>" . $row['seri'] . "</td>";
            echo "<td>" . $row['kalah'] . "</td>";
            echo "<td>" . $row['poin'] . "</td>";
            // Tambahkan tombol hapus dengan mengirimkan indeks data yang akan dihapus
            echo "<td><a href='?hapus=" . $index . "'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Proses penghapusan data jika tombol hapus diklik
    if (isset($_GET['hapus'])) {
        hapusData($_GET['hapus']);
    }
    ?>
</body>

</html>