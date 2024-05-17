<?php
// Sambungkan ke database
include('koneksi.php');

// Tangkap data yang dikirimkan melalui form
$nama_makanan = $_POST['nama_makanan'];
$tingkat_kesulitan = $_POST['tingkat_kesulitan'];
$bahan_baku = $_POST['bahan_baku'];
$gambar = $_POST['gambar'];
$deskripsi = $_POST['deskripsi'];
$jenis_makanan = $_POST['jenis_makanan'];

// Query untuk menyimpan data ke dalam database
$query = "INSERT INTO makanan (nama_makanan, tingkat_kesulitan, bahan_baku, gambar, deskripsi, jenis_makanan) VALUES ('$nama_makanan', '$tingkat_kesulitan', '$bahan_baku', '$gambar', '$deskripsi', '$jenis_makanan')";

// Eksekusi query
if(mysqli_query($conn, $query)) {
    // Jika berhasil disimpan, kembalikan ke halaman utama dengan pesan sukses
    header('Location: index.php?status=sukses');
} else {
    // Jika gagal disimpan, kembalikan ke halaman utama dengan pesan error
    header('Location: index.php?status=gagal');
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
