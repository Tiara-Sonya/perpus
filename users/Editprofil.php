<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}
include('connection.php');

$id_anggota = $_SESSION["login"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $kategori = $_POST['kategori'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];

    $query = "UPDATE anggota SET 
            nama_lengkap = '$nama_lengkap',
            alamat = '$alamat',
            jenis_kelamin = '$jenis_kelamin',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            agama = '$agama',
            pekerjaan = '$pekerjaan',
            kategori = '$kategori',
            email = '$email',
            no_telepon = '$no_telepon'
            WHERE id_anggota = '$id_anggota'";

    if (mysqli_query($con, $query)) {
        echo '<script>alert("Data berhasil disimpan"); window.location.href = "Profil.php";</script>';
        exit;
    } else {
        echo '<script>alert("Gagal menyimpan data");</script>';
    }
}

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
    <link rel="stylesheet" href="../css_users/Editprofil.css" />
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
                <li><a href="../login.php">
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

            <form action="" method="POST">
                <table>
                    <tr>
                        <th>Nama</th>
                        <td><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" /></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><input type="text" name="alamat" value="<?php echo $alamat; ?>" /></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><input type="text" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" /></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" /></td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td><input type="text" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" /></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>
                            <select id="agama" name="agama" required>
                                <option value="Islam" <?php if ($agama === 'Islam') echo 'selected'; ?>>Islam</option>
                                <option value="Kristen" <?php if ($agama === 'Kristen') echo 'selected'; ?>>Kristen</option>
                                <option value="Katolik" <?php if ($agama === 'Katolik') echo 'selected'; ?>>Katolik</option>
                                <option value="Hindu" <?php if ($agama === 'Hindu') echo 'selected'; ?>>Hindu</option>
                                <option value="Buddha" <?php if ($agama === 'Buddha') echo 'selected'; ?>>Buddha</option>
                                <option value="Konghucu" <?php if ($agama === 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                                <option value="Lainnya" <?php if ($agama === 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>
                            <select id="pekerjaan" name="pekerjaan" required>
                                <option value="Pelajar" <?php if ($pekerjaan === 'Pelajar') echo 'selected'; ?>>Pelajar</option>
                                <option value="Mahasiswa" <?php if ($pekerjaan === 'Mahasiswa') echo 'selected'; ?>>Mahasiswa</option>
                                <option value="Pegawai" <?php if ($pekerjaan === 'Pegawai') echo 'selected'; ?>>Pegawai</option>
                                <option value="Wiraswasta" <?php if ($pekerjaan === 'Wiraswasta') echo 'selected'; ?>>Wiraswasta</option>
                                <option value="Pensiunan" <?php if ($pekerjaan === 'Pensiunan') echo 'selected'; ?>>Pensiunan</option>
                                <option value="Ibu Rumah Tangga" <?php if ($pekerjaan === 'Ibu Rumah Tangga') echo 'selected'; ?>>Ibu Rumah Tangga</option>
                                <option value="Lainnya" <?php if ($pekerjaan === 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>
                            <select id="kategori" name="kategori" required>
                                <option value="Pelajar" <?php if ($kategori === 'Pelajar') echo 'selected'; ?>>Pelajar</option>
                                <option value="Mahasiswa" <?php if ($kategori === 'Mahasiswa') echo 'selected'; ?>>Mahasiswa</option>
                                <option value="Umum" <?php if ($kategori === 'Umum') echo 'selected'; ?>>Umum</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" value="<?php echo $email; ?>" /></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td><input type="text" name="no_telepon" value="<?php echo $no_telepon; ?>" /></td>
                    </tr>
                </table>

                <div class="profil">
                    <div class="navprofil">
                        <p class="hform">Foto</p>
                    </div>
                    <img class="foto-profil" src="../file/<?php echo $foto_profil; ?>" alt="Foto Profil">
                </div>
                <button class="simpan-button" type="submit">Simpan</button>
            </form>
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