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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Judul makanan -->
    <h2 style="text-align: center;"><?php echo $row_makanan['nama_makanan']; ?></h2>
    <!-- Gambar makanan -->
    <img style="max-width: 200px;" src="<?php echo $row_makanan['gambar']; ?>" alt="<?php echo $row_makanan['nama_makanan']; ?>">
    <!-- Informasi makanan -->
    <p><strong>Tingkat Kesulitan:</strong> <?php echo $row_makanan['tingkat_kesulitan']; ?></p>
    <p><strong>Bahan Baku:</strong> <?php echo $row_makanan['bahan_baku']; ?></p>
    <p><strong>Deskripsi:</strong> <?php echo $row_makanan['deskripsi']; ?></p>
    <p><strong>Jenis Makanan:</strong> <?php echo $row_makanan['jenis_makanan']; ?></p>

    <!-- Tabel ulasan makanan -->
    <h3>Ulasan:</h3>
    <table>
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
