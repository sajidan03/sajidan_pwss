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
    if (!isset($_GET['idkategori'])) {
        echo "ID tidak ditemukan!";
        exit;
    }
    $id = $_GET['idkategori'];
    $query = mysqli_query($koneksi, "SELECT * FROM kategori_produk WHERE idkategori='$id'");
    if (mysqli_num_rows($query) == 0) {
        echo "Data tidak ditemukan!";
        exit;
    }

    $data = mysqli_fetch_array($query);
    if (isset($_POST['edit'])) {
        $nama_kategori = mysqli_escape_string($koneksi, $_POST['nama_kategori']);
        $keterangan = mysqli_escape_string($koneksi, $_POST['keterangan']);
        // Update query
        $query_update = mysqli_query($koneksi, "UPDATE kategori_produk SET nama_kategori='$nama_kategori', keterangan='$keterangan' WHERE idkategori='$id'");

        if ($query_update) {
            header("location:index.php?page=kp");
        } else {
            echo "Data gagal diubah";
        }
    }
    ?>
    
    <form action="edit2.php?idkategori=<?= $data['idkategori'] ?>" method="post">
        <table>
            <tr>
                <td>Nama Kategori: </td>
                <td><input type="text" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" required></td>
            </tr>
            <tr>
                <td>Keterangan : </td>
                <td><input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="edit" name="edit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
