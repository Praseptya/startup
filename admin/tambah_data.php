<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Makanan</title>
    <!-- Load Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Tambah Data Makanan</h2>
        <form method="post" action="tambah.php">
            <div class="mb-3">
                <label for="gambar" class="form-label">Link Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" required>
            </div>
            <div class="mb-3">
                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="bahan_baku" class="form-label">Bahan Baku</label>
                <input type="text" class="form-control" id="bahan_baku" name="bahan_baku" required>
            </div>
            <div class="mb-3">
                <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                <select class="form-select" id="id_jenis" name="jenis" required>
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
            <div class="mb-3">
                <label for="tingkat_kesulitan" class="form-label">Tingkat Kesulitan</label>
                <select class="form-select" id="id_kesulitan" name="tingkat_kesulitan" required>
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
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</body>

</html>
