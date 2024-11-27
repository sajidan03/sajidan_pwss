<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
</head>
<body>
    
<form action="" method="post">
        <label for="nama">Nama Member:</label>
        <input type="text" name="nama_member" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="">
            <option value="L">L</option>
            <option value="P">P</option>
        </select>

        <label for="no_hp">No Hp:</label>
        <input type="text" name="no_hp" required><br><br>

        <label for="level">Alamat:</label>
        <input type="text" name="alamat" id="">

        <input type="submit" name="tambah" value="tambah">
    </form>
    <?php
    //
    include "koneksi.php";
    if (isset($_POST['tambah'])) {
        $nama_member = $_POST['nama_member'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        $query_insert = mysqli_query($koneksi, "INSERT INTO member (nama_member, jenis_kelamin, no_hp, alamat) VALUES ('$nama_member', '$jenis_kelamin', '$no_hp', '$alamat')");

        if ($query_insert) {
            header("location:member.php");
        } else {
            echo "Gagal menambahkan data!";
        }
    }
    ?>
</body>
</html>