<?php

$host = "localhost";
$dbname = "crud_alunos";
$user = "root";
$pass = "";


try{
	$pdo = new PDO("mysql:host=$host;dbname=$dbname" , $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e){
	die("Erro na conexao: " . $e->getMessage());
}

?>