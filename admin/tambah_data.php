<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Makanan</title>
    <link rel="stylesheet" href="css/tambah_styles.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Tambah Data Makanan</h2>
            <a href="index.php" class="back-button">Kembali</a>
        </div>
        <form method="post" action="tambah.php">
            <div class="form-group">
                <label for="gambar">Link Gambar</label>
                <input type="text" id="gambar" name="gambar" required>
            </div>
            <div class="form-group">
                <label for="nama_makanan">Nama Makanan</label>
                <input type="text" id="nama_makanan" name="nama_makanan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="bahan_baku">Bahan Baku</label>
                <input type="text" id="bahan_baku" name="bahan_baku" required>
            </div>
            <div class="form-group">
                <label for="jenis_makanan">Jenis Makanan</label>
                <select id="id_jenis" name="jenis" required>
                    <option value="">Pilih Jenis Makanan</option>
                    <?php
                    include('koneksi.php');
                    $query = "SELECT jenis FROM jenis_makanan";
                    $result = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['jenis'] . "'>" . $row['jenis'] . "</option>";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tingkat_kesulitan">Tingkat Kesulitan</label>
                <select id="id_kesulitan" name="tingkat_kesulitan" required>
                    <option value="">Pilih Tingkat Kesulitan</option>
                    <?php
                    include('koneksi.php');
                    $query = "SELECT tingkat_kesulitan FROM kesulitan";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['tingkat_kesulitan'] . "'>" . $row['tingkat_kesulitan'] . "</option>";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="button-group">
                <button type="submit">Tambah Data</button>
            </div>
        </form>
    </div>
</body>

</html>
