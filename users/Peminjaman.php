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
    <title>Peminjaman</title>
    <link rel="stylesheet" href="../css_users/Peminjaman.css" />
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
        <p>Peminjaman Buku</p>
        
        <?php
      include('connection.php');
      $id_anggota = $_SESSION["login"];
      $query = "SELECT * FROM pinjaman WHERE id_anggota = '$id_anggota'";
      $result = mysqli_query($con, $query);

      // Menampilkan data peminjaman
      while ($row = mysqli_fetch_assoc($result)) {
        $idBuku = $row['id_buku'];

        // Mengambil data buku berdasarkan id_buku
        $queryBuku = "SELECT * FROM buku WHERE id_buku = '$idBuku'";
        $resultBuku = mysqli_query($con, $queryBuku);
        $rowBuku = mysqli_fetch_assoc($resultBuku);

        echo '<div class="pinjam">';
        echo '<img class="cover" src="../cover/'.$rowBuku['cover'].'" alt="">';
        echo '<table>';
        echo '<tr><th>Judul</th><td>'.$rowBuku['judul_buku'].'</td></tr>';
        echo '<tr><th>Pengarang</th><td>'.$rowBuku['pengarang'].'</td></tr>';
        echo '<tr><th>Penerbit</th><td>'.$rowBuku['penerbit'].'</td></tr>';
        echo '<tr><th>Tanggal Peminjaman</th><td>'.$row['tanggal_peminjaman'].'</td></tr>';
        echo '<tr><th>Tanggal Pengembalian</th><td>'.$row['tanggal_pengembalian'].'</td></tr>';
        echo '</table>';
        echo '</div>';
      }

      // Menutup koneksi ke basis data
      mysqli_close($con);
    ?>

      </section>

      <script src="../Script/script.js"></script>
</body>
</html>