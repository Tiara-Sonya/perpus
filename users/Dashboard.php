<?php
session_start();

if( !isset($_SESSION["login"])){
  header("Location: ../index.php");
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css_users/Dashboard.css" />
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
           
          </ul>

          <ul class="logout-mod">
            <li><a href="../logout.php">
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
        <div class="box">
          <div class="wrapper">
              <img src="https://i.postimg.cc/ydfXxkKL/welcome.png">
              <img src="https://i.postimg.cc/tRwMpC5X/ghghg.png">
              <img src="https://i.postimg.cc/g2SRbrVs/LAYANAN-BEBAS-PINJAMAN-PUSTAKA-ONLINE.jpg">
              <img src="https://i.postimg.cc/ydX8BbqK/About-Us-1.png">
          </div>
        </div>
        <div class="literatur">
          <p class="online">Layanan literatur Online</p>
          <div class="wrapperbox">
              <div class="box1">
                  <img class="logolit1" src="https://i.postimg.cc/7PGLt8yT/katalog.png" >
                  <p id="koleksi1">Katalog Online</p>
              </div>
              <div class="box2">
                  <img class="logolit" src="https://i.postimg.cc/L6j8Rt59/ejurnal.png" >
                  <p id="koleksi">E-Jurnal</p>
              </div>
              <div class="box3">
                <a href="Koleksi.php">
                  <img class="logolit" src="https://i.postimg.cc/ZYG517Ts/ebook.png" >
                  <p id="koleksi">E-Book</p>
                  </a>
              </div>
              <div class="box4">
                  <img class="logolit" src="https://i.postimg.cc/0yx2NzKp/repositori.png" >
                  <p id="koleksi">Repositori</p>
              </div>
          </div>
        </div>
        <div class="copyright">
          <div class="wrapper2">
              &copy; 2023. <b>Senggarang Library</b> All Right Reserved.
          </div>
        </div>

      </section>

      <script src="../Script/script.js"></script>
</body>
</html>