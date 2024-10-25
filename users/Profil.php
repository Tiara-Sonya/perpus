<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}
include('connection.php');

$id_anggota = $_SESSION["login"]; // Specify the desired member ID here

$query = mysqli_query($con, "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
$row = mysqli_fetch_assoc($query);

$nama_lengkap = $row['nama_lengkap'];
$alamat = $row['alamat'];
$jenis_kelamin = $row['jenis_kelamin'];
$tempat_lahir = $row['tempat_lahir'];
$tanggal_lahir = $row['tanggal_lahir'];
$agama = $row['agama'];
$pekerjaan = $row['pekerjaan'];
$kategori = $row['kategori'];
$email = $row['email'];
$no_telepon = $row['no_telepon'];
$foto_profil = $row['foto_profil'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>

  <link rel="stylesheet" href="../css_users/Sidebar.css" />
  <link rel="stylesheet" href="../css_users/Profil.css" />
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
            <i class="fa-solid fa-user"></i>
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

    <div class="sign">
      <div class="navform">
        <p class="hform">Profil</p>
      </div>
      <table>
        <tr>
          <th>Nama</th>
          <td><?php echo $nama_lengkap; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td><?php echo $jenis_kelamin; ?></td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td><?php echo $tanggal_lahir; ?></td>
        </tr>
        <tr>
          <th>Tempat Lahir</th>
          <td><?php echo $tempat_lahir; ?></td>
        </tr>
        <tr>
          <th>Agama</th>
          <td><?php echo $agama; ?></td>
        </tr>
        <tr>
          <th>Pekerjaan</th>
          <td><?php echo $pekerjaan; ?></td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td><?php echo $kategori; ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?php echo $email; ?></td>
        </tr>
        <tr>
          <th>No Telepon</th>
          <td><?php echo $no_telepon; ?></td>
        </tr>
      </table>
      <div class="profil">
        <div class="navprofil">
          <p class="hform">Foto</p>
        </div>
        <img class="foto-profil" src="../file/<?php echo $foto_profil; ?>" alt="Foto Profil">
      </div>
      <a href="editprofil.php">
        <button id="edit" name="edit" class="edit-button">Edit Profil</button>
      </a>

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