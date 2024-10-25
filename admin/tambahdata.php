<?php
$servername = "localhost";
$database = "perpusweb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}

if (isset($_POST['Simpan'])) {
    
    $id_anggota = $_POST["id_anggota"];
    $id_buku = $_POST["id_buku"];
    $tanggal_peminjaman = $_POST["tanggal_peminjaman"];
    $tanggal_pengembalian = $_POST["tanggal_pengembalian"];


    $query_sql = "INSERT INTO pinjaman (id_anggota, id_buku, tanggal_peminjaman, tanggal_pengembalian)
              VALUES ('$id_anggota','$id_buku','$tanggal_peminjaman','$tanggal_pengembalian')";

    if (mysqli_query($conn, $query_sql)) {
        echo '<script>alert("Tambah Data Peminjaman berhasil");</script>';
        header("Location: Peminjaman.php");
        exit();
    } else {
        echo "Tambah Buku Gagal : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
