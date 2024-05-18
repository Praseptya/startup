<?php
include('koneksi.php');

$gambar = $_POST['gambar'];
$nama_makanan = $_POST['nama_makanan'];
$deskripsi = $_POST['deskripsi'];
$bahan_baku = $_POST['bahan_baku'];
$jenis = $_POST['jenis'];
$tingkat_kesulitan = $_POST['tingkat_kesulitan'];

$query = "INSERT INTO makanan (gambar, nama_makanan, deskripsi, bahan_baku, jenis, tingkat_kesulitan) VALUES ('$gambar', '$nama_makanan', '$deskripsi', '$bahan_baku', '$jenis', '$tingkat_kesulitan')";

if(mysqli_query($conn, $query)) {
    header('Location: index.php?status=sukses');
} else {
    header('Location: index.php?status=gagal');
}

mysqli_close($conn);
?>
