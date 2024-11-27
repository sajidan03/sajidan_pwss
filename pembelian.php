<?php 
include("koneksi.php");
if (isset($_SESSION["nama"])) {
    header("index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="search" id="" placeholder="Cari data..." > <input type="button" value="Cari" name="cari">
        <!-- <input type="submit" value=""> -->
    </form>
    <?php 
    if (isset($_POST['cari'])) {
        $cari = $_POST['cari'];
        $nama_pembeli = $_POST['nama_pembeli'];
        $no_hp = $_POST['no_hp'];
        $tgl_trx = $_POST['tgl_trx'];
    //
        $query = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE nama_pembeli LIKE '%$nama_pembeli%'");   
    }else{
        $query = mysqli_query($koneksi,"SELECT * FROM transaksi");
    }
    ?>
    <form action="" method="post">
        <p>Nama : </p>
        <input type="text" name="nama_pembeli" id="">
        <p>No Hp : </p>  
        <input type="number" name="no_hp" id="">
        <p>Tanggal transaksi</p>
        <input type="date" name="tgl_trx" id="">
    </form>
</body>
</html>