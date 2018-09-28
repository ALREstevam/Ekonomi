<?php
@session_start();
include"../funcoes.php";
$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];


if($Email_adm == null){



    header("Location:../../index.php");

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
    <body onload="myFunction();">




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


echo'<!--';

            $gravar = $_POST["gravar"];
            $set = $_POST["set"];
            echo'-->';
            $id_noticia = $_POST["edit"];







            include "../../include_login/conexao.php";

            $id_noticia = $_POST["edit"];

            echo'
            <input type="text" value="'.$id_noticia.'" name="edit" hidden="hidden">
            ';

            //CÓDIGO SQL
            $comando = "SELECT * FROM noticias WHERE ID_Noticia LIKE '$id_noticia' ORDER BY Data_sql DESC ";

            mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");
            mysql_select_db($banco) or die("Não foi possível selecionar o Banco");
            $resultado= mysql_query($comando) or die(mysql_error($comando));//retorna os dados


            while($linha=mysql_fetch_array($resultado)){


                $idnoticia = $linha[0];
                $idadm = $linha[1];
                $titulo = $linha[2];
                $texto = $linha[3];
                $fonte = $linha[4];
                $data_sql = $linha[5];
                $data_txt = $linha[6];
                $invalido = $linha[7];


                $sql_nome_edit = "SELECT Nome_ADM FROM adm WHERE ID_ADM LIKE '$idadm'";
                //echo"$idadm<br>";
                $rs_nomeadm = mysql_query($sql_nome_edit) or die(mysql_error($sql_nome_edit));

                while($linha=mysql_fetch_array($rs_nomeadm)) {


                    $nome_adm = $linha[0];

                }}
?>








<center>
    <div id="conteudo" style="min-height: 180%;">


        <script src="../funcoesetc/funcoes_criar_noticia_botaopassa.js">
        </script>


        <input type="submit" class="return" value="" onclick="window.location.href = 'noticias_index.php';">


        <a href="enviarFotosIndex.php" target="_blank" class="addimgbtn"></a>

        <input type="button" class="pbtn" onclick="botaop();">
        <input type="button" class="imgbtn" onclick="botaoimg();">

        <form name="setar" action="enviar_noticia.php" method="post">
            <input type="submit" value="" name="gravar" class="record">
            <center> <input type="button" onclick="myFunction();" value="" name="set" class="set"></center>











            <div id="caixas" style="width: 100%; min-height: 1000px ; float: left; ">



                <!-- -

                 <textarea name="titulo" id="titulo" class="inputtxt">' . $titulo . '</textarea><br>
       <textarea name="texto" id="texto">'.$texto .'</textarea><br>
       <textarea name="fonte" id="fonte" class="inputtxt">'.$fonte.'</textarea><br>
                -->

                <input type="text" value="<?php echo$id_noticia;?>" name="edit" hidden="hidden">


                <div style="width: 49%; float: left;">
                    <textarea name="titulo" id="titulo" class="inputtxt" placeholder="Título" onkeypress="myFunction()" onclick="myFunction()" onkeydown="myFunction()" onmousemove="myFunction()"> <?php echo$titulo; ?></textarea><br>
                    <textarea name="texto" id="texto" placeholder="Conteúdo" onkeypress="myFunction()" onclick="myFunction()" onkeydown="myFunction()" onmousemove="myFunction()"" ><?php echo$texto; ?></textarea><br>
                    <textarea name="fonte" id="fonte" class="inputtxt" placeholder="Link da Fonte" onkeypress="myFunction()" onclick="myFunction()" onkeydown="myFunction()" onmousemove="myFunction()""><?php echo$fonte; ?></textarea><br>
                </div>



                <div style=" width: 49%; float: right">
                    <div id="setado" style="text-align: left"></div>
                </div>
            </div>




            <input type="text" id="datasql" name="datasql" value="" hidden="hidden">
            <input type="text" id="datatxt" name="datatxt" value="" hidden="hidden">
           <input type="text" id="nomeadm" name="nomeadm" value=" <?php echo$nome_adm;?>" hidden="hidden">



            <?php


            echo'
<input type="text" id="nomeadm" name="nomeadm" value="'.$Nome_adm.'" hidden="hidden">



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


