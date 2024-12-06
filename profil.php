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

        // Tangani foto profil jika ada yang diunggah
        $foto = $data['foto']; // Default dengan foto lama jika tidak ada file yang diunggah
        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/"; // Folder tempat menyimpan foto
            $foto = $target_dir . basename($_FILES['foto']['name']);
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
        }

        // Query update data
        $query_update = mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', password='$password', foto='$foto' WHERE id='$id'");

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
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      padding: 30px 40px;
      border-radius: 12px;
    }

    h1 {
      text-align: center;
      font-size: 26px;
      margin-bottom: 20px;
      color: #a9c4ff;
    }

    .alert-message {
      text-align: center;
      color: #66d9ff;
      margin-bottom: 15px;
      font-size: 14px;
    }

    form {
      margin-top: 10px;
    }

    .table {
      margin-bottom: 20px;
    }

    .table td {
      padding: 10px;
    }

    table input[type="text"],
    table input[type="password"] {
      padding: 10px;
      margin: 5px 0;
      border: none;
      background: #33334d;
      color: #f0f0f0;
      border-radius: 5px;
    }

    .button-save {
      background: linear-gradient(90deg, #5574ff, #4b65ff);
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-align: center;
    }

    .foto-container {
      display: flex;
      justify-content: center;
      margin-bottom: 10px;
    }

    .foto-container img {
      border-radius: 50%;
      width: 100px;
      height: 100px;
      object-fit: cover;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Edit Profil</h1>
  <?php if (isset($_SESSION['message'])): ?>
    <p class="alert-message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
  <?php endif; ?>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="foto-container">
      <?php if ($data['foto']): ?>
        <img src="<?= htmlspecialchars($data['foto']); ?>" alt="Foto Profil">
      <?php else: ?>
        <img src="default-profile.png" alt="Foto Profil Default">
      <?php endif; ?>
    </div>
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
        <td>Foto Profil</td>
        <td><input type="file" name="foto"></td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit" name="save_changes" class="button-save">Simpan Perubahan</button>
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
