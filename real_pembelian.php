<?php
// Koneksi ke database
include "koneksi.php";

// Ambil nama game dari parameter URL
if (isset($_GET['game'])) {
    $game = urldecode($_GET['game']);
} else {
    // Jika tidak ada game, arahkan ke halaman utama
    header('Location: index.php');
    exit;
}

// Ambil data produk dari database berdasarkan nama game
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk = '" . mysqli_real_escape_string($koneksi, $game) . "'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    // Jika tidak ditemukan, arahkan ke halaman utama atau tampilkan pesan error
    header('Location: index.php');
    exit;
}

// Harga game dan informasi lainnya
$harga = number_format($data['harga'], 0, ',', '.');
$deskripsi = htmlspecialchars($data['deskripsi']);
$gambar = htmlspecialchars($data['gambar']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Pembelian <?= htmlspecialchars($data['nama_produk']) ?></title>
    <style>
        /* CSS yang digunakan sama seperti sebelumnya */
        body {
            font-family: Arial, sans-serif;
            background-color: #1b2838;
            color: #c7d5e0;
            margin: 0;
            padding: 0;
        }
        .tengahv {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        .content {
            display: grid;
            place-items: center;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #27496d ;
        }

        .game-header {
            display: flex;
            flex-direction: row;
            gap: 30px;
            width: 100%;
            margin-bottom: 40px;
        }

        .game-header img {
            max-width: 500px;
            width: 100%;
            border-radius: 10px;
        }

        .game-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .game-info h1 {
            font-size: 36px;
            margin: 0 0 20px;
            color: #ffffff;
        }

        .game-info p {
            font-size: 18px;
            margin: 10px 0;
            color: #c7d5e0;
            line-height: 1.5;
        }

        .game-info .price {
            font-size: 28px;
            color: #66c0f4;
            font-weight: bold;
            margin: 20px 0;
        }

        .payment-option {
            text-decoration: none;
            padding: 12px 30px;
            background-color: #5c7e10;
            color: #ffffff;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 10px 0;
        }

        .payment-option:hover {
            background-color: #7ab620;
        }

        .additional-info {
            margin-top: 40px;
            text-align: center;
        }

        .additional-info h2 {
            color: #ffffff;
            font-size: 24px;
        }

        .additional-info p {
            font-size: 16px;
            color: #c7d5e0;
        }
    </style>
</head>
<body>
    <div class="tengahv">
        <div class="content">
            <div class="game-header">
                <img src="uploads/<?= $gambar ?>" alt="<?= htmlspecialchars($data['nama_produk']) ?>">
                <div class="game-info">
                    <h1><?= htmlspecialchars($data['nama_produk']) ?></h1>
                    <p><?= $deskripsi ?></p>
                    <p class="price">Rp. <?= $harga ?></p>
                </div>
            </div>
            <h2>Pilih Metode Pembayaran</h2>
            <a href="payment.php?game=<?= urlencode($data['nama_produk']) ?>&payment=DANA" class="payment-option">Bayar dengan DANA</a>
            <a href="payment.php?game=<?= urlencode($data['nama_produk']) ?>&payment=WhatsApp" class="payment-option">Chat WhatsApp untuk Pembayaran</a>
            <div class="additional-info">
                <h2>Detail Game</h2>
                <p><?= $deskripsi ?></p>
            </div>
        </div>
    </div>
</body>
</html>
