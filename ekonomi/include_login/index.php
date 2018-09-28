<?php
//Inclui o arquivo de verificação
include_once("verifica.php");
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
 
<body>
<div>Olá : <b><?php echo $_SESSION['nome'] ?></b></div><br /><br />
<a href="destroi.php">Sair</a>
</body>
</html>
