<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $nama_bus = $_POST['nama_bus'];
    $tipe_bus = $_POST['tipe_bus'];
    $kapasitas = $_POST['kapasitas'];
    $nomor_plat = $_POST['nomor_plat'];

    $sql = mysqli_query($koneksi, "INSERT INTO bus (nama_bus, tipe_bus, kapasitas, nomor_plat) VALUES ('$nama_bus', '$tipe_bus', '$kapasitas', '$nomor_plat')");

    if ($sql) {
        echo '<script>alert("Data berhasil ditambahkan."); document.location="data_bus.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal menambahkan data.</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Bus - E-DISHUB GARUT</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #001f3f; /* Dark blue background */
            color: #ffffff; /* White text color for better contrast */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Data Bus</h2>
        <form action="tambah_bus.php" method="post">
            <div class="form-group">
                <label>Nama Bus</label>
                <input type="text" name="nama_bus" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tipe Bus</label>
                <input type="text" name="tipe_bus" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nomor Plat</label>
                <input type="text" name="nomor_plat" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            <a href="data_bus.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
