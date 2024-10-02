<?php
include('koneksi.php');
if (isset($_POST['submit'])) {
    $nama_rute = $_POST['nama_rute'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $tujuan = $_POST['tujuan'];
    $keterangan = $_POST['keterangan'];

    $sql = mysqli_query($koneksi, "INSERT INTO dishub (nama_rute, waktu_keberangkatan, tujuan, keterangan) VALUES ('$nama_rute', '$waktu_keberangkatan', '$tujuan', '$keterangan')");

    if ($sql) {
        echo '<script>alert("Data berhasil ditambahkan."); document.location="jadwal_bus.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal menambahkan data.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal Bus</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Jadwal Bus</h2>
        <form action="tambah.php" method="post">
            <div class="form-group">
                <label>Nama Rute</label>
                <input type="text" name="nama_rute" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Waktu Keberangkatan</label>
                <input type="datetime-local" name="waktu_keberangkatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
