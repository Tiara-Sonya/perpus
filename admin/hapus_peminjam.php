<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];

    $query_delete = mysqli_query($con, "DELETE FROM pinjaman WHERE id_peminjaman = '$id_peminjaman'");

    if ($query_delete) {
        echo "<script>alert('Data Peminjaman berhasil dihapus');</script>";
        echo "<script>window.location.href = 'Peminjaman.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data Peminjaman');</script>";
        echo "<script>window.location.href = 'Peminjaman.php';</script>";
    }
} else {
    echo "<script>window.location.href = 'Peminjaman.php';</script>";
}
?>
