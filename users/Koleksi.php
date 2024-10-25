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
    <title>Koleksi</title>
    <link rel="stylesheet" href="Koleksi.css" />
    <link rel="stylesheet" href="../css_users/Sidebar.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.css" />
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
          <li>
            <a href="Dashboard.php">
              <i class="fa-solid fa-house"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="Koleksi.php">
              <i class="fa-solid fa-book"></i>
              <span class="link-name">Koleksi</span>
            </a>
          </li>
          <li><a href="Peminjaman.php">
              <i class="fa-solid fa-hand-holding-hand"></i>
              <span class="link-name">Peminjaman</span>
            </a></li>
          <li>
            <a href="Profil.php">
              <i class="fa-solid fa-user"></i>
              <span class="link-name">Profil</span>
            </a>
          </li>
          
        </ul>

        <ul class="logout-mod">
          <li>
            <a href="../logout.php">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span class="link-name">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="dashboard">
      <div class="top">
        <i class="fa-solid fa-bars sidebar-toggle"></i>
        <img
          class="profile"
          src="https://i.postimg.cc/qBKgWjyP/Desain-tanpa-judul-6.png"
          alt=""
        />
        <span class="text">Anggota</span>
      </div>

      <form action="" method="post">
        <div class="box-search">
          <div class="searchBox">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input
              type="text"
              name="keyword"
              placeholder="Cari berdasarkan, judul, penulis, penerbit..."
              id="keyword"
            />
          </div>
        </div>
      </form>

      <div class="koleksi">
        <div class="wrapperbox" id="book-container">
        
        </div>
        
      </div>
      
    </section>
    
<script src="../Script/koleksi.js"></script>
  </body>
</html>
