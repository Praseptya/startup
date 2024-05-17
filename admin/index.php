<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <!-- Load Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="icon" href="gambar/favicon.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="logo">
                                <img src="gambar/logo.png">
                            </div>
                            <!-- Link ke halaman tambah data -->
                            <a href="tambah_data.php" class="index-button">Tambah Data</a>
                            <!-- Link ke halaman utama -->
                            <a href="../index.php" class="index-button"> Main Menu</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center; vertical-align: middle;">
                                            <th scope="col">ID</th>
                                            <th scope="col">GAMBAR</th>
                                            <th scope="col">NAMA MAKANAN</th>
                                            <th scope="col">DESKRIPSI</th>
                                            <th scope="col">BAHAN BAKU</th>
                                            <th scope="col">JENIS MAKANAN</th>
                                            <th scope="col">TINGKAT KESULITAN</th>
                                            <th scope="col" colspan="2">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // Sambungkan ke database
                                        include('koneksi.php');
                                        // Tampilkan data makanan
                                        $query = mysqli_query($conn, "SELECT * FROM makanan");
                                        while($row = mysqli_fetch_array($query)){
                                        ?>
                                        <tr style="vertical-align: middle;">
                                            <td><?php echo $row['id']; ?></td>
                                            <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar" style="max-width: 100px; max-height: 100px;" title="<?php echo $row['gambar']; ?>"> </td>
                                            <td><?php echo $row['nama_makanan']; ?></td>
                                            <td><?php echo $row['deskripsi']; ?></td>
                                            <td><?php echo $row['bahan_baku']; ?></td>
                                            <td><?php echo $row['jenis']; ?></td>
                                            <td><?php echo $row['tingkat_kesulitan']; ?></td>
                                            <td>
                                                <form method="post" action="edit_data.php">
                                                    <input type="hidden" name="edit" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                                </form>
                                            </td>
                                            <!-- Tambahkan kolom untuk tombol hapus -->
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="delete_id" value="<?php include('hapus_data.php'); echo $row['id'];  ?>">
                                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
