<?php
include('connection.php');

$output = array();
$sql = "SELECT * FROM anggota";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'id_anggota',
    1 => 'nama_lengkap',
    2 => 'alamat',
    3 => 'jenis_kelamin',
    4 => 'kategori',
    5 => 'email',
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE id_anggota LIKE '%" . $search_value . "%'";
    $sql .= " OR nama_lengkap LIKE '%" . $search_value . "%'";
    $sql .= " OR alamat LIKE '%" . $search_value . "%'";
    $sql .= " OR jenis_kelamin LIKE '%" . $search_value . "%'";
    $sql .= " OR kategori LIKE '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id_anggota DESC";
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
    $sub_array[] = $row['id_anggota'];
    $sub_array[] = $row['nama_lengkap'];
    $sub_array[] = $row['alamat'];
    $sub_array[] = $row['jenis_kelamin'];
    $sub_array[] = $row['kategori'];
    $sub_array[] = $row['email'];
    $sub_array[] = '
        <div class="action-buttons">
            <a href="hapus_anggota.php?id=' . $row['id_anggota'] . '" class="delete-button" title="Hapus"><i class="fas fa-trash" style="color: red;"></i></a>
            <a href="profil_anggota.php?id=' . $row['id_anggota'] . '" class="profile-button" title="Lihat Profil"><i class="fas fa-user"></i></a>
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
