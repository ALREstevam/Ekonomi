<html>
<head>
    <style>
        @font-face {
            font-family: RobotoRegular;
            src: url('../../estilos/fonts/Roboto-Regular.ttf');
        }

        @font-face {
            font-family: RobotoThin;
            src: url('../../estilos/fonts/Roboto-Thin.ttf');
        }



        body{
            background-image: url("../_imagens/comment.png");
            background-size: cover;
        }

        h1{
            color: #f7f7f7;
            font-family: RobotoThin, Arial, sans-serif;
            font-size:30pt;
            text-align: center;
        }

        h2{
            color: #f7f7f7;
            font-family: RobotoThin, Arial, sans-serif;
            font-size:25pt;
            text-align: center;
        }
        h3{
            color: #f7f7f7;
            font-family: RobotoThin, Arial, sans-serif;
            font-size:18pt;
            text-align: left;

        }
        div#msg{
            width: 700px;
            height: 300px;
            background-color: rgba(16, 26, 47, 0.75);
            border: solid #0096de 4px;

            border-top-left-radius: 9%;

            position:absolute;
            top:50%;
            margin-top:-150px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
            left:50%;
            margin-left:-350px; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
        }
        div#img{
            width: 90px;
            height: 90px;
            border-radius: 100%;
            background-color: #3dbcd4;
            margin-left: -10px;
            margin-top: -10px;

            background-image: url("../_imagens/Comment-add-icon.png");
            background-size: 50px;
            background-position: center;
            background-repeat: no-repeat;
        }


    </style>


    <meta charset="utf-8">



</head>
<body>


<?php

$postar = $_POST["postar"];


include'../../include_login/conexao.php';

$comando = "UPDATE contato SET Postado = 's' WHERE ID_Contato LIKE $postar";
?>


<div id="msg">
    <div id="img"></div>
    <h1>Enviando dados para o banco...</h1> <br>
    <h2>Postando no site </h2><br>




<?php



//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");

//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");

//executando comando SQL
$resultado= mysql_query($comando) or die("Erro ao executar comando");//retorna os dados

echo"</div>";


echo "<meta http-equiv='refresh' content='0;URL=comentarios_adm.php'>";
?>
</body>
</html>
