<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
include("conecta.php");
require 'funcoes.php';

$nome = $_SESSION['nome'];

if(isset($_POST['enviar-avatar'])){
	$avatar = $_POST['avatar'];

	$sql = "UPDATE users SET avatar = '$avatar' WHERE (nome LIKE '$nome')";
	try {
		$consulta = $link->prepare($sql);
	
		$consulta->execute();

		header("Location:../perfil.php");
	}
	catch(PDOException $ex){
		echo($ex->getMessage());
	}
}
?>

