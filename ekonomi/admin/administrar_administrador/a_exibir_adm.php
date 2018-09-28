<?php
@session_start();
include"../funcoes.php";

$SecLev =  $_SESSION["SecLev"];
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



<center>
    <div id="conteudo">
    <?php
    if($SecLev == 1 or $SecLev == 2) {
        echo '
    <form action="index_adicionar_adm.php">
        <input type="submit" class="adicionar_adm" value="">
    </form>
';
    }
?>
<?php
if($SecLev == 1 or $SecLev == 2 or $SecLev == 3) {
    include'codigo_pesquisa_adm.php';
}
else{
    acessoNegado();
}



     

echo'
</div>
';
?>
</center>









</body>
</html>
