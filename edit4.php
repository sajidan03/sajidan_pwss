<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="edit2.css">
</head>
<body>
    <?php
    include "koneksi.php";
    if (!isset($_GET['idmember'])) {
        echo "ID tidak ditemukan!";
        exit;
    }
    $id = $_GET['idmember'];
    $query = mysqli_query($koneksi, "SELECT * FROM member WHERE idmember='$id'");
    if (mysqli_num_rows($query) == 0) {
        echo "Data tidak ditemukan!";
        exit;
    }

    $data = mysqli_fetch_array($query);
    if (isset($_POST['edit'])) {
        $nama_member = mysqli_real_escape_string($koneksi, $_POST['nama_member']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        // Update query
        $query_update = mysqli_query($koneksi, "UPDATE member SET nama_member='$nama_member', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat' WHERE idmember='$id'");

        if ($query_update) {
            header("location:member.php");
        } else {
            echo "Data gagal diubah";
        }
    }
    ?>
    <form action="edit4.php?idmember=<?= $data['idmember'] ?>" method="post">
        <table>
            <tr>
                <td>Nama member</td>
                <td><input type="text" name="nama_member" value="<?= $data['nama_member'] ?>"required></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>
                <select name="jenis_kelamin" id="">
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>No hp</td>
                    <td><input type="text" name="no_hp" id="" value="<?= $data['no_hp'] ?>"required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                    <td>
                        <input type="text" name="alamat" id="" value="<?= $data['alamat'] ?>"required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="edit" name="edit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
