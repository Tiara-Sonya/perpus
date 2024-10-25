<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css_users/Pendaftaran.css" />
  <title>Daftar Sebagai Anggota</title>
  <link rel="icon" href="https://i.postimg.cc/7Zyt2Qmy/ikon.png" type="image/png" />
</head>

<body>
  <div class="navbar">
    <div>
      <img class="logo" src="https://i.postimg.cc/NGb0kHwz/logo2.png" alt="logo" />
    </div>
  </div>
  <div>
    <a href="../login.php">
      <img class="back" src="https://i.postimg.cc/NfHjqPHW/Tambahkan-judul-12.png" alt="back" />
    </a>
  </div>
  <p>Daftar Sebagai Anggota</p>
  <div class="sign">
    <div class="navform">
      <p class="hform">Form Pendaftaran</p>
    </div>
    <form action="Aksi.php" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required />
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" required />
        <label for="gender">Jenis Kelamin</label>
        <select id="gender" name="gender" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
        <label for="tempat">Tempat lahir</label>
        <input type="text" id="tempat" name="tempat" required />
        <label for="birthdate">Tanggal Lahir</label>
        <input type="date" id="birthdate" name="birthdate" required />
        <label for="agama">Agama</label>
        <select id="agama" name="agama" required>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="Konghucu">Konghucu</option>
          <option value="Lainnya">Lainnya</option>
        </select>
        <label for="pendidikan">Pendidikan Terakhir</label>
        <select id="pendidikan" name="pendidikan" r\>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="Diploma">Diploma</option>
          <option value="Sarjana">Sarjana</option>
          <option value="Magister">Magister</option>
          <option value="Doktor">Doktor</option>
          <option value="Lainnya">Lainnya</option>
        </select>
        <label for="pekerjaan">Pekerjaan</label>
        <select id="pekerjaan" name="pekerjaan" required>
          <option value="Mahasiswa">Pelajar</option>
          <option value="Mahasiswa">Mahasiswa</option>
          <option value="Pegawai">Pegawai</option>
          <option value="Wiraswasta">Wiraswasta</option>
          <option value="Pensiunan">Pensiunan</option>
          <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </div>
      <div class="form-row">
        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
          <option value="Pelajar">Pelajar</option>
          <option value="Mahasiswa">Mahasiswa</option>
          <option value="Umum">Umum</option>
        </select>
        <label for="email">Email</label>
        <input type="email" id="username" name="email" required />
        <label for="nomor_telepon">Nomor Telepon</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" pattern="[0-9]{10,12}" required />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <label for="confirm_password">Ulangi Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required />
      </div>
      <div class="profil">
        <div class="navprofil">
          <p class="hform">Foto Profil</p>
        </div>
        <div class="format">
          <p class="hformat">Format .png .jpg .jpeg</p>
        </div>
        <div>
          <img class="foto" src="https://i.postimg.cc/x8JVqzrR/Desain-tanpa-judul-6.png" />
        </div>
        <input type="file" id="foto" name="profil" accept="image/*" />
        <div class="button-container">
          <a href="../login.php" class="cancel-button">Batal</a>
          <button type="submit" name="Daftar" class="register-button">Daftar</button>
        </div>
    </form>
  </div>

</body>

</html>