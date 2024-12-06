<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        .formm {
            display: flex;
            justify-content: center;
        }

        label {
            font-weight: bold;
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .content {
            width: max-content;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 360px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include "koneksi.php";

    // Periksa apakah ada parameter 'id' untuk mengedit user
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");

    if (mysqli_num_rows($query) == 0) {
        echo "Data user tidak ditemukan!";
        exit;
    }

    $user = mysqli_fetch_array($query);

    // Proses form submit untuk edit user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'] ? sha1($_POST['password']) : $user['password'];
        $level = $_POST['level'];

        $foto = $user['foto'];
        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $target_dir = 'uploads/';
            $file_name = basename($_FILES['foto']['name']);
            $foto = $target_dir . $file_name;

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
                echo "Gagal mengunggah foto!";
                exit;
            }
        }

        // Update data user di database
        $query_update = mysqli_query(
            $koneksi,
            "UPDATE users SET nama='$nama', username='$username', password='$password', level='$level', foto='$foto' WHERE id='$id'"
        );

        if ($query_update) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal memperbarui data!";
        }
    }
    ?>

    <div class="formm">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']); ?>" required><br><br>

            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" required><br><br>

            <label for="password">Password (Kosongkan jika tidak ingin mengubah):</label>
            <input type="password" name="password"><br><br>

            <label for="level">Level:</label>
            <select name="level" required>
                <option value="admin" <?= $user['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?= $user['level'] == 'user' ? 'selected' : ''; ?>>User</option>
            </select><br><br>

            <label for="foto">Foto Profil Baru (Kosongkan jika tidak ingin mengubah):</label>
            <input type="file" name="foto"><br><br>

            <input type="submit" name="submit" value="Perbarui Data">
        </form>
    </div>
</body>

</html>
