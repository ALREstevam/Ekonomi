<?php
@session_start();
include"../funcoes.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../include_enviar/cadastrar.js"></script>

    <link rel="stylesheet" type="text/css" href="../../estilos/stylesheet_formatacao_de_input.css">

    <link rel="stylesheet" type="text/css" href="../_css/alterar_usuario.css">

</head>


<body style="background-color: #E0E9E3; padding: -10px">
<center>




    <section id="conteudo" class="conteudo" style="width: 100%; margin-left: 0px; border: none; background-color: #E0E9E3;">
        <h1 style="font-family: Arial, sans-serif; font-size: 18pt;">Atualizar Administrador</h1>






        <input type="text" name="nome_adm" id="cNome" placeholder="Nome do administrador" maxlength="50" class="texto" value="'.$Nome_ADM.'" hidden="hidden">
        <input type="text" name="email_adm" id="cEmail" placeholder="E-mail do administrador" maxlength="50" class="texto"  value="'.$Email_ADM.'" hidden="hidden">
        <input type="password" name="senha_adm" id="cSenha" placeholder="Senha" maxlength="50" class="texto"  value="" hidden="hidden">
        <input type="text" name="id_adm" id="" placeholder="Senha" maxlength="50" class="texto"  value="'.$ID_ADM_FRBD.'" hidden="hidden">






        <?php

    include "../../include_login/conexao.php";


$id_adm_POST = $_POST['id_adm'];
$nome_adm_POST = $_POST['nome_adm'];
$email_adm_POST = $_POST['email_adm'];
$senha_adm_POST = $_POST['senha_adm'];
$LevelSec = $_POST['LevelSec'];

if (array_key_exists("continuar", $_POST)) {
    $teste_senha = md5($_POST['teste_senha']);
}

$comando="SELECT * FROM adm WHERE ID_ADM LIKE '$id_adm_POST' ";

$resultado= mysql_query($comando) or die("Falha na consulta <br>".mysql_error());

$num = mysql_num_rows($resultado);
//Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
if($num > 0) {
    //Retorna os dados do banco
    $rst_cons = mysql_fetch_array($resultado);

    $ID_ADM_FRBD = $rst_cons["ID_ADM"];
    $Nome_ADM = $rst_cons["Nome_ADM"];
    $Email_ADM = $rst_cons["Email_ADM"];
    $Senha_ADM = $rst_cons["Senha_ADM"];

}
       // $Senha_ADM = md5($Senha_ADM);               //SENHA DO BANCO
      //  $senha_adm_POST = md5($senha_adm_POST);       //NOVA SENHA
      //  $teste_senha = md5($teste_senha);           //TESTE DA SENHA

/*
  echo"
     SENHA VERDADIRA------: $Senha_ADM<br>
     SENHA NOVA-----------: $senha_adm_POST<BR>
     SENHA DE CONFIRMAÇÃO-: $teste_senha<br>
      ";
*/





echo'
<form action="" method="post">


<label for="cSenha">Digite a senha original de '.$nome_adm_POST.':</label>
<input type="password" name="teste_senha" id="cSenha" placeholder="Senha" maxlength="50" class="texto"  value="">

        <input type="text" name="nome_adm" id="cNome" maxlength="50" class="texto" value="'.$nome_adm_POST.'" hidden="hidden">
        <input type="text" name="email_adm" id="cEmail" maxlength="50" class="texto"  value="'.$email_adm_POST.'" hidden="hidden">
        <input type="text" name="senha_adm" id="cSenha"  maxlength="50" class="texto"  value="'.$senha_adm_POST.'" hidden="hidden">
        <input type="text" name="id_adm"       id="id_adm" maxlength="50" class="texto"  value="'.$id_adm_POST.'" hidden="hidden">
            <input type="text" name="LevelSec"       id="$LevelSec" maxlength="50" class="texto"  value="'.$LevelSec.'" hidden="hidden">



 <button type="submit" value="" class="botao" name="continuar" id="continuar" style="margin-left: 0px; width: 300px;">Continuar</button>
 </form>
';

if(empty($teste_senha)){
    echo'<div id="respota_validar">
    <p style="color: #ee493d">*Campo não preenchido</p>
    </div>';
}
else {

    include"../senha_padrao.php";


    if ($teste_senha == $Senha_ADM or $teste_senha==$senha_padrao_md5) {
        echo'<div id="respota_validar">
    <p style="color: #0dcd0f">*As senhas conferem</p>
    </div>';



        if(empty($senha_adm_POST)){
            $comando = "UPDATE adm SET Email_ADM='$email_adm_POST', Nome_ADM='$nome_adm_POST', Nivel_ADM='$LevelSec' WHERE ID_ADM = '$ID_ADM_FRBD' ";
        }
        else{


            $comando = "UPDATE adm SET Email_ADM='$email_adm_POST', Senha_ADM='".md5($senha_adm_POST)."', Nome_ADM='$nome_adm_POST', Nivel_ADM='$LevelSec'  WHERE ID_ADM = '$ID_ADM_FRBD' ";

        }












        $result = mysql_query($comando) or die ("Erro ao gravar dados <br>");


        echo'<p style="color: #0dcd0f">*Gravando alterações no banco de dados...</p>';
        echo"<meta http-equiv='refresh' content='3;URL=editar_adm.php'>";








    }

    else{
            echo'<div id="respota_validar">
    <p style="color: #ee493d">*As senhas não conferem</p>
    </div>';
        }



}




?>

</body>
</html>


