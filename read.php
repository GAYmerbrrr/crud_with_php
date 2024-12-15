<?php
require 'config.php';

$stmt = $conn->query("SELECT * FROM siswa ORDER BY created_at DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="css/read.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Data Siswa</h1>
        </header>
        <a href="create.php" class="btn btn-primary">Tambah User</a>
        <a href="index.html" class="btn btn-primary">Beranda</a>
        <section class="siswa-list">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah asal</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['alamat']; ?></td>
                    <td><?= $user['jenis_kelamin']; ?></td>
                    <td><?= $user['agama']; ?></td>
                    <td><?= $user['sekolah_asal']; ?></td>
                    <td>
                        <a class="btn btn-edit" href="update.php?id=<?= $user['id']; ?>">Edit</a>
                        <a class="btn btn-delete" href="delete.php?id=<?= $user['id']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
</body>
</html>
