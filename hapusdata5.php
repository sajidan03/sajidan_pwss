<?php
include "koneksi.php";
if (isset($_GET['idproduk'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['idproduk']);
    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE idproduk='$id'");
    if ($query) {
        header("location:index.php?page=produk");
        exit();
    }else {
        echo "Hapus gagal!";
    }
}
?>