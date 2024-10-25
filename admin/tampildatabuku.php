<?php
include('connection.php');

$output = array();
$sql = "SELECT * FROM buku ";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'id_buku',
    1 => 'cover',
    2 => 'judul_buku',
    3 => 'pengarang',
    4 => 'penerbit',
    5 => 'kategori',
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE judul_buku LIKE '%" . $search_value . "%'";
    $sql .= " OR pengarang LIKE '%" . $search_value . "%'";
    $sql .= " OR penerbit LIKE '%" . $search_value . "%'";
    $sql .= " OR kategori LIKE '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id_buku DESC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length;
}

$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = '<img src="../cover/' . $row['cover'] . '" width="65" height="100">';
    $sub_array[] = $row['judul_buku'];
    $sub_array[] = $row['pengarang'];
    $sub_array[] = $row['penerbit'];
    $sub_array[] = $row['kategori'];
    $sub_array[] = '
        <div class="action-buttons">
            <a href="Updatebuku.php?id=' . $row['id_buku'] . '" class="edit-button" title="Edit"><i class="fas fa-edit"></i></a>
            <a href="hapus_buku.php?id=' . $row['id_buku'] . '" class="delete-button" title="Hapus"><i class="fas fa-trash" style="color: red;"></i></a>
            <a href="baca.php?id='. $row['id_buku'] . '" class="read-button" title="Baca"><i class="fas fa-book-reader" style="color: #159895;"></i></a>
        </div>
    ';
    $data[] = $sub_array;
}


$output = array(  
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
);
echo json_encode($output);
?>
