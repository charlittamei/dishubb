<?php
include('koneksi.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($koneksi, "SELECT * FROM dishub WHERE id='$id'");

    if (mysqli_num_rows($select) == 0) {
        echo '<div class="alert alert-warning">ID tidak ditemukan.</div>';
        exit();
    } else {
        $data = mysqli_fetch_assoc($select);
    }
}

if (isset($_POST['submit'])) {
    $nama_rute = $_POST['nama_rute'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $tujuan = $_POST['tujuan'];
    $keterangan = $_POST['keterangan'];

    $sql = mysqli_query($koneksi, "UPDATE dishub SET nama_rute='$nama_rute', waktu_keberangkatan='$waktu_keberangkatan', tujuan='$tujuan', keterangan='$keterangan' WHERE id='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil diperbarui."); document.location="jadwal_bus.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal memperbarui data.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Bus</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Jadwal Bus</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label>Nama Rute</label>
                <input type="text" name="nama_rute" class="form-control" value="<?php echo $data['nama_rute']; ?>" required>
            </div>
            <div class="form-group">
                <label>Waktu Keberangkatan</label>
                <input type="datetime-local" name="waktu_keberangkatan" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($data['waktu_keberangkatan'])); ?>" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" value="<?php echo $data['tujuan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"><?php echo $data['keterangan']; ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
