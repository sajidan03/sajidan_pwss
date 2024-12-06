<?php
if (!isset($_SESSION['nama'])) {
    header("location:index.php");
}

// Variabel default
$profilePic = 'uploads/default-avatar.png';
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Cek apakah foto profil sudah ada
if (file_exists('uploads/profile-pic.png')) {
    $profilePic = 'uploads/profile-pic.png';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['upload_pic'])) {
        // Proses upload foto
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . "profile-pic.png";
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Validasi file
            if (in_array($fileType, ['jpg', 'jpeg', 'png'])) {
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFile);
                $_SESSION['message'] = "Foto profil berhasil diunggah!";
            } else {
                $_SESSION['message'] = "Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
            }
        } else {
            $_SESSION['message'] = "Gagal mengunggah foto.";
        }
    } elseif (isset($_POST['save_changes'])) {
        // Simpan data profil
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['message'] = "Perubahan berhasil disimpan!";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1b2838;
      color: #c7d5e0;
      margin: 0;
      padding: 0;
    }
    .profile-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #2a475e;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .profile-container h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .profile-card {
      text-align: center;
    }
    .profile-image img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 2px solid #c7d5e0;
    }
    .profile-image form {
      margin-top: 10px;
    }
    .profile-image input,
    .profile-image button {
      margin-top: 5px;
      padding: 5px 10px;
      background-color: #66c0f4;
      color: #1b2838;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .profile-form {
      margin-top: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      background-color: #1b2838;
      color: #c7d5e0;
    }
    .form-group input:focus {
      outline: none;
      border: 2px solid #66c0f4;
    }
    #saveBtn {
      width: 100%;
      padding: 10px;
      background-color: #66c0f4;
      color: #1b2838;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    #saveBtn:hover {
      background-color: #417a9b;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <h1>Profil Saya</h1>
    <div class="profile-card">
      <?php if (isset($_SESSION['message'])): ?>
        <p style="color: #66c0f4;"><?= $_SESSION['message'] ?></p>
        <?php unset($_SESSION['message']); ?>
      <?php endif; ?>
      <div class="profile-image">
        <img src="<?= $profilePic ?>" alt="Foto Profil">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="profile_pic" accept="image/*" required>
          <button type="submit" name="upload_pic">Upload Foto</button>
        </form>
      </div>
      <form action="" method="post" class="profile-form">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <button type="submit" name="save_changes" id="saveBtn">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
