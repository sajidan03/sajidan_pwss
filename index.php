<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <!-- <style>
        *{
            margin: 0 auto;
        }
        .header {
            background-color: lightblue;
            color: white;
            padding: 10px;
        }
        .menu {
            background-color: black;
            color: white;
            padding-left: 10px;
            padding: 8px;
        }
        .menu a {
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }
    </style> -->
</head>
<body>
    <!-- <div class="header">
        <label for="tittle">
            Aplikasi penjualan
        </label>
        <label for="profil">
            <a href="index.php?page=profil">Profil</a>
        </label>
    </div> -->
    <div class="menu">
        <!-- <a href="index.php?page=login">Login</a> -->
        <?php 
        if(isset($_SESSION["nama"])) {
            if ($_SESSION['level'] == 'admin') {
              ?>
              <div class="navbar">
                <p style="color: #6495ed;">riGo</p>
                    <a href="index.php?page=user">User</a>
                    <a href="index.php?page=produk">Produk</a>
                    <a href="index.php?page=member">Member</a>
                    <a href="index.php?page=penjualan">Penjualan</a>
                    <a href="index.php?page=kp">Kategori</a>
                    <a href="logout.php">Logout</a> 
              </div>
              <?php   
            }
            else if ($_SESSION['level'] == 'user') {
                ?>
                <div class="navbar">
                <p style="color: #6495ed;">riGo</p>
                    <a href="index.php?page=user">User</a>
                    <a href="logout.php">Logout</a>
                </div>
                <?php
            }
        ?>
        <?php 
        }else {
        ?>
        <div class="navbar">
        <div class="anav">
            <p style="color: #6495ed;">riGo</p>
            <div class="nava">
                <a href="index.php?page=home" style="margin-left: 300px; background-color: #141414">Beranda</a>
                <a href="index.php?page=login">Login</a>
                <a href="index.php?page=tambahusers">Daftar</a>
            </div>
        </div>
        </div>
        <style>
            .anav {
                background-color: #141414; 
                 padding: 10px 20px;
                 display: flex;
                 align-items: center;
                 /* justify-content: space-between; */
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            }
            .anav p{
                color: #6495ed; 
                font-size: 24px;
               font-weight: bold;
               margin: 0;
              margin-right: 740px;
            }
            .nava a{
                color: #ffffff; /* Warna teks tautan */
               text-decoration: none;
               padding: 6px 12px;
                border-radius: 1px;
               transition: all 0.1s ease;
               font-size: 14px;
               background-color: green;
            }
            .nava a:hover{
                /* Warna latar tautan saat hover */
    /* color: #141414; Warna teks saat hover */
                 color: whitesmoke;
                   text-decoration: underline;
            }
        </style>
        <?php
        }
        ?>
    </div>
    <div class="contentt">
    <div class="content">
        <?php
        if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case'login';
                include'login.php';
                break;
            //
            case'user';
                include'users.php';
                break;
            //
            case 'member';
            include 'member.php';
            break; 
            //
            case 'home':
                include 'home.php';
                break;
            //
            case 'kp';
            include 'kategori_produk.php';
            break;
            case 'penjualan';
            include'penjualan.php';
            break;
            case'profil.php';
                if (file_exists('profil.php')) {
                    include'profil.php';
                }else {
                    
                }
                break;
            //
            case 'edit.php';
                include'edit.php';
                break;
            case 'produk';
                include'produk.php';
                break;
            case'tambahusers';
                include'tambah.php';
                break;
            //
            case 'tambahmember';
            include 'tambah4.php';
            break;
            //
            case'tambahproduk';
            include 'tambah5.php';
            break;
            //
            case 'tambahpenjualan';
            include 'tambah3.php';
            break;
            //
            case 'editpenjualan';
            include 'edit3.php';
            break;
            //
            case 'tambahkp':
                include 'tambah2.php';
                break;
            //
            case 'editmember';
            include 'edit4.php';
            break;
            //
            case 'editusers';
            include 'edit.php';
            break;
            //
            case 'editproduk';
            include 'edit5.php';
            break;
            //
            case 'editkp':
                include 'edit2.php';
                break;
            //
            default:
                echo"Halaman tidak ditemukan";
                break;
        }
        }else{
            ?>
            <?php 
            include'home.php';
            ?>
    <style>
    </style>
            <?php
        }
        ?>
        <!-- // include("login.php"); -->
    </div>
    </div>
</body>
</html>