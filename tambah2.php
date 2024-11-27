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
        <label for="nama_kategori">Nama Kategori : </label>
        <input type="text" name="nama_kategori" required><br><br>

        <label for="keterangan">Keterangan : </label>
        <input type="text" name="keterangan" required><br><br>
        <input type="submit" name="tambah" value="tambah">
    </form>
    <?php
    //
    include "koneksi.php";
    if (isset($_POST['tambah'])) {
        $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        $query_insert = mysqli_query($koneksi, "INSERT INTO kategori_produk (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')");
        if ($query_insert) {
            header("location:kategori_produk.php");
        } else {
            echo "Gagal menambahkan data!";
        }
    }
    ?>
</body>
</html>