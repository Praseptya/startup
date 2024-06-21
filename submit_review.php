<?php
include("koneksi.php");

$id = $_POST['id'];
$user = $_POST['user'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

// Query untuk menyimpan ulasan ke dalam database
$query = "INSERT INTO ulasan (id, user, rating, comment) VALUES ('$id', '$user', '$rating', '$comment')";
if (mysqli_query($conn, $query)) {
    echo "Ulasan berhasil ditambahkan!";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Redirect kembali ke halaman detail makanan
header("Location: detail_makanan.php?id=$id");
?>
