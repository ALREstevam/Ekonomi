<?php

@session_start();
include"../funcoes.php";

/*
$_SESSION["Email_ADM"]	= $Email;
$_SESSION["Nome_ADM"]	= $Nome;
*/

$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];
$SecLev =  $_SESSION["SecLev"];


if($SecLev == 4) {
    header("Location:../comentarios/comentarios_adm.php");
}




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



    <link rel="stylesheet" type="text/css" href="../_css/menu_lateral.css">
</head>
<body>


<?php
include'../menu_lateral.php';
?>



<div id="topo">

    <div class="email_adm">

        <?php echo'    '.$Email_adm.' '; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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


if($SecLev != 4) {
    include 'pesquisa_usuario_fonte.php';
}
else{
    acessoNegado();
}

?>

<?php

    if($SecLev == 1) {

    echo'<iframe src="alterar_usuario.php" name="iframe_alterar" style="width: 100%; height: 2000px; border: none;background-color: rgba(236, 246, 239, 0.93);" ></iframe>
    ';
    }
    else{
    acessoNegado();
    }
?>

</div>

</center>









</body>
</html>
