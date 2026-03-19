<?php

require __DIR__ . '/conexao.php';

$stmt = $pdo->query('SELECT * FROM alunos ORDER BY nome ASC');

$alunos = $stmt->fetchAll();
?>