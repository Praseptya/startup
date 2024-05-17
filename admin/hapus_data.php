<?php
include('koneksi.php');

if(isset($_POST['delete'])) {
    // Tangkap ID yang akan dihapus
    $id_to_delete = $_POST['delete_id'];
    
    // Query untuk menghapus data
    $query = "DELETE FROM makanan WHERE id = $id_to_delete";
    
    // Eksekusi query
    if(mysqli_query($conn, $query)) {
        // Jika berhasil dihapus, kembalikan ke halaman utama dengan pesan sukses
        header('Location: index.php?status=deleted');
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else {
        // Jika gagal dihapus, kembalikan ke halaman utama dengan pesan error
        header('Location: index.php?status=delete_failed');
        exit();
    }
}

mysqli_close($conn);
?>
