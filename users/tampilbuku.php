<?php
include('connection.php');

$query = "SELECT * FROM buku LIMIT 100";
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

mysqli_close($con);
?>
