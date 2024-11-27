<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="edit2.css">
</head>
<body>
    <?php
    include "koneksi.php";
    if (!isset($_GET['id'])) {
        echo "ID tidak ditemukan!";
        exit;
    }
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
    if (mysqli_num_rows($query) == 0) {
        echo "Data tidak ditemukan!";
        exit;
    }

    $data = mysqli_fetch_array($query);
    if (isset($_POST['edit'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $level = mysqli_real_escape_string($koneksi, $_POST['level']);

        // Update query
        $query_update = mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', level='$level' WHERE id='$id'");

        if ($query_update) {
            header("location:users.php");
        } else {
            echo "Data gagal diubah";
        }
    }
    ?>
    
    <h1>Edit Data</h1>
    <form action="edit.php?id=<?= $data['id'] ?>" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= $data['username'] ?>" required></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level" required>
                        <option value="admin" <?= ($data['level'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="siswa" <?= ($data['level'] == 'siswa') ? 'selected' : '' ?>>Siswa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Edit" name="edit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
