<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
     <style>
        form {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 8px;
    /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
    width: 100%;
    max-width: 400px;
}
.formm {
    display: flex;
    justify-content: center;
}
/* Label untuk form */
label {
    font-weight: bold;
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
    color: #555;
}
.content {
    width: max-content;
}
/* Input teks dan dropdown */
input[type="text"],
input[type="number"],
input[type="password"],
select {
    width: 360px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.3s ease;
}

/* Hover dan fokus pada input */
input[type="text"]:focus,
input[type="password"]:focus,
select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
}

/* Tombol submit */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
}

/* Hover tombol */
input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Responsif */
@media (max-width: 480px) {
    form {
        padding: 15px 20px;
    }
}
     </style>
</head>
<body>
    <div class="formm"><form action="" method="post">
        <label for="nama">Nama : </label>
        <input type="text" name="nama_pembeli" required><br><br>

        <label for="username">No Hp : </label>
        <input type="number" name="no_hp" required><br><br>

        <label for="tgl_trx">Tanggal transaksi : </label>
        <input type="date" name="tgl_trx" id="" required>

        <input type="submit" name="tambah" value="Tambah">
    </form></div>
    <?php
    //
    include "koneksi.php";
    if (isset($_POST['tambah'])) {
        $nama_pembeli = $_POST['nama_pembeli'];
        $no_hp = $_POST['no_hp'];
        $tgl_trx = $_POST['tgl_trx'];
        //
        $query_insert = mysqli_query($koneksi, "INSERT INTO transaksi (nama_pembeli, no_hp, tgl_trx) VALUES ('$nama_pembeli', '$no_hp', '$tgl_trx')");

        if ($query_insert) {
            header("location:index.php?page=transaksi");
        } else {
            echo "Gagal menambahkan data!";
        }
    }
    ?>

</body>
</html>