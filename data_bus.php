<!DOCTYPE html>
<html>
<head>
    <title>Data Bus - E-DISHUB GARUT</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #001f3f; /* Dark blue background */
            color: #ffffff; /* White text color for better contrast */
        }
        .navbar {
            background-color: #001f3f; /* Dark blue for navbar */
        }
        .navbar a {
            color: #ffffff; /* White text for navbar links */
        }
        .table {
            background-color: #00274d; /* Slightly lighter blue for table */
            color: #ffffff; /* White text for table */
        }
        .table th, .table td {
            border: 1px solid #004080; /* Darker blue border */
        }
        .btn-custom {
            background-color: #ff4136; /* Custom button color */
            color: #ffffff; /* White text for button */
        }
        .btn-custom:hover {
            background-color: #ff6347; /* Lighter shade on hover */
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        include('koneksi.php'); 
        ?>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">E-DISHUB GARUT</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="jadwal_bus.php">Home</a>
                        </li>
                         <?php if ($_SESSION['username'] == 'admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="tambah_bus.php">Tambah Data</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="data_bus.php">Bus</a> 
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h2>Data Bus</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Bus</th>
                        <th>Nama Bus</th>
                        <th>Tipe Bus</th>
                        <th>Kapasitas</th>
                        <th>Nomor Plat</th>
                        <?php if ($_SESSION['username'] == 'admin') { ?>
                            <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM bus");
                    while ($data = mysqli_fetch_assoc($sql)) {
                        echo '
                        <tr>
                            <td>' . $data['id_bus'] . '</td>
                            <td>' . $data['nama_bus'] . '</td>
                            <td>' . $data['tipe_bus'] . '</td>
                            <td>' . $data['kapasitas'] . '</td>
                            <td>' . $data['nomor_plat'] . '</td>';
                        if ($_SESSION['username'] == 'admin') {
                            echo '<td>
                                    <a href="edit_bus.php?id=' . $data['id_bus'] . '" class="btn btn-custom">Edit</a>
                                    <a href="delete_bus.php?id=' . $data['id_bus'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this bus?\');">Delete</a>
                                  </td>';
                        }
                        echo '</tr>';
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
            <a href="login.php" class="btn btn-custom">Login</a>
        </div>
    <?php
    }
    ?>
</body>
</html>
