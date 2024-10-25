<?php
include('connection.php');

if (isset($_GET['id'])) {
  
    $id_buku = $_GET['id'];

    
    $query_delete = mysqli_query($con, "DELETE FROM buku WHERE id_buku = '$id_buku'");

    if ($query_delete) {
       
        echo "<script>alert('Data buku berhasil dihapus');</script>";
        
        echo "<script>window.location.href = 'Koleksi.php';</script>";
    } else {
        
        echo "<script>alert('Gagal menghapus data buku');</script>";
       
        echo "<script>window.location.href = 'Koleksi.php';</script>";
    }
} else {
    
    echo "<script>window.location.href = 'Koleksi.php';</script>";
}
?>
