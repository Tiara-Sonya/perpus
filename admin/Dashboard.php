<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}
include('connection.php');

$queryTotalBuku = "SELECT COUNT(*) as total_buku FROM buku";
$resultTotalBuku = mysqli_query($con, $queryTotalBuku);
$dataTotalBuku = mysqli_fetch_assoc($resultTotalBuku);
$totalBuku = $dataTotalBuku['total_buku'];

$queryTotalAnggota = "SELECT COUNT(*) as total_anggota FROM anggota";
$resultTotalAnggota = mysqli_query($con, $queryTotalAnggota);
$dataTotalAnggota = mysqli_fetch_assoc($resultTotalAnggota);
$totalAnggota = $dataTotalAnggota['total_anggota'];

$queryTotalPeminjaman = "SELECT COUNT(*) as total_peminjaman FROM pinjaman";
$resultTotalPeminjaman = mysqli_query($con, $queryTotalPeminjaman);
$dataTotalPeminjaman = mysqli_fetch_assoc($resultTotalPeminjaman);
$totalPeminjaman = $dataTotalPeminjaman['total_peminjaman'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="Dashboard.css" />
  <link rel="stylesheet" href="../css_admin/Sidebar2.css" />
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/datatables.min.css" rel="stylesheet" />

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
        <li><a href="Anggota.php">
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
    <div class="logobox">
      <img class="logo1" src="https://i.postimg.cc/KYW2hg6k/logo1.png" alt="">
    </div>
    <div class="wrapperbox">
      <div class="box">
        <a href="Koleksi.php">
          <div class="boxicon">
            <i id="icon" class="fa-solid fa-book"></i>
          </div>
        </a>
        <h1><?php echo $totalBuku; ?></h1>
        <h6>Total Koleksi</h6>
      </div>
      <div class="box">
        <a href="Anggota.php">
          <div class="boxicon">
            <i id="icon" class="fa-solid fa-users"></i>
          </div>
        </a>
        <h1><?php echo $totalAnggota; ?></h1>
        <h6>Total Anggota</h6>
      </div>
      <div class="box">
        <a href="Peminjaman.php">
          <div class="boxicon">
            <i id="icon" class="fa-solid fa-hand-holding-hand"></i>
          </div>
        </a>
        <h1><?php echo $totalPeminjaman; ?></h1>
        <h6>Total Peminjaman</h6>
      </div>
    </div>

    <footer>
      <div class="copyright">
        <div class="wrapper2">

        </div>
      </div>
    </footer>
  </section>

  <script src="../Script/script.js"></script>
</body>

</html>