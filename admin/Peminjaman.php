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
    <link rel="stylesheet" href="../css_admin/Peminjaman.css" />
    <link rel="stylesheet" href="../css_admin/Sidebar2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/datatables.min.css" rel="stylesheet"/>
 

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
        <div class="dataanggota">
        <p>Data Peminjaman Buku</p>
        </div>
        <div class="container">
        <div class="btnAdd">
        <a href="tambah_peminjaman.php" class="add-button">Tambah Data</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table">
              <thead>
                <th>Id Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
          
          
      </section>
      <script src="../js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
      <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script type="text/javascript" src="../js/dt-1.10.25datatables.min.js"></script>
      <script src="../Script/script.js"></script>
      <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'datapeminjam.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
          },

        ]
      });
    });
  
    </script>
</body>
</html>
