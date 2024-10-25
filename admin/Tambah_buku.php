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
    <title>Tambah Data Buku</title>
    <link rel="stylesheet" href="../css_admin/Tambah_buku.css" />
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
            <a href="Koleksi.php">
              <img
                class="back"
                src="https://i.postimg.cc/NfHjqPHW/Tambahkan-judul-12.png"
                alt="back"
              />
            </a>
          </div>
          <p>Tambah Buku</p>
          <div class="sign">
            <div class="navform">
                <p class="hform">Form Buku</p>
            </div>
            <form action="simpanbuku.php" method="POST" enctype="multipart/form-data" >
                <div class="form-row">
                  <label for="judul" >Judul Buku</label>
                  <input type="text" id="judul" name="judul" required />
                  <label for="pengarang">Pengarang</label>
                  <input type="text" id="pengarang" name="pengarang" required />
                  <label for="penerbit">Penerbit</label>
                  <input type="text" id="penerbit" name="penerbit" required />
                  <label for="sinopsis">Sinopsis</label>
                  <input type="text" id="sinopsis" name="sinopsis" required />
                  <label for="kategori">Kategori</label>
                  <select id="kategori" name="kategori">
                    <option value="Fiksi">Fiksi</option>
                    <option value="Non-Fiksi">Non-Fiksi</option>
                    <option value="Referensi">Referensi</option>
                    <option value="Anak-Anak">Anak-Anak</option>
                    <option value="Remaja">Remaja</option>
                    <option value="Majalah">Majalah</option>
                    <option value="Komik dan Grafis">Komik dan Grafis</option>
                    <option value="Agama dan Spiritualitas">Agama dan Spiritualitas</option>
                    <option value="Sains dan Matematika">Sains dan Matematika</option>
                    <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
                  </select>
                  
                  <label for="buku">Pilih File Buku</label>
                <input type="file" id="buku" name="buku"/>
                <div class="profil">
                    <div class="navprofil">
                      <p class="hform">Cover</p>
                    </div>
                    <div class="format">
                        <p class="hformat">Format .png .jpg .jpeg</p>
                      </div>
                      <div>
                        <img
                          class="foto"
                          src="https://i.postimg.cc/8c7G9qNJ/Tambahkan-judul-16-1.png"
                        />
                      </div>
                      <input type="file" id="cover" name="cover"  />
                </div>
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