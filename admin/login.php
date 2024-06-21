<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Palooza</title>
    <link rel="stylesheet" href="css/login_styles.css">
</head>

<body>
    <div class="container">
        <h1><i>IIFOOD PALOOZA</i></h1>
        <div class="login-box">
            <form action="login.php" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <?php
                include('koneksi.php');

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM users WHERE username='$username'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        if (password_verify($password, $row['password'])) {
                            header("Location: index.php");
                            exit();
                        } else {
                            echo "<p class='error'>Username atau password salah</p>";
                        }
                    } else {
                        echo "<p class='error'>Username atau password salah</p>";
                    }
                }

                mysqli_close($conn);
                ?>
                <button type="submit" class="login-button"><b>L O G I N</b></button>
            </form>
            <a href="../index.php" class="back-button">Kembali ke Halaman Utama</a>
            <button id="addAdminButton" class="add-admin-button">Tambah Admin</button>
        </div>
        <div class="footer">
            <a href="#"><img src="gambar/logo1.png" alt="Logo" title="Logo"></a>
        </div>
    </div>

    <div id="addAdminFormContainer" class="add-admin-form-container" style="display: none;">
        <div class="add-admin-form">
            <form id="addAdminForm" action="add_admin.php" method="post">
                <div class="input-group">
                    <label for="new_username">Username Baru</label>
                    <input type="text" id="new_username" name="new_username" placeholder="Masukkan username baru" required>
                </div>
                <div class="input-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Masukkan password baru" required>
                </div>
                <button type="submit" class="add-button"><b>Tambah Admin</b></button>
            </form>
            <button id="closeFormButton" class="close-button">Tutup</button>
        </div>
    </div>

    <script>
        document.getElementById('addAdminButton').addEventListener('click', function() {
            document.getElementById('addAdminFormContainer').style.display = 'block';
        });

        document.getElementById('closeFormButton').addEventListener('click', function() {
            document.getElementById('addAdminFormContainer').style.display = 'none';
        });

        // Handling success message
        <?php if (isset($_GET['message']) && $_GET['message'] == 'success') { ?>
            alert('Admin baru berhasil ditambahkan');
        <?php } ?>
    </script>
</body>
</html>
