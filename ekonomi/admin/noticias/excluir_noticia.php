<html>
<head>
    <link rel="stylesheet" type="text/css" href="../_css/enviando.css">

    <meta charset="utf-8">



</head>
<body>



<?php
$delete = $_POST["del"];


include'../../include_login/conexao.php';

$comando = "DELETE FROM noticias WHERE ID_Noticia LIKE '$delete'";


?>


<div id="msg">
    <div id="img_excluir_noticia"></div>
    <h1>Enviando dados para o banco</h1> <br>
    <h2>Deletando essa postagem</h2><br>

<?php
//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");

//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");

//executando comando SQL
$resultado= mysql_query($comando) or die("Erro ao executar comando");//retorna os dados


echo"</div>";

echo "<meta http-equiv='refresh' content='0;URL=noticias_index.php'>";
?>
</body>
</html>