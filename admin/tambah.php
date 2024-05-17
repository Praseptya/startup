<?php
// Sambungkan ke database
include('koneksi.php');

// Tangkap data yang dikirimkan melalui form
$gambar = $_POST['gambar'];
$nama_makanan = $_POST['nama_makanan'];
$deskripsi = $_POST['deskripsi'];
$bahan_baku = $_POST['bahan_baku'];
$jenis = $_POST['jenis'];
$tingkat_kesulitan = $_POST['tingkat_kesulitan'];

// Query untuk menyimpan data ke dalam database
$query = "INSERT INTO makanan (gambar, nama_makanan, deskripsi, bahan_baku, jenis, tingkat_kesulitan) VALUES ('$gambar', '$nama_makanan', '$deskripsi', '$bahan_baku', '$jenis', '$tingkat_kesulitan')";

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
