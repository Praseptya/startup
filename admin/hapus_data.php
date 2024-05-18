<?php
include('koneksi.php');

if(isset($_POST['delete'])) {
    $id_to_delete = $_POST['delete_id'];
    
    $query = "DELETE FROM makanan WHERE id = $id_to_delete";
    
    if(mysqli_query($conn, $query)) {
        header('Location: index.php?status=deleted');
        exit();
    } else {
        header('Location: index.php?status=delete_failed');
        exit();
    }
}

mysqli_close($conn);
?>
