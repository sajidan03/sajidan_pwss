<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajidan</title>
    <link rel="stylesheet" href="cssbaru.css">
    <style>
        .atas {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="atas">
    <form action="" method="post">
        <input type="search" name="txt_cari" id="" placeholder="Cari data..."> <input type="submit" value="Cari" name="cari">
    </form>
    <button onclick="window.location.href='index.php?page=tambahkp'" class="btntambah">Tambah</button>
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
        <td>No</td>
        <td>Nama Produk</td>
        <td>Keterangan</td>
        <td>Aksi</td>
        <td>Aksi</td>
        </tr>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['cari'])) {
        $cari = $_POST['txt_cari'];
        $query = mysqli_query($koneksi, "SELECT * FROM kategori_produk WHERE nama_kategori like '%$cari%' OR keterangan like '%$cari%'");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM kategori_produk");
    }
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_kategori'] ?></td>
            <td><?= $data['keterangan']?></td>
            <td>
                <a href="hapusdata2.php?idkategori=<?= $data['idkategori'] ?>" 
                    onclick="return confirm('Yakin menghapus <?= $data['keterangan'] ?> ini?')">
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
                <a href="index.php?page=editkp&idkategori=<?= $data['idkategori'] ?>">
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
