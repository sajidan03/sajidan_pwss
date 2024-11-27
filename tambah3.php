<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
</head>
<body>
    
<form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="level">Level:</label>
        <select name="level" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br><br>

        <input type="submit" name="tambah" value="tambah">
    </form>
    <?php
    //
    include "koneksi.php";
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $query_insert = mysqli_query($koneksi, "INSERT INTO penjualan (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");

        if ($query_insert) {
            header("location:index.php?page=penjualan");
        } else {
            echo "Gagal menambahkan data!";
        }
    }
    ?>
</body>
</html>