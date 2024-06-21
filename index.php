<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Palooza</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <h1><i>IIFOOD PALOOZA</i></h1>
        <a href="admin/login.php" id="adminPanelLink" class="admin-panel">Panel Admin</a>
    </header>

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search the food!....">
        <select id="ratingFilter">
            <option value="all">Rating</option>
            <?php
            for ($i = 1; $i <= 5; $i++) {
                echo '<option value="' . $i . '">' . str_repeat('⭐', $i) . '</option>';
            }
            ?>
        </select>
        <select id="alphabetFilter">
            <option value="all">Alphabet</option>
            <?php
            for ($i = 65; $i <= 90; $i++) {
                $letter = chr($i);
                echo '<option value="' . $letter . '">' . $letter . '</option>';
            }
            ?>
        </select>
        <select id="jenisFilter">
            <option value="all">Jenis</option>
            <option value="Makanan Utama">Makanan Utama</option>
            <option value="Makanan Ringan">Makanan Ringan</option>
        </select>
        <select id="kesulitanFilter">
            <option value="all">Tingkat</option>
            <option value="Mudah">Mudah</option>
            <option value="Sederhana">Sederhana</option>
            <option value="Sulit">Sulit</option>
        </select>
        <select id="combinedFilter">
            <option value="all">Filter</option>
            <optgroup label="Rating">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo '<option value="rating_' . $i . '">' . str_repeat('⭐', $i) . '</option>';
                }
                ?>
            </optgroup>
            <optgroup label="Alphabet">
                <?php
                for ($i = 65; $i <= 90; $i++) {
                    $letter = chr($i);
                    echo '<option value="alphabet_' . $letter . '">' . $letter . '</option>';
                }
                ?>
            </optgroup>
            <optgroup label="Jenis">
                <option value="jenis_Makanan Utama">Makanan Utama</option>
                <option value="jenis_Makanan Ringan">Makanan Ringan</option>
            </optgroup>
            <optgroup label="Tingkat Kesulitan">
                <option value="tingkat_Mudah">Mudah</option>
                <option value="tingkat_Sederhana">Sederhana</option>
                <option value="tingkat_Sulit">Sulit</option>
            </optgroup>
        </select>
    </div>

    <div class="food-list">
        <?php
        include("koneksi.php");

        // Query untuk mengambil data makanan beserta rata-rata rating
        $query = "SELECT m.id, m.nama_makanan, m.gambar, m.jenis, m.tingkat_kesulitan, COALESCE(AVG(u.rating), 0) AS avg_rating
                  FROM makanan AS m
                  LEFT JOIN tabel_ulasan AS u ON m.id = u.id
                  GROUP BY m.id";
        $result = mysqli_query($conn, $query);

        // Loop untuk menampilkan data makanan dalam bentuk card
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="detail_makanan.php?id=' . $row['id'] . '" class="food-item" data-rating="' . round($row['avg_rating']) . '" data-jenis="' . $row['jenis'] . '" data-kesulitan="' . $row['tingkat_kesulitan'] . '">';
            echo '<div class="food-image-container"><img src="' . $row['gambar'] . '" alt="' . $row['nama_makanan'] . '"></div>';
            echo '<div class="details">';
            echo '<p>' . $row['nama_makanan'] . '</p>';
            // Tampilkan rata-rata rating
            echo '<div class="rating">';
            for ($i = 0; $i < $row['avg_rating']; $i++) {
                echo '⭐';
            }
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
        ?>
    </div>

    <footer id="footer">
        <img src="logo.png" alt="logo">
    </footer>

    <script src="script.js"></script>

</body>

</html>
