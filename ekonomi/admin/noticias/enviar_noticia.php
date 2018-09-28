<html>
<head>
    <link rel="stylesheet" type="text/css" href="../_css/enviando.css">


    <meta charset="utf-8">



</head>
<body>





<?php
include"../../include_login/conexao.php";

$id_noticia = $_POST["edit"];


$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
$fonte = $_POST["fonte"];

$datatxt = $_POST["datatxt"];
$datasql = $_POST["datasql"];
//$nomeadm = $_POST["nomeadm"];


//echo"$titulo<br>$texto<br>$fonte<br>$datasql<br>$datatxt<br>";

$titulo = str_replace("'","''",$titulo);
$texto = str_replace("'","''",$texto);
$fonte = str_replace("'","''",$fonte);



$comando = "UPDATE noticias SET Titulo='$titulo', Texto='$texto', Fonte='$fonte', Data_sql='$datasql', Data_txt='$datatxt'  WHERE ID_Noticia LIKE $id_noticia";
?>
<div id="msg">
    <div id="img_salvando_noticia"></div>
<h1>Enviando dados para o banco...</h1> <br>
     <h2>Salvando essa postagem</h2><br>


<?php


//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("<h2>Falha na conexão</h2><br>");
//selecionando o banco de dados
mysql_select_db($banco) or die("<h2>Não foi possível selecionar o Banco</h2><br>");
//executando comando SQL

// $resultado= mysql_query($comando) or die("<h2>Erro ao executar comando</h2><br>"+mysql_error());//retorna os dados
$resultado= mysql_query($comando) or die(mysql_error());//retorna os dados

?>
</div>


<?php


echo "<meta http-equiv='refresh' content='1;URL=noticias_index.php'>";


?>

</body>
</html>