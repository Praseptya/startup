<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Makanan</title>
    <!-- Load Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Data Makanan</h3>
                    </div>
                    <div class="card-body">
                        <?php 
                        // Sambungkan ke database
                        include('koneksi.php');

                        // Periksa apakah kunci 'edit' ada di dalam $_POST
                        if(isset($_POST['edit'])) {
                            // Ambil ID makanan yang akan diedit
                            $id = $_POST['edit'];
                            // Ambil data makanan dari database berdasarkan ID
                            $query_edit = mysqli_query($conn, "SELECT * FROM makanan WHERE id='$id'");
                            $data = mysqli_fetch_array($query_edit);
                        ?>
                        <form method="post" action="">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Link Gambar</label>
                                <input type="text" name="gambar" value="<?php echo $data['gambar']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                                <input type="text" name="nama_makanan" value="<?php echo $data['nama_makanan']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" required><?php echo $data['deskripsi']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="bahan_baku" class="form-label">Bahan Baku</label>
                                <input type="text" name="bahan_baku" value="<?php echo $data['bahan_baku']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Makanan</label>
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
                            <div class="mb-3">
                                <button type="submit" name="apply" class="btn btn-success">Apply</button>
                            </div>
                        </form>
                        <?php 
                        }
                        // Proses perubahan data jika tombol Apply ditekan
                        if(isset($_POST['apply'])) {
                            $gambar = $_POST['gambar'];
                            $id = $_POST['id'];
                            $nama_makanan = $_POST['nama_makanan'];
                            $deskripsi = $_POST['deskripsi'];
                            $bahan_baku = $_POST['bahan_baku'];
                            $jenis = $_POST['jenis'];
                            $tingkat_kesulitan = $_POST['tingkat_kesulitan'];
                            
                            // Update data makanan ke database
                            mysqli_query($conn, "UPDATE makanan SET nama_makanan='$nama_makanan', tingkat_kesulitan='$tingkat_kesulitan', bahan_baku='$bahan_baku', gambar='$gambar', deskripsi='$deskripsi', jenis='$jenis' WHERE id='$id'");
                            // Redirect kembali ke index.php setelah perubahan data
                            header("Location: index.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
