<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // Sambungkan ke database
    include("koneksi.php");

    // Ambil id makanan dari parameter URL
    $id = $_GET['id'];

    // Query untuk mengambil data makanan berdasarkan id
    $query_makanan = "SELECT * FROM makanan WHERE id = $id";
    $result_makanan = mysqli_query($conn, $query_makanan);
    $row_makanan = mysqli_fetch_assoc($result_makanan);

    // Query untuk mengambil ulasan makanan berdasarkan id makanan
    $query_ulasan = "SELECT user, rating, comment FROM tabel_ulasan WHERE id = $id";
    $result_ulasan = mysqli_query($conn, $query_ulasan);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row_makanan['nama_makanan']; ?></title>
    <link rel="stylesheet" href="detail_style.css">
</head>

<body>
    <!-- Judul makanan -->
    <h2 class="food-title"><?php echo $row_makanan['nama_makanan']; ?></h2>
    <!-- Gambar makanan -->
    <img class="food-image" src="<?php echo $row_makanan['gambar']; ?>" alt="<?php echo $row_makanan['nama_makanan']; ?>">
    <!-- Informasi makanan -->
    <div class="description">
        <h3>Deskripsi:</h3>
        <p><?php echo $row_makanan['deskripsi']; ?></p><br>
        <h3>Jenis Makanan:</h3> 
        <p><?php echo $row_makanan['jenis']; ?></p><br>
        <h3>Tingkat Kesulitan dalam membuatan:</h3> 
        <p><?php echo $row_makanan['tingkat_kesulitan']; ?></p><br>
        <h3>Bahan Baku:</h3> 
        <p><?php echo $row_makanan['bahan_baku']; ?></p>
    </div>

    <!-- Tabel ulasan makanan -->
    <h3 class="reviews-heading">Ulasan:</h3>
    <table class="reviews-table">
        <tr>
            <th>User</th>
            <th>Rating</th>
            <th>Comment</th>
        </tr>
        <?php
        // Loop untuk menampilkan ulasan makanan dalam tabel
        while ($row_ulasan = mysqli_fetch_assoc($result_ulasan)) {
            echo "<tr>";
            echo "<td>" . $row_ulasan['user'] . "</td>";
            echo "<td>" . $row_ulasan['rating'] . "</td>";
            echo "<td>" . $row_ulasan['comment'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
