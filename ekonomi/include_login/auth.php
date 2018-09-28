<?php




include'conexao.php';




echo'  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
// Recebemos os dados digitados pelo usu�rio
$login = $_POST['login'];
$senha = $_POST['senha'];






//Criamos o comando que efetua a busca do banco

// $sql = "SELECT id, nome FROM usuarios WHERE login = '$login' AND senha = '$senha'";

$sql = "SELECT * FROM usuario WHERE Email = '$login' AND Senha = '".md5($senha)."' ";

		//Executamos o comando
		$rs = mysql_query($sql) or die("Falha na consulta");



		//Retornamos o numero de linhas afetadas
		$num = mysql_num_rows($rs);
		//Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
		if($num > 0)
		{
			//Retorna os dados do banco
            $rst = mysql_fetch_array($rs);

            $Email 	= $rst["Email"];
			$Nome 	= $rst["Nome"];
            $Foto 	= $rst["Foto"];
            //$Senha 	= $rst["Senha"];
            $ID = $rst["ID_Usuario"];
			$Sexo = $rst["Sexo"];


 
			//Inicia a sess�o
			session_start();
			//Registra os dados do usu�rio na sess�o
			$_SESSION["Email"]	= $Email;
			$_SESSION["Nome"]	= $Nome;
			$_SESSION["Foto"]	= $Foto;
           // $_SESSION["Senha"]	= $Senha;
            $_SESSION["ID_Usuario"]	= $ID;
			$_SESSION["Sexo"]	= $Sexo;





          // echo"<script>window.alert('bem-vindo(a) $nome');</script>";

			//Encerra a conex�o com o banco
				mysql_close($conn);
				//Redireciona para o index
				header("Location:../main/main_index.php");




		}
		else
		{
			//Encerra a conex�o com o banco
			mysql_close($conn);
			//Caso nenhuma linha seja retornada emite o alerta e retorna

            include"../erro_login.html";


			echo "<meta http-equiv='refresh' content='3;URL=../index.php'>";
	}




?>