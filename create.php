<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $sekolah_asal = $_POST['sekolah_asal'];
    $agama = $_POST['agama'];

    $stmt = $conn->prepare("INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nama, $alamat, $jenis_kelamin, $agama, $sekolah_asal]);

    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa</title>
    <link rel="stylesheet" href="css/create.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Pendaftaran Siswa Baru</h1>
        </header>

        <section class="form-section">
            <form method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" required>
                </div>
                
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sekolah_asal">Agama:</label>
                    <input type="text" name="agama" id="Agama" required>
                </div>

                <div class="form-group">
                    <label for="sekolah_asal">Sekolah Asal:</label>
                    <input type="text" name="sekolah_asal" id="sekolah_asal" required>
                </div>

                <button type="submit" class="btn btn-submit">Daftar</button>
            </form>
            <a href="index.html" class="btn btn-back">Kembali</a>
        </section>
    </div>
</body>
</html>

