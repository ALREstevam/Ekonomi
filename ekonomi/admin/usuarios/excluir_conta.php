<?php
 @session_start();
$id = $_SESSION["userid"];


?>

<meta charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../estilos/stylesheet_formatacao_de_input.css">



<section id="conteudo" class="conteudo">
<h1>Excluir conta</h1>
    <p>
        Realmente deseja excluir sua conta? Seus dados se tornarão Inacessíveis!
    </p>


<form action="excluir_conta_codigo.php" id="excluir_conta_def" method="post">
    <center>

        <?php
        echo'

        <input type="text" value="'.$id.'" id="userid" name="userid" hidden="hidden" >


        ';

        ?>

        <input type="submit" value="Voltar" class="botao" onclick="javascript:history.go(-1)" style="width: 200px";>
        <input type="submit" value="Excluir Conta" class="botao" style="width: 200px";>


    </center>
</form>

<!--
style="font-size: 20px; color: #d20002;"
-->

</section>