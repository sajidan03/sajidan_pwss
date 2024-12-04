<?php
if (!isset($_SESSION)) {
  header("location:index.php");
}
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $tanggal = date('Y-m-d'); // Tanggal otomatis

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'db_siswa');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query insert data
    $sql = "INSERT INTO transaksi (nama, no_hp, tanggal_transaksi) VALUES ('$nama', '$no_hp', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        $message = "Transaksi berhasil disimpan!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Transaksi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #333;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }
    input[type="text"],
    input[type="tel"],
    input[type="date"] {
      width: 740px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }
    input[type="submit"]:hover {
      background: #0056b3;
    }
    .message {
      margin-top: 15px;
      text-align: center;
      font-weight: bold;
      color: green;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <style>
    .bungkus {
      display: flex;
      justify-content: center;
    }
  </style>
  <div class="container">
    <h2>Form Transaksi</h2>
    <!-- Tampilkan pesan jika ada -->
    <?php if (!empty($message)): ?>
      <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <!-- Form transaksi -->
     <div class="bungkus">
     <form action="" method="POST">
      <!-- Nama -->
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        
        <!-- No HP -->
        <div class="form-group">
          <label for="no_hp">No HP</label>
          <input type="tel" id="no_hp" name="no_hp" placeholder="Masukkan No HP" required>
        </div>
        
        <!-- Tanggal Transaksi -->
        <div class="form-group">
          <label for="tanggal">Tanggal Transaksi</label>
          <input type="text" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
  
        <!-- Submit -->
         <div class="metod">
         <input type="submit" value="Dana" style="width: 100px;">
         <input type="submit" value="Whatsapp" style="width: 100px; background-color: green;">
         </div>
         <style>
          .metod {
            display: flex;
            justify-content: end;
            gap: 10px;
          }
         </style>
         <br>
        <input type="submit" value="Simpan Transaksi">
    </form>
    </div>
  </div>
</body>
</html>
