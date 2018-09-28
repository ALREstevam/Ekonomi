<html>
<head>
    <link rel="stylesheet" type="text/css" href="../_css/enviando.css">




    <meta charset="utf-8">



</head>
<body>






<?php
$add = $_POST["add"];
include'../../include_login/conexao.php';
$comando = "UPDATE noticias SET invalido = 'n' WHERE ID_Noticia LIKE '$add'";







?>




<div id="msg">
    <div id="img_valida_noticia"></div>
    <h1>Enviando dados para o banco</h1> <br>
    <h2>Postando no site </h2><br>

<?php
//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");

//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");

//executando comando SQL
$resultado= mysql_query($comando) or die("Erro ao executar comando");//retorna os dados
?>
</div>


<?php



echo "<meta http-equiv='refresh' content='0;URL=noticias_index.php'>";
?>
</body>
</html>