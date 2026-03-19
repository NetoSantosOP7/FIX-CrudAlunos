<?php

require __DIR__ . '/conexao.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$matricula = $_POST["matricula"];
$data_nascimento = $_POST["data_nascimento"];

$stmt = $pdo->prepare("INSERT INTO alunos (nome, email, matricula, data_nascimento) VALUES (?, ?, ?, ?)");
$stmt->execute([$nome, $email, $matricula, $data_nascimento]);

header('Location: index.php');



?>