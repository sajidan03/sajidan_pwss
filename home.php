<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hero {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 60vh;
    color: #ffffff;
    background-image: url('uploads/header.jpg'); /* Ganti dengan path gambar Anda */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.hero p {
    margin-bottom: 20px;
    font-weight: 100;
}
.hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Overlay gelap */
    z-index: 1;
}
.hero h2 {
    margin-bottom: 10px;
    color: #f4f4f4;
    font-weight: 540;
}
.hero h2,
.hero h1,
.hero p,
.hero .cta-button {
    position: relative;
    z-index: 2;
}
.hero .src input[type="search"],
.hero .src input{
    width: 360px;
    height: 30px;
}
.hero {
    .src {
        z-index: 3;
        justify-content: center;
    }
}
.cta-button {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #00d1b2;
    color: #141414;
    font-size: 18px;
    transition: background-color 0.3s;
    font-size: medium;
}

.cta-button:hover {
    background-color: #00a98f;
}

/* Featured Games */
.featured {
    padding: 60px 20px;
    text-align: center;
}

.featured h2 {
    font-size: 32px;
    margin-bottom: 40px;
    color: #090f71;
}

.game-grid {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}
.game-card:hover {
    transform: translateY(-5px);
}
.game-card {
    width: 280px;
    background-color: #1c1c1c;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    transition: transform 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Menempatkan elemen dalam kolom dengan jarak antar elemen */
    padding: 20px;
}

.game-info {
    text-align: center;
}

.game-card img {
    width: 100%;
    height: auto;
}

.game-info h3 {
    font-size: 24px;
    margin-bottom: 10px;
    margin-top: 10px;
    color: #f4f4f4;
}

.game-info p {
    font-size: 16px;
    color: #a0a0a0;
}

.game-card p {
    font-size: 18px;
    color: #6495ed;
    text-align: right;
    margin-top: auto; /* Menempatkan teks harga di bagian bawah */
}


.game-info p {
    font-size: 16px;
    color: #a0a0a0;
    margin-bottom: 20px;
    text-align: start;
}

.btn {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #00d1b2;
    color: #141414;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #00a98f;
}
    </style>
</head>
<?php
    include "koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM produk");
    $no = 1;
    ?>
<body>
    <main>
        <section class="hero">
            <h2>Temukan game Action,horror, dan juga game PVP lainnya!</h2>
            <div class="src">
                <p>Game termurah mulai dari Rp. 49.000,00</p>
                <p>Login untuk mendapatkan akses untuk semua game!!</p>
                <!-- <input type="search" name="search" id="" placeholder="Cari game.."> 
                <a href="#store" class="cta-button">Cari games</a> -->
            </div>
        </section>
        <section class="featured">
            <h2>Popular Games</h2>
            <div class="game-grid">
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <div class="game-card" onclick="window.location.href='index.php?page=content&idproduk=<?= $data['idproduk'] ?>'">
                    <?php
                    $foto = (file_exists('uploads/' . $data['gambar']) && $data['gambar'] != "") ? $data['gambar'] : "default.jpg";
                    ?>
                    <img src="uploads/<?= $foto ?>" alt="Gambar Produk">
                    <div class="game-info">
                        <h3><?= htmlspecialchars($data['nama_produk']) ?></h3>
                        <p><?= htmlspecialchars($data['deskripsi']) ?></p>
                    </div>
                    <p>Rp. <?= number_format($data['harga'], 0, ',', '.') ?> </p>
                </div>
                <?php } ?>
                <div class="game-grid">
                    </div>
            </div>
        </section>
    </main>
</body>
</html>