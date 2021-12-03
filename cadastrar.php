<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nickname']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = mysqli_real_escape_string($mysqli, trim(md5($_POST['psw'])));

$sql = "SELECT COUNT(*) AS total FROM cadastro WHERE email = '$email'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1){
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.html');
	exit;
}

$sql = "INSERT INTO cadastro (nome, email, password) VALUES ('$nome', '$email', '$senha')";

if($mysqli->query($sql) === TRUE){
	$_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('Location: index.html');
exit;
?>