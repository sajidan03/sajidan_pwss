<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }
        .formm {
            display: flex;
            justify-content: center;
        }
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
        input[type="text"],
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
        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }
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
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        @media (max-width: 480px) {
            form {
                padding: 15px 20px;
            }
        }
    </style>
    <script>
        function validateForm() {
            const nama = document.forms["registerForm"]["nama"].value;
            const username = document.forms["registerForm"]["username"].value;
            const password = document.forms["registerForm"]["password"].value;
            const level = document.forms["registerForm"]["level"].value;

            if (nama == "" || username == "" || password == "" || level == "") {
                alert("Semua kolom harus diisi!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="formm">
        <form name="registerForm" action="" method="post" onsubmit="return validateForm()">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required><br><br>

            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <label for="level">Level:</label>
            <select name="level" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br><br>

            <input type="submit" name="tambah" value="Daftar">
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pwenkripsi = sha1($password); 
        $level = $_POST['level'];

        $query_insert = mysqli_query($koneksi, "INSERT INTO users (nama, username, password, level) VALUES ('$nama', '$username', '$pwenkripsi', '$level')");
        if ($query_insert) {
            if (empty($nama) || empty($username) || empty($password) || empty($level)) {
                echo "Isi terlebih dahulu";
            } else {
                ?>
                <script>
                    alert("Daftar berhasil");
                    window.location.href = "index.php";
                </script>
                <?php 
            }
        } else {
            echo "Gagal menambahkan data!";
        }
    }
    ?>
</body>
</html>
