<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <style>
        /* Styles untuk header dan judul */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Styles untuk grid container */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        /* Styles untuk card makanan */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>

    <!-- Header dengan judul dan tombol Admin -->
    <div class="header">
        <div class="title">FOOD PALOOZA</div>
        <a href="admin/index.php" class="admin-button">Admin</a>
    </div>

    <!-- Grid container untuk menampilkan kartu makanan -->
    <div class="grid-container">
        <?php
        // Sambungkan ke database
        include("koneksi.php");

        // Query untuk mengambil data makanan beserta rata-rata rating
        $query = "SELECT m.id, m.nama_makanan, m.gambar, COALESCE(AVG(u.rating), 0) AS avg_rating
                  FROM makanan AS m
                  LEFT JOIN tabel_ulasan AS u ON m.id = u.id
                  GROUP BY m.id";
        $result = mysqli_query($conn, $query);

        // Loop untuk menampilkan data makanan dalam bentuk card
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card" onclick="showDetail(' . $row['id'] . ')">';
            echo '<img src="' . $row['gambar'] . '" alt="' . $row['nama_makanan'] . '">';
            echo '<h3>' . $row['nama_makanan'] . '</h3>';
            // Tampilkan rata-rata rating
            echo '<p>Rating: ' . number_format($row['avg_rating'], 1) . '</p>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Script untuk menampilkan detail makanan di halaman baru -->
    <script>
        function showDetail(id) {
            window.open("detail_makanan.php?id=" + id, "_blank");
        }
    </script>

</body>

</html>
