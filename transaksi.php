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
    <!-- <link rel="stylesheet" href="style.css"> -->
     <link rel="stylesheet" href="cssbaru.css">
</head>
<style>
    .logout {
        display: flex;
        justify-content: center;
        background-color: black;
        text-decoration: none;
        max-width: 120px;
        height: 30px;
        align-items: center;
        border-radius: 4px;
        margin-right: 90px;
    }
    a {
        text-decoration: none;
        color: white;
    }
    .logoutbngks {
        display: flex;
        justify-content: end;
    }
    .atas {
        display: flex;
        justify-content: center;
    }
</style>
<body>
    <!-- <h1>Data pengguna</h1> -->
    <div class="atas">
    <form action="" method="post">
        <input type="search" name="txt_cari" id="" placeholder="Cari data..."> <input type="submit" value="Cari" name="cari">
        
        <!-- <div class="logout">
            <a href="login.php">Logout</a>
        </div> -->
    </form>
    <button onclick="window.location.href='index.php?page=tambahtrx'" class="btntambah">Tambah</button>
    </div>
    <!-- <div class="btnatas"> -->
            <!-- <a href="tambah.php" class="button-link">Tambah data</a> -->
        <!-- <button onclick="window.location.href='users.php'">Users</button>
        <button onclick="window.location.href='member.php'">Member</button>
        <button onclick="window.location.href='produk.php'">Produk</button>
        <button onclick="window.location.href='penjualan.php'">Penjualan</button>
        <button onclick="window.location.href='kategori_produk.php'">Kategori produk</button> -->
    <!-- </div> -->
    <div class="ttengah">
        <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>No Hp</td>
            <td>Tanggal transaksi</td>
            <td>Aksi</td>
            <td>Aksi</td>
        </tr>   
    </div>

    <?php
    include "koneksi.php";
    if (isset($_POST['cari'])) {
        $cari = $_POST['txt_cari'];
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE nama_pembeli like '%$cari%'");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
    }
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_pembeli'] ?></td>
            <td><?= $data['no_hp']?></td>
            <td><?= $data['tgl_trx']?></td>
            <td>
                <a href="hapustransaksi.php?idtransaksi=<?= $data['idtransaksi'] ?>" 
                    onclick="return confirm('Yakin menghapus <?= $data['nama_pembeli'] ?> ini?')">
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
                <a href="index.php?page=edittrx&idtransaksi=<?= $data['idtransaksi'] ?>">
                    <button class="btnedit">Edit</button>
                </a>
            </td> 
        </tr>
        <?php
        $no++;
    }
    ?>
    </table>
</body>
</html>
