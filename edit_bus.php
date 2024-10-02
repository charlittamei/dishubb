<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($koneksi, "SELECT * FROM bus WHERE id_bus='$id'");

    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">ID tidak ditemukan.</div>';
        exit();
    } else {
        $data = mysqli_fetch_assoc($select);
    }
}

if (isset($_POST['submit'])) {
    $nama_bus = mysqli_real_escape_string($koneksi, $_POST['nama_bus']);
    $tipe_bus = mysqli_real_escape_string($koneksi, $_POST['tipe_bus']);
    $kapasitas = (int)$_POST['kapasitas']; // Casting to int for safety
    $nomor_plat = mysqli_real_escape_string($koneksi, $_POST['nomor_plat']);

    $sql = mysqli_query($koneksi, "UPDATE bus SET nama_bus='$nama_bus', tipe_bus='$tipe_bus', kapasitas='$kapasitas', nomor_plat='$nomor_plat' WHERE id_bus='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil diperbarui."); document.location="data_bus.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal memperbarui data: ' . mysqli_error($koneksi) . '</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Bus</title>
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
        <h2>Edit Data Bus</h2>
        <form action="edit_bus.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
            <div class="form-group">
                <label>Nama Bus</label>
                <input type="text" name="nama_bus" class="form-control" value="<?php echo htmlspecialchars($data['nama_bus']); ?>" required>
            </div>
            <div class="form-group">
                <label>Tipe Bus</label>
                <input type="text" name="tipe_bus" class="form-control" value="<?php echo htmlspecialchars($data['tipe_bus']); ?>" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" value="<?php echo (int)$data['kapasitas']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor Plat</label>
                <input type="text" name="nomor_plat" class="form-control" value="<?php echo htmlspecialchars($data['nomor_plat']); ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
