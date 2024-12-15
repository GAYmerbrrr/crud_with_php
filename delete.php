<?php
require 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM siswa WHERE id = ?");
$stmt->execute([$id]);

header("Location: read.php");
exit;
?>
