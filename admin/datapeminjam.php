<?php
include('connection.php');


$output = array();
$sql = "SELECT pinjaman.id_peminjaman, pinjaman.id_anggota, anggota.nama_lengkap, anggota.alamat, buku.judul_buku, pinjaman.tanggal_peminjaman, pinjaman.tanggal_pengembalian FROM pinjaman
        JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota
        JOIN buku ON pinjaman.id_buku = buku.id_buku";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'id_peminjaman',
    1 => 'id_anggota',
    2 => 'nama_lengkap',
    3 => 'alamat',
    4 => 'judul_buku',
    5 => 'tanggal_peminjaman',
    6 => 'tanggal_pengembalian',
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE pinjaman.id_peminjaman LIKE '%" . $search_value . "%'";
    $sql .= " OR pinjaman.id_anggota LIKE '%" . $search_value . "%'";
    $sql .= " OR anggota.nama_lengkap LIKE '%" . $search_value . "%'";
    $sql .= " OR anggota.alamat LIKE '%" . $search_value . "%'";
    $sql .= " OR buku.judul_buku LIKE '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY pinjaman.id_peminjaman DESC";
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
    $sub_array[] = $row['judul_buku'];
    $sub_array[] = $row['tanggal_peminjaman'];
    $sub_array[] = $row['tanggal_pengembalian'];
    $sub_array[] = '
        <div class="action-buttons">
            <a href="hapus_peminjam.php?id=' . $row['id_peminjaman'] . '" class="delete-button" title="Hapus"><i class="fas fa-trash" style="color: red;"></i></a>
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
