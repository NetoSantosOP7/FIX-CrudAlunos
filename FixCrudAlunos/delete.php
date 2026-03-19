<?php

require __DIR__ . '/conexao.php';

$id = $_POST["id"] ?? null;

if(!$id)  {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('DELETE FROM alunos WHERE id = ?');
$stmt->execute([$id]);

header('Location: index.php');

?>