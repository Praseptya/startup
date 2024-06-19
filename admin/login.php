<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Palooza</title>
    <link rel="stylesheet" href="css/login_style.css">
</head>

<body>
    
    <div class="container">
        <h1><i>IIFOOD PALOOZA</i></h1>
        <div class="login-box">
            <form action="login.php" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password">
                </div>
                <?php
                include('koneksi.php');

                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        header("Location: index.php"); 
                        exit(); 
                    } else {
                        echo "Username atau password salah";
                    }
                }

                mysqli_close($conn);
                ?>

                <button type="submit" class="login-button"><b>L O G I N</b></button>
            </form>
            <a href="../index.php" class="back-button">Kembali ke Halaman Utama</a>
        </div>
        <div class="footer">
            <img src="gambar/logo1.png" alt="Logo" title="Logo">
        </div>
    </div>
</body>


</html>
