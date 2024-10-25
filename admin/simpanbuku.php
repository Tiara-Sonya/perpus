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
    
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $sinopsis = $_POST["sinopsis"];
    $kategori = $_POST["kategori"];
    $buku = $_FILES["buku"]["name"];
    $cover = $_FILES["cover"]["name"];
    

    $targetFolder1 = "../buku/";
    $targetFolder2 = "../cover/";

    $targetBuku = $targetFolder1 . basename($_FILES["buku"]["name"]);
    $targetCover = $targetFolder2 . basename($_FILES["cover"]["name"]);

    move_uploaded_file($_FILES["buku"]["tmp_name"], $targetBuku);
    move_uploaded_file($_FILES["cover"]["tmp_name"], $targetCover);

    $query_sql = "INSERT INTO buku (judul_buku, pengarang, penerbit, kategori, sinopsis, file_buku, cover)
              VALUES ('$judul','$pengarang','$penerbit','$kategori','$sinopsis','$buku','$cover')";

    if (mysqli_query($conn, $query_sql)) {
        echo '<script>alert("Tambah Buku berhasil");</script>';
        header("Location: koleksi.php");
        exit();
    } else {
        echo "Tambah Buku Gagal : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
