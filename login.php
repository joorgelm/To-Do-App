<?php

include("conexao.php");

$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$senha = mysqli_real_escape_string($mysqli, $_POST['psw']);

$query = "SELECT id, email FROM cadastro WHERE email = '{$email}' AND password = md5('{$senha}')";

$result = mysqli_query($mysqli, $query);

$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['email'] = $email;
	header('Location: index.html');
	exit();
}else{
	header('Location: home.html');
	exit();
}

?>
