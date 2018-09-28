<?php
	//Inicia a sess�o
	session_start();
 
	//Verifica se h� dados ativos na sess�o
	if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["login"]))
	{
        echo'<script> alert("Acesso não autorizado"); </script>';
		//Caso n�o exista dados registrados, exige login
		header("Location:../index.php");
	}

?>

