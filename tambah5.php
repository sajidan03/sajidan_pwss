<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
     <style>
        form {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 8px;
    /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
    /* width: 100%; */
    /* max-width: 400px; */
}
.content {
    background-color: #ffffff;
}
.formm {
    display: flex;
    justify-content: center;
}
/* Label untuk form */
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
/* Input teks dan dropdown */
input[type="text"],
input[type="number"],
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

/* Hover dan fokus pada input */
input[type="text"]:focus,
input[type="password"]:focus,
select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
}

/* Tombol submit */
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

/* Hover tombol */
input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Responsif */
@media (max-width: 480px) {
    form {
        padding: 15px 20px;
    }
}
     </style>
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
    $jml_produk = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);
    //
    $gambar = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
    $type_array = ['image/jpeg', 'image/png'];
    if (in_array($type, $type_array)) {
        if ($size < 1000000) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/'. $gambar)) {
                $query_insert = mysqli_query($koneksi,"INSERT INTO produk (nama_produk, harga, deskripsi, gambar,idkategori) values ('$nama_produk', '$harga', '$jml_produk', '$gambar' ,'$idkategori')");
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
<style>
    .judul p{
        margin-right: 6px;
    }
</style>
    <form action="tambah5.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td class="judul"> <p>Nama game : </p></td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td class="judul"><p>Harga :</p> </td>
                <td><input type="text" name="harga" required></td>
            </tr>
            <tr>
                <td class="judul"><p>Deskripsi : </p></td>
                <td><input type="text" name="deskripsi" required></td>
            </tr>
            <tr>
                <td class="judul"><p>Gambar : </p></td>
                <td><input type="file" name="gambar" id="gambar" value=""></td>
            </tr>
            <tr>
                <td class="judul"><p>Id kategori : </p></td>
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
