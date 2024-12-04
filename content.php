<?php
if (isset($_GET['gambar'])) {
    $gambar = urldecode($_GET['gambar']);
} else {
    $gambar = "default.jpg"; // Default gambar jika tidak ada parameter
}

// Cek apakah gambar ada di database
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk = '" . mysqli_real_escape_string($koneksi, $gambar) . "'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    // Jika tidak ditemukan, gunakan gambar default
    $data['gambar'] = "default.jpg";
    $data['nama_produk'] = "Produk Tidak Ditemukan";
    $data['deskripsi'] = "Deskripsi tidak tersedia.";
    $data['harga'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Game</title>
    <style>
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
            /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5); */
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

        .buy-button {
            text-decoration: none;
            padding: 12px 30px;
            background-color: #5c7e10;
            color: #ffffff;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
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
                <img src="uploads/<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['nama_produk']) ?>">
                <div class="game-info">
                    <h1><?= htmlspecialchars($data['nama_produk']) ?></h1>
                    <p><?= htmlspecialchars($data['deskripsi']) ?></p>
                    <p class="price">Rp. <?= number_format($data['harga'], 0, ',', '.') ?></p>
                    <a href="index.php?page=beli&game=<?= urlencode($data['nama_produk']) ?>" class="buy-button">Beli Sekarang</a>
                </div>
            </div>
            <div class="additional-info">
                <h2>Detail Game</h2>
                <p><?= $data['deskripsi']?></p>
            </div>
        </div>
    </div>
</body>
</html>
