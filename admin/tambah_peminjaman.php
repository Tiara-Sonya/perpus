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
    <title>Tambah Data Peminjaman</title>
    <link rel="stylesheet" href="../css_admin/tambah_peminjaman.css" />
    <link rel="stylesheet" href="../css_admin/Sidebar.css" />
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
            <li ><a href="Anggota.php">
              <i class="fa-solid fa-users"></i>
              <span class="link-name">Anggota</span>
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
          <img class="profile" src="https://i.postimg.cc/8k9G18pb/Desain-tanpa-judul-6.png" alt="">
          <span class="text">Admin</span>
          </div>
        </div>
        <div>
            <a href="Peminjaman.php">
              <img
                class="back"
                src="https://i.postimg.cc/NfHjqPHW/Tambahkan-judul-12.png"
                alt="back"
              />
            </a>
          </div>
          <p>Tambah Data Peminjaman</p>
          <div class="sign">
            <div class="navform">
                <p class="hform">Form Peminjaman</p>
            </div>
            <form action="tambahdata.php" method="POST" enctype="multipart/form-data" >
                <div class="form-row">
                  <label for="id_anggota" >ID Anggota</label>
                  <input type="text" id="id_anggota" name="id_anggota" required />
                  <label for="id_buku">ID Buku</label>
                  <input type="text" id="id_buku" name="id_buku" required />
                  <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                  <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" required />
                  <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                  <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" required />
                  
                <button type="submit" name="Simpan" class="simpan-button">Simpan Data</button>
            </form>
          </div>
          <div id="copyright">
            <div class="wrapper2">
                &copy; 2023. <b>Senggarang Library</b> All Right Reserved.
            </div>
          </div>
      </section>

      <script src="../Script/script.js"></script>
</body>
</html>