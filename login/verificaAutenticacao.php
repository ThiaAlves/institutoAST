<?php

if(!isset($_SESSION)) {
// iniciar uma sessão
session_start();
}

//Verifica se existe um usuario logado
if(!isset($_SESSION['id'])) {
	$msg ="Área restrita. Faça o login";
	header("location: ../../login/login.php?msg={$msg}");

	die();
	}

?>