<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "DELETE FROM bus WHERE id_bus='$id'");

    if ($sql) {
        echo '<script>alert("Data berhasil dihapus."); document.location="data_bus.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data."); document.location="data_bus.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan."); document.location="data_bus.php";</script>';
}
?>
