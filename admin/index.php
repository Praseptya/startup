<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="gambar/favicon.png" type="image/x-icon">
</head>

<body>  
    <div class="container">
        <div class="header">
            <div class="logo">
                <h1><i>IIFOOD PALOOZA</i></h1>
            </div>
            <div class="index-buttons">
                <a href="tambah_data.php" class="index-button">Tambah Data</a>
                <?php if (!isset($_SESSION['loggedin'])): ?>
                    <a href="../index.php" class="index-button disabled" onclick="return false;">Main Menu</a>
                <?php else: ?>
                    <a href="../index.php" class="index-button">Main Menu</a>
                <?php endif; ?>
                <a href="logout.php" class="index-button">Logout</a>
            </div> 
        </div>
        <div class="content">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>GAMBAR</th>
                            <th>NAMA MAKANAN</th>
                            <th>DESKRIPSI</th>
                            <th>BAHAN BAKU</th>
                            <th>JENIS MAKANAN</th>
                            <th>TINGKAT KESULITAN</th>
                            <th colspan="2">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include('koneksi.php');
                        $query = mysqli_query($conn, "SELECT * FROM makanan");
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar" title="<?php echo $row['gambar']; ?>"> </td>
                            <td><?php echo $row['nama_makanan']; ?></td>
                            <td><?php echo $row['deskripsi']; ?></td>
                            <td><?php echo $row['bahan_baku']; ?></td>
                            <td><?php echo $row['jenis']; ?></td>
                            <td><?php echo $row['tingkat_kesulitan']; ?></td>
                            <td>
                                <form method="post" action="edit_data.php">
                                    <input type="hidden" name="edit" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="delete_id" value="<?php include('hapus_data.php'); echo $row['id'];  ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
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
</body>

</html>
