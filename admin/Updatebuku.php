<?php
include('connection.php');

session_start();

if( !isset($_SESSION["login"])){
  header("Location: ../index.php");
  exit;
}


if (isset($_GET['id'])) {
  $id_buku = $_GET['id'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $sinopsis = $_POST['sinopsis'];
    $kategori = $_POST['kategori'];

    $file_buku = $_FILES['buku']['name'];
    $tmp_buku = $_FILES['buku']['tmp_name'];
    $path_buku = "../buku/" . $file_buku;

    $file_cover = $_FILES['cover']['name'];
    $tmp_cover = $_FILES['cover']['tmp_name'];
    $path_cover = "../cover/" . $file_cover;

    if (!empty($file_buku)) {
      move_uploaded_file($tmp_buku, $path_buku);
    } else {
      $query_buku = mysqli_query($con, "SELECT file_buku FROM buku WHERE id_buku = '$id_buku'");
      $data_buku = mysqli_fetch_assoc($query_buku);
      $file_buku = $data_buku['file_buku'];
    }

    if (!empty($file_cover)) {
      move_uploaded_file($tmp_cover, $path_cover);
    } else {
      $query_cover = mysqli_query($con, "SELECT cover FROM buku WHERE id_buku = '$id_buku'");
      $data_cover = mysqli_fetch_assoc($query_cover);
      $file_cover = $data_cover['cover'];
    }

    $query = mysqli_query($con, "UPDATE buku SET 
              judul_buku = '$judul', 
              pengarang = '$pengarang', 
              penerbit = '$penerbit', 
              sinopsis = '$sinopsis', 
              kategori = '$kategori', 
              file_buku = '$file_buku', 
              cover = '$file_cover' 
              WHERE id_buku = '$id_buku'");

    if ($query) {
      echo '<script>alert("Data berhasil diupdate"); window.location.href = "Koleksi.php";</script>';
      exit;
    } else {
      echo '<script>alert("Gagal mengedit data");</script>';
    }
  }

  $query = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
  $data = mysqli_fetch_assoc($query);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Data Buku</title>
  <link rel="stylesheet" href="../css_admin/Updatebuku.css" />
  <link rel="stylesheet" href="../css_admin/Sidebar.css" />
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
    </div>
    <div>
      <a href="Koleksi.php">
        <img class="back" src="https://i.postimg.cc/NfHjqPHW/Tambahkan-judul-12.png" alt="back" />
      </a>
    </div>
    <p>Update Data Buku</p>
    <div class="sign">
      <div class="navform">
        <p class="hform">Form Buku</p>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
        <div class="form-row">
          <label for="judul">Judul Buku</label>
          <input type="text" id="judul" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" required />
          <label for="pengarang">Pengarang</label>
          <input type="text" id="pengarang" name="pengarang" value="<?php echo $data['pengarang']; ?>" required />
          <label for="penerbit">Penerbit</label>
          <input type="text" id="penerbit" name="penerbit" value="<?php echo $data['penerbit']; ?>" required />
          <label for="sinopsis">Sinopsis</label>
          <input type="text" id="sinopsis" name="sinopsis" value="<?php echo $data['sinopsis']; ?>" required />
          <label for="kategori">Kategori</label>
          <select id="kategori" name="kategori">
            <option value="Fiksi" <?php if ($data['kategori'] == 'Fiksi') echo 'selected="selected"'; ?>>Fiksi</option>
            <option value="Non-Fiksi" <?php if ($data['kategori'] == 'Non-Fiksi') echo 'selected="selected"'; ?>>Non-Fiksi</option>
            <option value="Referensi" <?php if ($data['kategori'] == 'Referensi') echo 'selected="selected"'; ?>>Referensi</option>
            <option value="Anak-Anak" <?php if ($data['kategori'] == 'Anak-Anak') echo 'selected="selected"'; ?>>Anak-Anak</option>
            <option value="Remaja" <?php if ($data['kategori'] == 'Remaja') echo 'selected="selected"'; ?>>Remaja</option>
            <option value="Majalah" <?php if ($data['kategori'] == 'Majalah') echo 'selected="selected"'; ?>>Majalah</option>
            <option value="Komik dan Grafis" <?php if ($data['kategori'] == 'Komik dan Grafis') echo 'selected="selected"'; ?>>Komik dan Grafis</option>
            <option value="Agama dan Spiritualitas" <?php if ($data['kategori'] == 'Agama dan Spiritualitas') echo 'selected="selected"'; ?>>Agama dan Spiritualitas</option>
            <option value="Sains dan Matematika" <?php if ($data['kategori'] == 'Sains dan Matematika') echo 'selected="selected"'; ?>>Sains dan Matematika</option>
            <option value="Ekonomi dan Bisnis" <?php if ($data['kategori'] == 'Ekonomi dan Bisnis') echo 'selected="selected"'; ?>>Ekonomi dan Bisnis</option>
          </select>

          <label for="buku">Pilih File Buku</label>
          <input type="file" id="buku" name="buku" />
          <div class="profil">
            <div class="navprofil">
              <p class="hform">Cover</p>
            </div>
            <div>
              <img class="foto" src="../cover/<?php echo $data['cover']; ?>" />
            </div>
            <input type="file" id="cover" name="cover" />
          </div>
          <button type="submit" name="Update" class="simpan-button">Update Data</button>
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