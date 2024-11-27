<?php
include "koneksi.php";
if (isset($_GET['idtransaksi'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['idtransaksi']);
    $query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE idtransaksi='$id'");
    if ($query) {
        header("location:index.php?page=transaksi");
        exit();
    }else {
        echo "Hapus gagal!";
    }
}
?>