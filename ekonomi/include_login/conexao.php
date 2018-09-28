<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$bd_local = "fusao_bd";
//online
//local_casa
//fusao_bd

$servidor = "localhost";
$usuario = "root";
$senha_bd = "";
$banco = "alunos_tcc_ekonomi";


if($bd_local == "online") {
  $servidor = "mysql10.000webhost.com";
  $usuario = "a7003582_ekonomi";
  $senha_bd = "ekonomi42";
  $banco = "a7003582_ekonomi";
}

else if($bd_local == "local_casa") {

  $servidor = "localhost";
  $usuario = "root";
  $senha_bd = "";
  $banco = "alunos_tcc_ekonomi";
}
else if($bd_local == "local_escola"){
  $servidor = "localhost";
  $usuario = "alunos";
  $senha_bd = "alunos";
  $banco = "alunos_tcc_ekonomi";
}
else if($bd_local == "fusao_bd"){
  $servidor = "localhost";
  $usuario = "root";
  $senha_bd = "";
  $banco = "tcc";
}

//$conn = mysql_connect("servidor", "Usuario", "Senha");
$conn = mysql_connect("$servidor", "$usuario", "$senha_bd") or die("Impossivel conectar");



//caso a conex�o seja estabelecida corretamente seleciona o banco de dados a ser usado
mysql_select_db("$banco") or die("Não foi possível selecionar o Banco");



mysql_set_charset('utf8');


?>