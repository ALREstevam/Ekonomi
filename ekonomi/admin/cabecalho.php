<?php
@session_start();
/*
$_SESSION["Email_ADM"]	= $Email;
$_SESSION["Nome_ADM"]	= $Nome;
*/

$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];


if($Email_adm == null){



    header("Location:../index.php");

}


?>
<html>
<head>
    <link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
    <title>Ekonomi - Administrador</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../_css/adm_logado_stylesheet.css">



    <link rel="stylesheet" type="text/css" href="../_css/menu_lateral.css">
</head>
<body>


<?php
include'../menu_lateral.php';
?>


<div id="topo">

    <div class="email_adm">
        <?php echo'    '.$Email_adm.' '; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>




    <div class="nome_adm">


       <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
        <?php echo'Olá, '.$Nome_adm.''; ?>
    </div>
</div>







<div id="menu">


    <nav id="menu">


        <?php

        include "../menu.php";

        ?>


    </nav>


    <form action="../destroiadm.php" id="formsair" name="formsair">
        <button type="submit" class="sair" style="border-style: none; background-color: #DF0226; cursor: pointer; padding: 0px; margin: 0px; border: 0px"><img src="../_imagens/power_shut_down.png" id="sair" onclick="document.formsair.submit();" style="width: 90px; height: 90px"></button>
    </form>
</div>