<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Makanan</title>
    <link rel="stylesheet" href="css/edit_style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Edit Data Makanan</h2>
            <a href="index.php" class="back-button">Kembali</a>
        </div>
        <?php
        include('koneksi.php');

        if (isset($_POST['edit'])) {
            $id = $_POST['edit'];
            $query_edit = mysqli_query($conn, "SELECT * FROM makanan WHERE id='$id'");
            $data = mysqli_fetch_array($query_edit);
        ?>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <label for="gambar">Link Gambar</label>
                <input type="text" name="gambar" value="<?php echo $data['gambar']; ?>" required>
                <label for="nama_makanan">Nama Makanan</label>
                <input type="text" name="nama_makanan" value="<?php echo $data['nama_makanan']; ?>" required>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
                <label for="bahan_baku">Bahan Baku</label>
                <input type="text" name="bahan_baku" value="<?php echo $data['bahan_baku']; ?>" required>
                <label for="jenis">Jenis Makanan</label>
                <select name="jenis" required>
                    <option value="<?php echo $data['jenis']; ?>" selected><?php echo $data['jenis']; ?></option>
                    <?php
                    $query = "SELECT jenis FROM jenis_makanan";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['jenis'] . "'>" . $row['jenis'] . "</option>";
                    }
                    ?>
                </select>
                <label for="tingkat_kesulitan">Tingkat Kesulitan</label>
                <select name="tingkat_kesulitan" required>
                    <option value="<?php echo $data['tingkat_kesulitan']; ?>" selected><?php echo $data['tingkat_kesulitan']; ?></option>
                    <?php
                    $query = "SELECT tingkat_kesulitan FROM kesulitan";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['tingkat_kesulitan'] . "'>" . $row['tingkat_kesulitan'] . "</option>";
                    }
                    ?>
                </select>
                <div class="button-group">
                    <button type="submit" name="apply">Apply</button>
                </div>
            </form>
        <?php
        }

        if (isset($_POST['apply'])) {
            $id = $_POST['id'];
            $gambar = $_POST['gambar'];
            $nama_makanan = $_POST['nama_makanan'];
            $deskripsi = $_POST['deskripsi'];
            $bahan_baku = $_POST['bahan_baku'];
            $jenis = $_POST['jenis'];
            $tingkat_kesulitan = $_POST['tingkat_kesulitan'];

            $query_update = "UPDATE makanan SET nama_makanan='$nama_makanan', tingkat_kesulitan='$tingkat_kesulitan', bahan_baku='$bahan_baku', gambar='$gambar', deskripsi='$deskripsi', jenis='$jenis' WHERE id='$id'";
            
            if (mysqli_query($conn, $query_update)) {
                header("Location: index.php");
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>

</html>
