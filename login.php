<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function validateForm() {
            const username = document.forms["registerForm"]["username"].value;
            const password = document.forms["registerForm"]["password"].value;
            if (username == "" || password == "") {
                alert("Semua kolom harus diisi!");
                return false;
            }
            return true;
        }
    </script>
    </script>
    <?php 
    if (isset($_POST["login"])) {
        include("koneksi.php");
        $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
        $password = mysqli_real_escape_string($koneksi, sha1($_POST["password"]));
        $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username ='$username' AND password ='$password'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['level'] = $data['level'];
            if ($data['level'] == "admin") {
                header("location:index.php?page=user");
                exit();
            } elseif ($data['level'] == "user") {
                header("location:index.php?page=tabuser");
                exit();
            } else {
                echo "<script>alert('Level pengguna tidak valid!');</script>";
            }
        }else {
            // echo"Login anda gagal";
            ?>
            <script>
                alert("Harap isi semua field!");
            </script>
            <?php
        }
    }
    ?>
    <style>
.form {
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    padding: 30px 20px;
    border-radius: 10px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
    max-width: 400px;
    width: 100%;
}
.formm {
    display: flex;
    justify-content: center;
}
.content {
    max-width: max-content;
}
.wrap {
    width: 100%;
}

form {
    width: 100%;
}

table {
    width: 100%;
}

td {
    padding: 10px 0;
}

.wrap form input[type="text"],
.wrap form input[type="password"] {
    /* width: 100%; */
    padding: 10px;
    outline: none;
    border: none;
    border-bottom: 2px solid #ccc;
    font-size: 14px;
    transition: border-color 0.3s;
    width: 260px;
}

.wrap form input[type="text"]:focus,
.wrap form input[type="password"]:focus {
    border-bottom: 2px solid #56ab2f;
}

.wrap form input[type="submit"] {
    width: 100%;
    padding: 10px 15px;
    background-color: #090f71;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-top: 20px;
}

.wrap form input[type="submit"]:hover {
    background-color: #090f71;
}

.wrap form td p {
    margin-bottom: 4px;
    margin-right: 6px;
    font-weight: bold;
    color: #555;
}
.content {
    margin-top: 70px;
}
    </style>
    <div class="formm">
    <div class="form" >
        <div class="wrap">
        <form action="" method="post">
            <div class="text">
                <h1>Login <br></h1>
                <h1 style="color: #090f71; margin-left: 10px;">riGo</h1>
            </div>
            <style>
                .text {
                    font-size: 16px;
                    display: flex;
                }
            </style>
        <table>
            <form name="registerForm" action="" method="post" onsubmit="return validateForm()">
            <tr>
                <td><p>Username : </p></td>
                <td><input type="text" name="username" id="" required></td>
            </tr>
            <tr>
                <td><p>Password : </p></td>
                <td><input type="password" name="password" id="" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login" name="login" required></td>
            </tr>
            </form>
        </table>
    </form>
        </div>
    </div>
    </div>
</body>
</html>