<?php
include('connection.php');

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $query = "SELECT * FROM buku WHERE judul_buku LIKE '%$keyword%' OR pengarang LIKE '%$keyword%' OR penerbit LIKE '%$keyword%' OR kategori LIKE '%$keyword%' LIMIT 10";
  $result = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $judul = $row['judul_buku'];
    $pengarang = $row['pengarang'];
    $penerbit = $row['penerbit'];
    $cover = $row['cover'];
    $id = $row['id_buku'];

    echo '<div class="box">';
    echo '<img src="../cover/' . $cover . '" alt="">';
    echo '<h4>' . $judul . '</h4>';
    echo '<p>' . $pengarang . '</p>';
    echo '<p>' . $penerbit . '</p>';
    echo '<button class="baca-btn" data-id="'.$id.'" >Baca</button>';
    echo '</div>';
  }
}

mysqli_close($con);
?>
