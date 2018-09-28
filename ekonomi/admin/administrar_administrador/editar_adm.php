<?php
@session_start();
include"../funcoes.php";
$SecLev =  $_SESSION["SecLev"];

if($SecLev == 1) {



?>

<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../include_enviar/cadastrar.js"></script>

    <link rel="stylesheet" type="text/css" href="../../estilos/stylesheet_formatacao_de_input.css">

    <link rel="stylesheet" type="text/css" href="../_css/alterar_usuario.css">

    <style>
        .botao_excluir_adm{
            background-color: #c50507;

            color:#ffffff;
            border:hidden;

            width:100px;
            height:40px;

            margin: 10px;

            font-family:Arial, sans-serif;
            font-size:20px;
            border-radius:5px;

            outline:none;

            box-shadow: 2px 2px 2px rgba(16, 16, 16, 0.58);

            transition: box-shadow 0.5s;
        }

        .botao_excluir_adm:hover{

            background: #df2a1e;
            cursor:pointer;
            box-shadow: 0px 1px 10px rgba(204, 31, 16, 0.50);
        }

    </style>


</head>


<body style="background-color: #E0E9E3; padding: -10px">
<center>




<section id="conteudo" class="conteudo" style="width: 100%; margin-left: 0px; border: none; background-color: #E0E9E3;">
    <?php
    include "../../include_login/conexao.php";

    echo'<!--';
    $id_adm = $_POST['id_adm'];
    echo'-->';



    if(empty($id_adm)){
        $id_adm = '1';
    }



    //echo"<script> alert(' $Email_consulta '); </script>";



    $comando="SELECT * FROM adm WHERE ID_ADM LIKE '$id_adm' ";

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
    $Nivel_ADM = $rst_cons["Nivel_ADM"];

        $chk1 = "";
        $chk2 = "";
        $chk3 = "";
        $chk4 = "";


        if($Nivel_ADM == "1"){
            $chk1 = "selected";
        }
       else if($Nivel_ADM == "2"){
            $chk2 = "selected";
        }
       else if($Nivel_ADM == "3"){
            $chk3 = "selected";
        }
        else if($Nivel_ADM == "4"){
            $chk4 = "selected";
        }



    }

    echo"<p>Nome: $Nome_ADM<br> ID: $ID_ADM_FRBD</p>";


    if(isset($Nome_ADM)){
        // echo"<meta http-equiv='refresh' content='0;URL=editar_adm.php'>";

    }
    else{
        echo"<meta http-equiv='refresh' content='0;URL=editar_adm.php'>";
    }





    echo'


<form action="codigo_salvar_adm.php" method="post">
<fieldset id="adm">
    <legend> Administrdores:</legend>

    <label for="cNome">Nome:</label>
    <input type="text" name="nome_adm" id="cNome" placeholder="Nome do administrador" maxlength="25" class="texto" value="'.$Nome_ADM.'" autocomplete="off">

    <label for="cEmail">E-mail:</label>
    <input type="text" name="email_adm" id="cEmail" placeholder="E-mail do administrador" maxlength="50" class="texto"  value="'.$Email_ADM.'" autocomplete="off">

    <label for="cSenha">Senha:</label>
    <input type="password" name="senha_adm" id="cSenha" placeholder="Senha" maxlength="50" class="texto"  value="" autocomplete="off">

             <p>    <label for="LevelSec">Nível:</label>
            <select name="LevelSec" id="LevelSec" class="texto">
                <option value="1" '.$chk1.'>Administrador Nível 1</option>
                <option value="2" '.$chk2.'>Administrador Nível 2</option>
                <option value="3" '.$chk3.'>Administrador Nível 3</option>
                <option value="4" '.$chk4.'>Administrador Nível 4</option>

                </select>

    <input type="text" name="id_adm" id="" placeholder="Senha" maxlength="50" class="texto"  value="'.$ID_ADM_FRBD.'" hidden="hidden">



</fieldset>

 <button type="submit" value="'.$ID_ADM_FRBD.'" class="botao" style="margin-left: 0px; width: 300px; font-size: 19pt;">Salvar</button>
 </form>

 <form action="codigo_excluir_adm.php" method="post">
  <button type="submit" value="'.$ID_ADM_FRBD. '" class="botao" style="margin-left: 0px; width: 300px; background-color: #dd230d;  font-size: 19pt;" name="adm_id">Excluir</button>
 </form>
';


?>
</body>
</html>

<?php
}
else{
    acessoNegado();
}
?>

