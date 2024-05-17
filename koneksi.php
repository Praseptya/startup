<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "data_situs_review_makanana";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>