<?php
include "koneksi.php";
if (isset($_GET['idkategori'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['idkategori']);
    $query = mysqli_query($koneksi, "DELETE FROM kategori_produk WHERE idkategori='$id'");
    if ($query) {
        header("location:kategori_produk.php");
    }else {
        echo "Hapus data gagal!";
    }
}
?>