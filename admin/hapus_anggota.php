<?php
include('connection.php');

if (isset($_GET['id'])) {
  
    $id_anggota = $_GET['id'];

    
    $query_delete = mysqli_query($con, "DELETE FROM anggota WHERE id_anggota = '$id_anggota'");

    if ($query_delete) {
       
        echo "<script>alert('Data Anggota berhasil dihapus');</script>";
        
        echo "<script>window.location.href = 'Anggota.php';</script>";
    } else {
        
        echo "<script>alert('Gagal menghapus data Anggota');</script>";
       
        echo "<script>window.location.href = 'Anggota.php';</script>";
    }
} else {
    
    echo "<script>window.location.href = 'Anggota.php';</script>";
}
?>
