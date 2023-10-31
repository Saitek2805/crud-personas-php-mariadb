<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM informacion WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
