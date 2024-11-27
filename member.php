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
    <button onclick="window.location.href='index.php?page=tambahmember'" class="btntambah">Tambah</button>
    </div>
    <!-- <div class="btnatas"> -->
        <!-- <button onclick="window.location.href='users.php'">Users</button>
        <button onclick="window.location.href='member.php'">Member</button>
        <button onclick="window.location.href='produk.php'">Produk</button>
        <button onclick="window.location.href='penjualan.php'">Penjualan</button>
        <button onclick="window.location.href='kategori_produk.php'">Kategori produk</button>
    </div> -->
    <div class="ttengah">
        <table border="1">
        <tr>
            <td>Id Member</td>
            <td>Nama member</td>
            <td>Jenis kelamin</td>
            <td>No hp</td>
            <td>Alamat</td>
            <td>Aksi</td>
            <td>Aksi</td>
        </tr>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['cari'])) {
        $cari = $_POST['txt_cari'];
        $query = mysqli_query($koneksi, "SELECT * FROM member WHERE nama_member like '%$cari%' OR alamat like '%$cari%'");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM member");
    }
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_member'] ?></td>
            <td><?= $data['jenis_kelamin']?></td>
            <td><?= $data['no_hp']?></td>
            <td><?= $data['alamat']?></td>
            <td>
                <a href="hapusdata4.php?idmember=<?= $data['idmember'] ?>" 
                    onclick="return confirm('Yakin menghapus <?= $data['nama_member'] ?> ini?')">
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
                <a href="index.php?page=editmember&idmember=<?= $data['idmember'] ?>">
                    <button onclick="window.location.href='index.php?page=editmember'" class="btnedit">Edit</button>
                </a>
            </td> 
        </tr>
        <?php
        $no++;
    }
    ?>
</body>
</html>
