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

if (isset($_POST['Daftar'])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $gender = $_POST["gender"];
    $tempat = $_POST["tempat"];
    $tanggal = $_POST["birthdate"];
    $agama = $_POST["agama"];
    $pendidikan = $_POST["pendidikan"];
    $pekerjaan = $_POST["pekerjaan"];
    $kategori = $_POST["kategori"];
    $email = $_POST["email"];
    $telpon = $_POST["nomor_telepon"];
    $profil = $_FILES["profil"]["name"];
    $password = $_POST["password"];

    $targetFolder = "../file/";
    $targetProfil = $targetFolder . basename($_FILES["profil"]["name"]);

    move_uploaded_file($_FILES["profil"]["tmp_name"], $targetProfil);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query_sql = "INSERT INTO anggota (nama_lengkap, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, pendidikan_terakhir, pekerjaan, kategori, email, no_telepon, foto_profil, password)
              VALUES ('$nama','$alamat','$gender','$tempat','$tanggal','$agama','$pendidikan','$pekerjaan','$kategori','$email','$telpon','$profil','$hashedPassword')";

    if (mysqli_query($conn, $query_sql)) {
        echo '<script>alert("Pendaftaran berhasil");</script>';
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
