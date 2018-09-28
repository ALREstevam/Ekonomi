
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
<center>
    <h1 style="font-family: Arial, sans-serif; font-size: 18pt;">Excluir Administrador</h1>
        <h2 style="font-family: Arial, sans-serif; font-size: 15pt; text-align: center; color: #ee493d;">Tem certeza de que quer continuar com isso?</h2>
</center>


<!--
        <input type="text" name="nome_adm" id="cNome" placeholder="Nome do administrador" maxlength="50" class="texto" value="'.$Nome_ADM.'" hidden="hidden">
        <input type="text" name="email_adm" id="cEmail" placeholder="E-mail do administrador" maxlength="50" class="texto"  value="'.$Email_ADM.'" hidden="hidden">
        <input type="password" name="senha_adm" id="cSenha" placeholder="Senha" maxlength="50" class="texto"  value="" hidden="hidden">
        <input type="text" name="id_adm" id="" placeholder="Senha" maxlength="50" class="texto"  value="'.$ID_ADM_FRBD.'" hidden="hidden">
-->





        <?php

        include "../../include_login/conexao.php";
        include "../senha_padrao.php";

        if (array_key_exists("adm_id", $_POST)) {
            $id_adm_POST = $_POST['adm_id'];

        }
        if (array_key_exists("excluirdevez", $_POST)) {
            $teste_senha = md5($_POST['teste_senha']);
        }

        $comando="SELECT * FROM adm WHERE ID_ADM LIKE '$id_adm_POST' ";

        $resultado= mysql_query($comando) or die("Falha na consulta <br>".mysql_error());

        $num = mysql_num_rows($resultado);
        echo $num;
        //Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
        if($num > 0) {
            //Retorna os dados do banco
            $rst_cons = mysql_fetch_array($resultado);

            $ID_ADM_FRBD = $rst_cons["ID_ADM"];
            $Nome_ADM = $rst_cons["Nome_ADM"];
            $Email_ADM = $rst_cons["Email_ADM"];
            $Senha_ADM = $rst_cons["Senha_ADM"];

        }









        echo'
<form action="" method="post">
<label for="cSenha">Digite a senha de '.$Nome_ADM.':</label>
<input type="password" name="teste_senha" id="cSenha" placeholder="Senha" maxlength="50" class="texto"  value="">


        <input type="text" name="adm_id" id="" placeholder="Senha" maxlength="50" class="texto"  value="'.$id_adm_POST.'" hidden="hidden">







 <button type="submit" value="" class="botao" style="margin-left: 0px; width: 300px;" name="excluirdevez">Continuar</button>
 </form>
';

        if(empty($teste_senha)){
            echo'<div id="respota_validar">
    <p style="color: #ee493d">*Campo não preenchido</p>
    </div>';
        }


        else {

            if($teste_senha == $senha_padrao_md5){
                echo'<div id="respota_validar">
    <p style="color: #0dcd0f">*Senha de redefinição utilizada</p>
    </div>';

                $comando = "DELETE FROM adm WHERE ID_ADM LIKE '$ID_ADM_FRBD'";
                $result = mysql_query($comando) or die ("Erro ao gravar dados<br>   ");


                echo'<p style="color: #0dcd0f">*Gravando alterações no banco de dados...</p>';
                echo"<meta http-equiv='refresh' content='3;URL=editar_adm.php'>";


            }




            else if ($teste_senha == $Senha_ADM) {
                echo'<div id="respota_validar">
    <p style="color: #0dcd0f">*As senhas conferem</p>
    </div>';

                $comando = "DELETE FROM adm WHERE ID_ADM LIKE '$ID_ADM_FRBD'";
                $result = mysql_query($comando) or die ("Erro ao gravar dados<br>   ");


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


