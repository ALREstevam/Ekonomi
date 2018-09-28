<html>
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../_css/enviando.css">


</head>
<body>

<?php
include"../../include_login/conexao.php";


$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
$fonte = $_POST["fonte"];

$datatxt = $_POST["datatxt"];
$datasql = $_POST["datasql"];

$nomeadm = $_POST["nomeadm"];

$idadm = $_POST["idadm"];
//$nomeadm = $_POST["nomeadm"];


$titulo = str_replace("'","''",$titulo);
$texto = str_replace("'","''",$texto);
$fonte = str_replace("'","''",$fonte);




$comando = "INSERT INTO noticias (ADM_ID_ADM, Titulo, Texto, Fonte, Data_sql, Data_txt) VALUES('$idadm', '$titulo', '$texto', '$fonte', '$datasql', '$datatxt')";

?>


<div id="msg">
    <div id="img_adicionar_noticia"></div>
    <h1>Enviando dados para o banco</h1> <br>
    <h2>Salvando</h2><br>



<?php
//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");

//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");

//executando comando SQL
$resultado= mysql_query($comando) or die("Erro ao executar comando");//retorna os dados

echo"</div>";


echo "<meta http-equiv='refresh' content='1;URL=noticias_index.php'>";



?>

</body>
</html>