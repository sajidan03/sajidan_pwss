<?php 
if (!isset($_SESSION["nama"])) {
    header("location:index.php");
}
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajidan</title>
    <link rel="stylesheet" href="cssbaru.css">
</head>
<body>
    <div class="atas">
        <form action="" method="post">
            <input type="search" name="txt_cari" id="" placeholder="Cari data..."> <input type="submit" value="Cari" name="cari">
        </form>
        <button onclick="window.location.href='index.php?page=tambahproduk'" class="btntambah">Tambah</button>
    </div>
    <!-- <div class="btnatas"> -->
        <!-- <button onclick="window.location.href='users.php'">Users</button>
        <button onclick="window.location.href='member.php'">Member</button>
        <button onclick="window.location.href='produk.php'">Produk</button>
        <button onclick="window.location.href='penjualan.php'">Penjualan</button>
        <button onclick="window.location.href='kategori_produk.php'">Kategori produk</button> -->
    <!-- </div> -->
    <div class="ttengah">
    <table border="1">
    <tr>
        <td>Id Game</td>
        <td>Nama game</td>
        <td>Harga</td>
        <td>Deskripsi</td>
        <td>Foto Game</td>
        <td>Id Kategori</td>
        <td>Aksi</td>
        <td>Aksi</td>
        <td>Keterangan</td>
    </tr>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['cari'])) {
        $cari = $_POST['txt_cari'];
        $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk like '%$cari%' OR idkategori like '%$cari%'");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM produk");
    }
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_produk'] ?></td>
            <td>Rp. <?= $data['harga']?></td>
            <td><?= $data['deskripsi']?></td>
            <td>
                <?php 
                if (!file_exists('uploads/'.$data['gambar']) || $data['gambar'] == "") {
                    $foto = "default.jpg";
                }else {
                    $foto = $data['gambar'];
                }
                ?>
                <img src="uploads/<?= $foto ?>" alt="Gambar Produk" width="160" height="auto"></td>
            </td>
            <td><?= $data['id_kategori']?></td>
            <td>
                <a href="hapusdata5.php?idproduk=<?= $data['idproduk'] ?>" 
                    onclick="return confirm('Yakin menghapus <?= $data['nama_produk'] ?> ini?')">
                    <button class="hapus">
                        <style>
                            .hapus:hover {
                                background-color: red;
                                color: white;
                            }
                        </style>
                        Hapus
                    </button>
                </a>
            </td>  
            <td>
                <a href="index.php?page=editproduk&idproduk=<?= $data['idproduk'] ?>">
                    <button class="btnedit">Edit</button>
                </a>
            </td>
            <td></td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </table>
</body>
</html>
