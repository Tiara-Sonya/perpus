<?php
include('connection.php');

session_start();

if( !isset($_SESSION["login"])){
  header("Location: ../index.php");
  exit;
}

$id_buku = $_GET['id'];


$query = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
$row = mysqli_fetch_assoc($query);

$pdf_path = $row['file_buku'];
$judul_buku = $row['judul_buku'];
$pengarang = $row['pengarang'];
$penerbit = $row['penerbit'];
$kategori = $row['kategori'];
$sinopsis = $row['sinopsis'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mode Baca</title>
  <link rel="stylesheet" href="../css_users/Baca.css" />
  <link rel="stylesheet" href="../css_users/Sidebar.css" />



  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <link rel="icon" href="https://i.postimg.cc/7Zyt2Qmy/ikon.png" type="image/png" />
</head>

<body>
  <nav>
    <div class="logo">
      <img class="logo_image1" src="https://i.postimg.cc/NGb0kHwz/logo2.png" alt="logo" />
      <img class="logo_image2" src="https://i.postimg.cc/C1XbGZcJ/logo2.png" alt="logo" />
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
        <li><a href="Profil.php">
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
    <div class="pdf-viewer">
      <h3>Koleksi</h3>
      <a href="Koleksi.php">
        <i class="fa-solid fa-xmark"></i>
      </a>
    </div>
    <div class="tutup"></div>
    <div class="pdf-container">
      <embed class="pdf-container" src="../buku/<?php echo $pdf_path; ?>" type="application/pdf" disabledownload />
    </div>
    <div class="deskripsi">
      <h4><?php echo $judul_buku; ?></h4>
      <table>
        <tr>
          <th>Pengarang</th>
          <td><?php echo $pengarang; ?></td>
        </tr>
        <tr>
          <th>Penerbit</th>
          <td><?php echo $penerbit; ?></td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td><?php echo $kategori; ?></td>
        </tr>
        <tr>
          <th>Sinopsis</th>
          <td><?php echo $sinopsis; ?></td>
        </tr>
      </table>
    </div>
    <script src="../Script/script.js"></script>
</body>

</html>