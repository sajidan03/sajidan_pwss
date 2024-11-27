<?php
// Mengambil parameter 'card' dari URL
$card = isset($_GET['card']) ? $_GET['card'] : 'default';  // Default jika tidak ada parameter

// Tentukan konten yang sesuai dengan parameter card
switch ($card) {
    case 'sajidan':
        $image = 'sajidan.jpg';  // Gambar untuk Sajidan
        $content = 'Ini adalah konten Sajidan.';
        break;

    case 'hanif':
        $image = 'hanif.jpg';  // Gambar untuk Hanif
        $content = 'Ini adalah konten Hanif.';
        break;

    case 'lain':
        $image = 'lain.jpg';  // Gambar untuk konten lain
        $content = 'Ini adalah konten lainnya.';
        break;

    default:
        $image = 'default.jpg';  // Gambar default jika card tidak dikenali
        $content = 'Pilih card untuk melihat kontennya.';
        break;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konten Card</title>
</head>
<body>

<!-- Menampilkan Konten Dinamis Berdasarkan Parameter Card -->
<h2>Konten: <?php echo $content; ?></h2>
<img src="images/<?php echo $image; ?>" alt="Gambar Konten" width="300" height="200">

</body>
</html>
