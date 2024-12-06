<?php
if (!isset($_SESSION['nama'])) {
    header("location:index.php");
    exit;
}

include "koneksi.php";

// Cek apakah user sudah login
$id = $_SESSION['id']; // Pastikan ada ID user di session
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
if (mysqli_num_rows($query) == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$data = mysqli_fetch_array($query);

// Handle form submission untuk edit data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_changes'])) {
        // Validasi dan escape input
        $nama = mysqli_real_escape_string($koneksi, $_POST['name']);
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $data['password']; // Hash password jika diubah

        // Query update data
        $query_update = mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', password='$password' WHERE id='$id'");

        if ($query_update) {
            $_SESSION['message'] = "Data berhasil diubah!";
            header("Location: profil.php");
            exit;
        } else {
            $_SESSION['message'] = "Data gagal diubah!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil</title>
  <style>
    /* Reset Styles */
* {
  box-sizing: border-box;
}

/* Dasar Halaman */
body {
  font-family: 'Roboto', sans-serif;
  /* background: linear-gradient(135deg, #6a11cb, #2575fc);
  color: #f0f0f0; */
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Kontainer Utama */
.container {
  padding: 30px 40px;
  border-radius: 12px;
  /* box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); */
  color: #ffffff;
  /* transition: transform 0.2s ease, box-shadow 0.2s ease; */
}

/* Efek hover pada container */
.container:hover {
  transform: translateY(-5px);
  border-color: white 2px;
  /* box-shadow: 0 12px 25px rgba(0, 0, 0, 0.6); */
}

/* Judul */
h1 {
  text-align: center;
  font-size: 26px;
  margin-bottom: 20px;
  color: #a9c4ff;
}

/* Pesan Sukses/Error */
.alert-message {
  text-align: center;
  color: #66d9ff;
  margin-bottom: 15px;
  font-size: 14px;
  transition: color 0.3s ease;
}

/* Form Styling */
form {
  margin-top: 10px;
}

.table {
  margin-bottom: 20px;
}

.table tr {
  margin: 10px 0;
}

.table td {
  padding: 10px;
}

.table input[type="text"],
.table input[type="password"] {
  /* width: 100%; */
  padding: 10px;
  margin: 5px 0;
  border: none;
  background: #33334d;
  color: #f0f0f0;
  border-radius: 5px;
  transition: all 0.2s ease;
}

.table input[type="text"]:focus,
.table input[type="password"]:focus {
  border: 2px solid #66d9ff;
}

/* Tombol Simpan */
.button-save {
  background: linear-gradient(90deg, #5574ff, #4b65ff);
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  text-align: center;
  transition: transform 0.2s ease, background 0.2s ease;
}

.button-save:hover {
  background: linear-gradient(90deg, #4b65ff, #3f5bff);
  transform: translateY(-3px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}
.textt {
  display: flex;
  justify-content: center;
}
/* 
@media (max-width: 768px) {
  .container {
    width: 95%;
  }
}

@media (max-width: 480px) {
  h1 {
    font-size: 20px;
  }

  .button-save {
    font-size: 14px;
  }
} */

  </style>
</head>
<body>
<div class="container">
  <h1>Edit Profil</h1>
  <?php if (isset($_SESSION['message'])): ?>
    <p class="alert-message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
  <?php endif; ?>
  <form action="" method="post">
  <div class="textt">
    <table class="table">
      <tr>
        <td>Nama</td>
        <td><input type="text" name="name" value="<?= htmlspecialchars($data['nama']); ?>" required></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><input type="text" name="username" value="<?= htmlspecialchars($data['username']); ?>" required></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"></td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit" name="save_changes" class="button-save">Simpan Perubahan</button>
        </td>
      </tr>
    </table>
    </div>
  </form>
</div>
</body>
</html>
