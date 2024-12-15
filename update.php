<?php
require 'config.php';

// Mendapatkan ID yang dikirim dari URL
$id = $_GET['id'];

// Menarik data siswa berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->execute([$id]);
$siswa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$siswa) {
    // Jika data tidak ditemukan, redirect ke read.php
    header("Location: read.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // Update data siswa di database
    $stmt = $conn->prepare("UPDATE siswa SET nama = ?, alamat = ?, jenis_kelamin = ?, agama = ?, sekolah_asal = ? WHERE id = ?");
    $stmt->execute([$nama, $alamat, $jenis_kelamin, $agama, $sekolah_asal, $id]);

    // Redirect ke halaman read.php setelah update
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit Siswa</h1>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($siswa['nama']); ?>" required>
        <br>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($siswa['alamat']); ?>" required>
        <br>
        <label>Jenis kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?= htmlspecialchars($siswa['jenis_kelamin']); ?>" required>
        <br>
        <label>Agama:</label>
        <input type="text" name="agama" value="<?= htmlspecialchars($siswa['agama']); ?>" required>
        <br>
        <label>Sekolah asal:</label>
        <input type="text" name="sekolah_asal" value="<?= htmlspecialchars($siswa['sekolah_asal']); ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="read.php">Kembali</a>
</body>
</html>
