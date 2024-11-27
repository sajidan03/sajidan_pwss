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
    background-image: url('img/god-of-war-ragnarok-complete-guide-featured.jpg'); /* Ganti dengan path gambar Anda */
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
<body>
    <main>
        <section class="hero">
            <h2>Temukan game Action,horror, dan juga game PVP lainnya!</h2>
            <div class="src">
                <p>Game termurah mulai dari Rp. 49.000,00</p>
                <p>Login untuk mendapatkan akses untuk semua game!!`</p>
                <!-- <input type="search" name="search" id="" placeholder="Cari game.."> 
                <a href="#store" class="cta-button">Cari games</a> -->
            </div>
        </section>
        <section class="featured">
            <h2>Featured Games</h2>
            <div class="game-grid">
                <div class="game-card">
                    <img src="img/inn.jpg" alt="Game 1">
                    <div class="game-info">
                        <h3>The Inn-Sanity</h3>
                        <p>A thrilling adventure awaits...</p>
                    </div>
                    <p style="justify-content: end; align-items: end;">Rp. 72.000,00</p>
                </div>
                <div class="game-card">
                    <img src="img/sh.jpg" alt="Game 2">
                    <div class="game-info">
                        <h3>Silent Hill 2</h3>
                        <p>Investigating a letter from his late wife, James returns to where they made so many memories - Silent Hill. What he finds is a ghost town, prowled by disturbing monsters and cloaked in deep fog. Confront the monsters, solve puzzles, and search for traces of your wife in this remake of SILENT HILL 2.</p>                      
                    </div>
                    <p>Rp. 982.000,00</p>
                </div>
                <div class="game-card">
                    <img src="img/aqp.jpg" alt="">
                    <div class="game-info">
                        <h3>A Quiet place : Road ahead</h3>
                         <p>The Road Ahead is a single-player horror adventure game inspired by the critically acclaimed blockbuster movie franchise</p>
                    </div>
                    <p>Rp. 387.000,00</p>
                </div>
                <div class="game-grid">
                    <div class="game-card">
                        <img src="img/re4.jpg" alt="Game 1">
                        <div class="game-info">
                            <h3>Resident Evil 4</h3>
                            <p>A thrilling adventure awaits...</p>
                        </div>
                        <p>Rp. 387.000,00</p>
                    </div>
                    <div class="game-card">
                        <img src="img/outlast2.jpg" alt="Game 2">
                        <div class="game-info">
                            <h3>Outlast 2</h3>
                            <p>
                                Outlast 2 is the sequel to the acclaimed survival horror game Outlast. Set in the same universe as the first game, but with different characters and a different setting, Outlast 2 is a twisted new journey into the depths of the human mind and its dark secrets.
                            </p>
                        </div>
                        <p>Rp. 387.000,00</p>
                    </div>
                    <div class="game-card">
                        <img src="img/aqp.jpg" alt="Game 3">
                        <div class="game-info">
                            <h3>A Quiet place : Road ahead</h3>
                            <p>The Road Ahead is a single-player horror adventure game inspired by the critically acclaimed blockbuster movie franchise</p>
                        </div>
                        <p>Rp. 387.000,00</p>
                    </div>
            </div>
        </section>
    </main>
</body>
</html>