<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    // Hash the new password
    $password_hash = password_hash($new_password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES ('$new_username', '$password_hash')";
    if (mysqli_query($conn, $query)) {
        echo "Admin baru berhasil ditambahkan"; 
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
