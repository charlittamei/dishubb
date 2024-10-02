<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Bus Terminal Garut</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        .table-dark th {
            background-color: #003366; /* Warna biru tua */
            color: white; /* Warna teks putih */
        }
    </style>
</head>
<body>
    <?php
    session_start(); // Mulai sesi

    // Jika pengguna sudah login, tampilkan daftar jadwal
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        include('koneksi.php');

        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">E-DISHUB GARUT</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="jadwal_bus.php">Home</a>
                        </li>
                        <?php if ($_SESSION['username'] == 'admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="tambah.php">Tambah Jadwal</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="data_bus.php">Bus</a> </li> </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="informasi.php">Informasi</a> </li> </ul>
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h2>Daftar Jadwal Bus</h2>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Rute</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Tujuan</th>
                        <th>Keterangan</th>
                        <?php if ($_SESSION['username'] == 'admin') { ?>
                            <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM dishub ORDER BY id DESC");
                    while ($data = mysqli_fetch_assoc($sql)) {
                        echo '
                        <tr>
                            <td>' . $data['id'] . '</td>
                            <td>' . $data['nama_rute'] . '</td>
                            <td>' . $data['waktu_keberangkatan'] . '</td>
                            <td>' . $data['tujuan'] . '</td>
                            <td>' . $data['keterangan'] . '</td>
                            ';
                        if ($_SESSION['username'] == 'admin') {
                            echo '
                            <td>
                                <a href="edit.php?id=' . $data['id'] . '" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=' . $data['id'] . '" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus?\')">Delete</a>
                            </td>
                            ';
                        }
                        echo '
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    <?php
    } else {
        // Jika belum login, tampilkan tombol login
        ?>
        <div class="container mt-4">
            <a href="jadwal_bus.php" class="btn btn-primary">Login</a>
        </div>
    <?php
    }
    ?>
</body>
</html>