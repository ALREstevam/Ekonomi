<?php


@session_start();
$Email_sess = $_SESSION["Email"];


?>

<meta charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../estilos/stylesheet_formatacao_de_input.css">



<section id="conteudo" class="conteudo">
<h1>Excluir conta</h1>
    <p>
        Realmente deseja excluir sua conta? Seus dados se tornarão Inacessíveis!

    </p>
    <center>


    <form action="" method="post">
        <input type="password" class="texto" name="senhavalidar" id="senhavalidar"><br>
        <input type="submit" value="Validar senha" class="botao" name="valida" id="valida" style="width: 200px; margin-bottom: 0px";>
    </form>

    <?php

    if (array_key_exists("valida", $_POST)) {
        $Senha_enviada = $_POST["senhavalidar"];
        include"../include_login/conexao.php";


        $pesquisa_conta="SELECT Senha FROM usuario  WHERE Email = '$Email_sess' ";
        $resultado_conta= mysql_query($pesquisa_conta) or die("Falha na consulta de e-mail");


        $num = mysql_num_rows($resultado_conta);
        if($num > 0) {
            //Retorna os dados do banco
            $rst_x = mysql_fetch_array($resultado_conta);

            $Senha_bd = $rst_x["Senha"];


            //echo"$Email_sess<br>$Senha_enviada<br>$Senha_bd";
        }



if($Senha_enviada == $Senha_bd) {
    echo '
<form action="include_partes/excluir_conta_codigo.php" id="excluir_conta_def">


        <input type="submit" value="Excluir Conta" class="botao" style="width: 200px; margin-top: -30px";>


</form>
  ';
}
    else{
        echo"<p style='color: #df2a1e'>As senhas não conferem!</p>";
    }
    }
    ?>
<!--
style="font-size: 20px; color: #d20002;"
--></center>

</section>