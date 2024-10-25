<?php
session_start();

if( !isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesan dan Notifikasi</title>
    <link rel="stylesheet" href="../css_users/Pesan.css" />
    <link rel="stylesheet" href="../css_users/Sidebar.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link
      rel="icon"
      href="https://i.postimg.cc/7Zyt2Qmy/ikon.png"
      type="image/png"
    />
  </head>
  <body>
      <nav>
        <div class="logo">
          <img
          class="logo_image1"
          src="https://i.postimg.cc/NGb0kHwz/logo2.png"
          alt="logo"
        />
        <img
          class="logo_image2"
          src="https://i.postimg.cc/C1XbGZcJ/logo2.png"
          alt="logo"
        />
        </div>

        <div class="menu-items">
          <ul class="nav-links">
            <li><a href="Dashboard.php">
              <i class="fa-solid fa-house"></i>
              <span class="link-name">Dashboard</span>
            </a></li>
            <li><a href="Koleksi.php">
              <i class="fa-solid fa-book"></i>
              <span class="link-name">Koleksi</span>
            </a></li>
            <li><a href="Peminjaman.php">
              <i class="fa-solid fa-hand-holding-hand"></i>
              <span class="link-name">Peminjaman</span>
            </a></li>
            <li ><a href="Profil.php" >
            <i class="fa-solid fa-user"></i></i>
              <span class="link-name">Profil</span>
            </a></li>
            <li><a href="Pesan.php">
              <i class="fa-solid fa-envelope"></i>
              <span class="link-name">Pesan dan Notifikasi</span>
            </a></li>
          </ul>

          <ul class="logout-mod">
            <li><a href="../login.php">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span class="link-name">Logout</span>
            </a></li>
          </ul>
        </div>
      </nav>

      <section class="dashboard">
        <div class="top">
          <i class="fa-solid fa-bars sidebar-toggle"></i>
          <img class="profile" src="https://i.postimg.cc/qBKgWjyP/Desain-tanpa-judul-6.png" alt="">
          <span class="text">Anggota</span>
          </div>
        </div>
          <div class="sign">
            <div class="navform">
                <p class="hform">Form Pesan</p>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" >
                <div class="form-row">
                  <label for="judul" >Perihal</label>
                  <input type="text" id="judul" name="judul" required />
                  <label for="pengarang">Nama Pengirim</label>
                  <input type="text" id="pengarang" name="pengarang" required />
                  <label for="penerbit">Pesan</label>
                  <textarea name="pesan" id="pesan" cols="80" rows="10"></textarea>
                 
                <div class="profil">
                    <div class="navprofil">
                      <p class="hform">Notifikasi</p>
                    </div>
                    
                </div>
                <button type="submit" name="Simpan" class="simpan-button" onclick="myFunction()">Kirim</button>
            </form>
          </div>
          <div id="copyright">
            <div class="wrapper2">
                &copy; 2023. <b>Senggarang Library</b> All Right Reserved.
            </div>
          </div>
      </section>
      <script>
          function myFunction() {
              alert("Pesan terkirim");
          }
      </script>

      <script src="../Script/script.js"></script>
</body>
</html>