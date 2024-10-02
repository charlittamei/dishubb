<?php
session_start();


$users = array(
    'admin' => array(
        'username' => 'admin',
        'password' => 'admin123' 
    ),
    'user' => array(
        'username' => 'user',
        'password' => 'user123'
    )
);


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    if (isset($users[$username]) && $users[$username]['password'] == $password) {
        $_SESSION['logged_in'] = true; 
        $_SESSION['username'] = $username; 
        header('Location: jadwal_bus.php');
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #003366; /* Warna biru tua */
            overflow: hidden; /* Menghindari scrollbar */
            position: relative;
        }
        .login-container {
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10; /* Pastikan form di atas balon */
        }
        .welcome-text {
            margin-bottom: 20px;
        }
        .footer-text {
            font-size: 0.8em;
            color: gray;
        }
        .balloon {
            position: absolute;
            bottom: -150px;
            width: 50px;
            height: 70px;
            background-color: rgba(255, 255, 255, 0.7); /* Warna putih dengan transparansi */
            border-radius: 25px;
            animation: rise 10s linear infinite;
        }
        @keyframes rise {
            0% { transform: translateY(0); }
            100% { transform: translateY(-100vh); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="welcome-text">Selamat datang di website jadwal transportasi bus Garut</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <p class="footer-text">Created by Charlitta</p>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function createBalloon() {
            const balloon = document.createElement('div');
            balloon.className = 'balloon';
            balloon.style.left = Math.random() * 100 + 'vw'; 
            balloon.style.animationDuration = (Math.random() * 5 + 5) + 's'; 
            document.body.appendChild(balloon);

            
            balloon.addEventListener('animationend', () => {
                balloon.remove();
            });
        }

        setInterval(createBalloon, 1500); 
    </script>
</body>
</html>
