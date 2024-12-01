<?php
include "koneksi.php";
if (isset($_GET['idproduk'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['idproduk']);
    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE idproduk='$id'");

    if ($query) {
        $checkEmpty = mysqli_query($koneksi, "SELECT COUNT(*) AS nama_produk FROM produk");
        $data = mysqli_fetch_assoc($checkEmpty);

        if ($data['nama_produk'] == 0) {
            mysqli_query($koneksi, "ALTER TABLE produk AUTO_INCREMENT = 1");
        }
        header("location:index.php?page=produk");
    } else {
        echo "Hapus gagal!";
    }
}
?>
