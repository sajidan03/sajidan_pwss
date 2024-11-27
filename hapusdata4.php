<?php
include "koneksi.php";
if (isset($_GET['idmember'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['idmember']);
    $query = mysqli_query($koneksi, "DELETE FROM member WHERE idmember='$id'");
    if ($query) {
        header("location:member.php");
        exit();
    }else {
        echo "Hapus gagal!";
    }
}
?>