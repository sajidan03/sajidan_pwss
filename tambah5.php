<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
</head>
<body>
<!-- 
// include "koneksi.php";

// if (isset($_POST['tambah'])) {
//     $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
//     $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
//     $jml_produk = mysqli_real_escape_string($koneksi, $_POST['jml_produk']);
//     $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);

//     // Cek apakah file gambar diunggah
//     if ($_FILES['gambar']['name']) {
//         $targetDir = "uploads/";
//         $fileName = basename($_FILES["gambar"]["name"]);
//         $targetFilePath = $targetDir . $fileName;

//         // Ekstensi file yang diizinkan
//         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
//         $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

//         // Validasi tipe file
//         if (in_array($fileType, $allowTypes)) {
//             // Pindahkan file ke folder tujuan
//             if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
//                 // Tambahkan data baru dengan path gambar
//                 $query_insert = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, jml_produk, gambar, idkategori) VALUES ('$nama_produk', '$harga', '$jml_produk', '$fileName', '$idkategori')");

//                 if ($query_insert) {
//                     header("location:produk.php");
//                     exit;
//                 } else {
//                     echo "Data gagal ditambahkan";
//                 }
//             } else {
//                 echo "Gagal mengunggah gambar.";
//             }
//         } else {
//             echo "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
//         }
//     } else {
//         // Jika tidak ada gambar, tambahkan data tanpa gambar
//         $query_insert = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, jml_produk, idkategori) VALUES ('$nama_produk', '$harga', '$jml_produk', '$idkategori')");
//         if ($query_insert) {
//             header("location:produk.php");
//             exit;
//         } else {
//             echo "Data gagal ditambahkan";
//         }
//     }
// }
?> -->
<?php
include("koneksi.php");
if (isset($_POST['tambah'])) {
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $jml_produk = mysqli_real_escape_string($koneksi, $_POST['jml_produk']);
    $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);
    //
    $gambar = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
    $type_array = ['image/jpeg', 'image/png'];
    if (in_array($type, $type_array)) {
        if ($size < 1000000) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/'. $gambar)) {
                $query_insert = mysqli_query($koneksi,"INSERT INTO produk (nama_produk, harga, jml_produk, gambar,idkategori) values ('$nama_produk', '$harga', '$jml_produk', '$gambar' ,'$idkategori')");
                if ($query_insert) {
                    header("location:index.php?page=produk");
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
}
?>
    <form action="tambah5.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" required></td>
            </tr>
            <tr>
                <td>Jumlah produk</td>
                <td><input type="text" name="jml_produk" required></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar" id="gambar" value=""></td>
            </tr>
            <tr>
                <td>Id kategori</td>
                <td><input type="number" name="idkategori" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Tambah" name="tambah">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
