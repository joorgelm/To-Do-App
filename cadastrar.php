<?php 
session_start();
include("conexao.php");

/* não tenho mta certeza dessa parte, 
se algm perceber que ta errado
me avisa que eu arrumo */ 

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha']))); /* criptografia */

$sql = "select count(*) as total from usuario where usuario = '$usuario'"; /* rever bd pra ter ctz, fiz isso meio improvisado */
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) { /* informa se usuário já existe */
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.html'); /* redireciona */
	exit;
}

$sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())"; /* rever bd pra ter ctz, fiz isso meio improvisado */

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true; /* cadastro realizado */
}

$conexao->close();

header('Location: cadastro.html');
exit;
?>