<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id='$id'");
    if ($query) {
        header("location:index.php?page=penjualan");
        exit();
    }else {
        echo "Hapus gagal!";
    }
}
?>