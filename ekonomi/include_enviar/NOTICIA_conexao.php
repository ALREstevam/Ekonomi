


<?php



$servidor="localhost";
$usuario= "root";
$senha_bd="";

$banco="alunos_tcc_ekonomi";



//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");

//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");

//executando comando SQL
//mysql_query($comando) or die("Falha no cadastro");

//echo "Cadastro realizado com sucesso<br>";




?>


