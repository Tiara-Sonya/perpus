<?php
session_start();

$servername = "localhost";
$database = "perpusweb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] === "admin") {
        header("Location: admin/Dashboard.php");
    } else {
        header("Location: users/Dashboard.php");
    }
    exit;
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result_anggota = mysqli_query($conn, "SELECT * FROM anggota WHERE email = '$email'");
    if (mysqli_num_rows($result_anggota) === 1) {
        $row_anggota = mysqli_fetch_assoc($result_anggota);

        if (!password_verify($password, $row_anggota["password"])) {
            $erro = true;
            exit;
        }

        $_SESSION["login"] = $row_anggota["id_anggota"];
        header("Location: users/Dashboard.php");
        exit;
    }

    $result_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$email'");
    if (mysqli_num_rows($result_admin) === 1) {
        $row_admin = mysqli_fetch_assoc($result_admin);

        if (!password_verify($password, $row_admin["password"])) {
            $erro = true;
            exit;
        }

        $_SESSION["login"] = "admin";
        header("Location: admin/Dashboard.php");
        exit;
    }

    $erro = true;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css_users/login.css" />
    <title>Login Senggarang Library</title>
    <link
      rel="icon"
      href="asset/logo3.png"
      type="image/png"
    />
  </head>
  <body>
    <div class="container">
      <div class="background-image"></div>
      <div class="kotak">
        <div class="logo">
          <img class="logo2" src="asset/logo3.png" />
        </div>
        <h1>Masuk Akun</h1>
        <h2>Buat kamu yang sudah terdaftar, silakan masuk ke akunmu.</h2>
        <form action="" method="POST">
          <label for="email">Email:</label>
          <input type="email" id="username" name="email" required />
          <label for="password">Kata Sandi:</label>
          <input type="password" id="password" name="password" required />
          <h3><a href="ForYou.html">Lupa kata sandi?</a></h3>
          <input type="submit" name="login" value="Masuk" />
        </form>
        <h4>
          Belum menjadi anggota?<a href="users/Pendaftaran.php "> Daftar Sekarang</a>
        </h4>
      </div>
    </div>
  </body>
</html>
