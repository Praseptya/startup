<!DOCTYPE html>
<html lang="en">

<?php
include("koneksi.php");

$id = $_GET['id'];

// Query untuk mengambil data makanan berdasarkan id
$query_makanan = "SELECT * FROM makanan WHERE id = $id";
$result_makanan = mysqli_query($conn, $query_makanan);
$row_makanan = mysqli_fetch_assoc($result_makanan);

// Query untuk mengambil ulasan makanan berdasarkan id makanan
$query_ulasan = "SELECT user, rating, comment FROM ulasan WHERE id = $id";
$result_ulasan = mysqli_query($conn, $query_ulasan);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row_makanan['nama_makanan']; ?></title>
    <link rel="stylesheet" href="css/detail_styles.css">
</head>

<body>
    <header>
        <h1><i>IIFOOD PALOOZA</i></h1>
        <a href=".." class="back-button">Kembali</a>
    </header>
    <div class="search-bar"></div>
    <h2 class="food-title"><?php echo $row_makanan['nama_makanan']; ?></h2>
    <img class="food-image" src="<?php echo $row_makanan['gambar']; ?>" alt="<?php echo $row_makanan['nama_makanan']; ?>">
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

    <div class="reviews-section">
        <div class="reviews-header">
            <h3 class="reviews-heading">Ulasan:</h3>
            <a href="tambah_ulasan.php?id=<?php echo $id; ?>" class="add-review-button">Tambah Ulasan</a>
        </div>
        <div class="reviews-table-wrapper">
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
        </div>
    </div>

    <footer>
        <img src="logo.png" alt="logo">
    </footer>
</body>

</html>
