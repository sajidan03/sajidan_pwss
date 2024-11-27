<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="editproduk.css">
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
    //
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $gambar = $_FILES['gambar']['name'];
        $size = $_FILES['gambar']['size'];
        $type = $_FILES['gambar']['type'];
        $type_array = ['image/jpeg', 'image/png'];
    if (in_array($type, $type_array)) {
        if ($size < 1000000) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/'. $gambar)) {
                $query_insert = mysqli_query($koneksi,"INSERT INTO produk (nama_produk, harga, jml_produk, gambar,idkategori) values ('$nama_produk', '$harga', '$jml_produk', '$gambar' ,'$idkategori')");
                if ($query_insert) {
                    header("location:produk.php");
                }else {
                    echo"Gagal diuploads";
                }
            }else{ 
                echo"Data gagal disimpan";
            }
        }else {
            echo "Tipe tid";
        }
    }else {
        echo "Gagal!";
    }
    } else {
        $query_update = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', jml_produk='$jml_produk', idkategori='$idkategori' WHERE idproduk='$id'");
        if ($query_update) {
            header("location:produk.php");
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
                <td>Nama Produk</td>
                <td><input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>"required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" id="" value="<?= $data['harga']?>">
                </td>
            </tr>
            <tr>
                <td>Jumlah produk</td>
                <td><input type="number" name="jml_produk" id="" value="<?= $data['jml_produk']?>"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar" id="gambar">
                <br>
                <img src="uploads/<?= $data['gambar'] ?>" alt="Gambar Produk" width="100"></td>
            </tr>
            <tr>
                <td>Id kategori</td>
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
