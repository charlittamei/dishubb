<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "DELETE FROM dishub WHERE id='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil dihapus."); document.location="jadwal_bus.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data."); document.location="jadwal_bus.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan."); document.location="jadwal_bus.php";</script>';
}
?>
