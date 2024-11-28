<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- <link rel="stylesheet" href="editproduk.css"> -->
</head>
<body>
<?php
include "koneksi.php";

if (!isset($_GET['idproduk'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['idproduk'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE idproduk='$id'");
if (mysqli_num_rows($query) == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$data = mysqli_fetch_array($query);

if (isset($_POST['edit'])) {
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $jml_produk = mysqli_real_escape_string($koneksi, $_POST['jml_produk']);
    $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);

    // Cek apakah file gambar diunggah
    if ($_FILES['gambar']['name']) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["gambar"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Ekstensi file yang diizinkan
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        // Validasi tipe file
        if (in_array($fileType, $allowTypes)) {
            // Pindahkan file ke folder tujuan
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
                // Update gambar dengan path baru
                $query_update = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', jml_produk='$jml_produk', gambar='$fileName', idkategori='$idkategori' WHERE idproduk='$id'");

                if ($query_update) {
                    header("location:index.php?page=produk");
                    exit;
                } else {
                    echo "Data gagal diubah";
                }
            } else {
                echo "Gagal mengunggah gambar.";
            }
        } else {
            echo "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        }
    } else {
        $query_update = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', jml_produk='$jml_produk', idkategori='$idkategori' WHERE idproduk='$id'");
        if ($query_update) {
            header("location:index.php?page=produk");
            exit;
        } else {
            echo "Data gagal diubah";
        }
    }
}
?>

    <form action="edit5.php?idproduk=<?= $data['idproduk'] ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Produk : </td>
                <td><input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>"required></td>
            </tr>
            <tr>
                <td>Harga : </td>
                <td>
                    <input type="text" name="harga" id="" value="<?= $data['harga']?>">
                </td>
            </tr>
            <tr>
                <td>Deskripsi : </td>
                <td><input type="text" name="deskripsi" value="<?= $data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td>Gambar : </td>
                <td><input type="file" name="gambar" id="gambar">
                <br>
                <img src="uploads/<?= $data['gambar'] ?>" alt="Gambar Produk" width="100"></td>
            </tr>
            <tr>
                <td>Id kategori : `</td>
                <td>
                    <input type="number" name="idkategori" id="" value="<?= $data['idkategori']?>">
                </td>
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
