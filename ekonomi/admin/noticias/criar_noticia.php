<?php
@session_start();

include"../funcoes.php";

$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];
$ID_ADM = $_SESSION["ID_ADM"];


if($Email_adm == null or $SecLev > 4 or $SecLev < 1){
    header("Location:../index.php");

}


?>
<html>
<head>
    <link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
    <title>Ekonomi - Administrador</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../_css/adm_logado_stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../_css/noticias.css">

    <link rel="stylesheet" type="text/css" href="../_css/menu_lateral.css">
</head>
<body onload="myFunction(); BtnDivEnvia();">



<?php
include'../menu_lateral.php';
?>


<div id="topo">

    <div class="email_adm">
        <?php echo'    '.$Email_adm.' '; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <div class="nome_adm">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo'Olá, '.$Nome_adm.''; ?>
    </div>
</div>



<div id="menu">
    <nav id="menu">
        <?php
        include "../menu.php";
        ?>
        <form action="../destroiadm.php" id="formsair" name="formsair">
            <input type="submit" class="sair" value="">
        </form>
    </nav>


    <?php
    SecLev();
    ?>

</div>


    <?php
    include "../../include_login/conexao.php";


    ?>



















<center>
    <div id="conteudo" style="min-height: 180%;">


        <script src="../funcoesetc/funcoes_criar_noticia_botaopassa.js">
        </script>


        <input type="submit" class="return" value="" onclick="window.location.href = 'noticias_index.php';">



        <a href="enviarFotosIndex.php" target="_blank" class="addimgbtn"></a>



        <input type="button" class="imgbtn" onclick="botaoimg();">
        <input type="button" class="pbtn" onclick="botaop();">



        <form name="setar" action="adicionar_noticia.php" method="post">
            <input type="submit" value="" name="gravar" class="record">
            <center> <input type="button" onclick="myFunction();" value="" name="set" class="set"></center>











<div id="caixas" style="width: 100%; min-height: 1000px ; float: left; ">

<div style="width: 49%; float: left;">
       <textarea name="titulo" id="titulo" class="inputtxt" placeholder="Título" onkeypress="myFunction()" onclick="myFunction()" onkeydown="myFunction()" onmousemove="myFunction()"></textarea><br>
       <textarea name="texto" id="texto" placeholder="Conteúdo" onkeypress="myFunction()" onclick="myFunction()" onkeydown="myFunction()" onmousemove="myFunction()"" ></textarea><br>
       <textarea name="fonte" id="fonte" class="inputtxt" placeholder="Link da Fonte" onkeypress="myFunction()" onclick="myFunction()" onkeydown="myFunction()" onmousemove="myFunction()""></textarea><br>
</div>



            <div style=" width: 49%; float: right">
    <div id="setado" style="text-align: left"></div>
    </div>
</div>




<input type="text" id="datasql" name="datasql" value="" hidden="hidden">
<input type="text" id="datatxt" name="datatxt" value="" hidden="hidden">



            <?php


            echo'
<input type="text" id="nomeadm" name="nomeadm" value="'.$Nome_adm.'" hidden="hidden">
<input type="text" id="idadm" name="idadm" value="'.$ID_ADM.'" hidden="hidden">


';

            ?>



        </form>
        <div style="width: 100%; height: 1px; clear: left; background-color: transparent; "></div>
    </div>
</center>











            <script src="../funcoesetc/funcoes_criar_noticia.js">

            </script>


</body>
</html>












