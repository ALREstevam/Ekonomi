<?php
@session_start();

include"../funcoes.php";
$SecLev =  $_SESSION["SecLev"];
$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];


if($Email_adm == null){



    header("Location:../../index.php");

}
if($SecLev == 1 or $SecLev == 2) {

    ?>
    <html>
    <head>
        <link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
        <title>Ekonomi - Administrador</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../_css/adm_logado_stylesheet.css">

        <link rel="stylesheet" type="text/css" href="../_css/menu_lateral.css">

        <script>
            function limpaform(){
                document.getElementById('cNome').value = "";
                document.getElementById('cEmail').value = "";
                document.getElementById('cSenha').value = "";
            }
        </script>

    </head>
    <body onload="limpaform();">







    <?php
    include '../menu_lateral.php';
    ?>


    <div id="topo">

        <div class="email_adm">
            <?php echo '    ' . $Email_adm . ' '; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>

        <div class="nome_adm">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo 'Olá, ' . $Nome_adm . ''; ?>
        </div>
    </div>


    <div id="menu">


        <nav id="menu">


            <?php

            include "../menu.php";

            ?>


            <form action="../destroiadm.php" id="formsair" name="formsair" autocomplete="off">
                <input type="submit" class="sair" value="">
            </form>
        </nav>


        <?php

        SecLev();

        ?>
    </div>


    <center>
        <div id="conteudo" style="height: 2000px">


            <section id="conteudo" class="conteudo"
                     style="width: 100%; margin-left: 0px; border: none; background-color: #E0E9E3;">
                <center><h1>Adicionar novo administrador</h1></center>

                <form action="" method="post" autocomplete="off">
                    <div style="display: none;">
                        <input type="text" id="PreventChromeAutocomplete"name="PreventChromeAutocomplete" autocomplete="address-level4"/>
                    </div>


                    <fieldset id="adm" style="width: 50%">
                        <legend> Formulário de cadastro:</legend>

                        <p><label for="cNome">Nome:</label>
                            <input type="text" name="novo_adm_nome" id="cNome" placeholder="Nome do administrador" maxlength="25" class="texto" value="" autocomplete="off">
                        </p>

                        <p><label for="cEmail">E-mail:</label>
                            <input type="email" name="novo_adm_email" id="cEmail" placeholder="E-mail do administrador" maxlength="25" class="texto" value="" autocomplete="off">
                        </p>

                        <p><label for="cSenha">Senha:</label>
                            <input type="password" name="novo_adm_senha" id="cSenha" placeholder="Senha" maxlength="50" class="texto" value="" autocomplete="off">

                        </p>

                        <p><label for="LevelSec">Nível:</label>
                            <select name="LevelSec" id="LevelSec" class="texto">


                                <?php
                                if($SecLev == 1){
                               echo' <option value="1">Administrador Nível 1</option>';
                                    }
                                ?>
                                <option value="2">Administrador Nível 2</option>
                                <option value="3">Administrador Nível 3</option>
                                <option value="4" selected>Administrador Nível 4</option>

                            </select>


                        </p>

                        <button type="submit" name="salvar" value="'.$ID_ADM_FRBD.'" class="botao" style="margin-left: 0px; width: 300px;">Salvar
                        </button>


                    </fieldset>


                    <script>
                        function mostrar() {
                            document.getElementById("informacao_nivel").style.visibility = "visible";
                        }

                        function tirar() {
                            document.getElementById("informacao_nivel").style.visibility = "hidden";
                        }






                    </script>


                    <div id="icon_info" onmouseover="mostrar();" onmouseout="tirar();">
                        <div id="informacao_nivel" onmouseout="tirar();">
                            <table border="0" cellpadding="5px" width="500px">


                                <tr>
                                    <td><img src="../_imagens/shield-1.png"></td>
                                    <td><span><b>Nível 1:</b> tem acesso total ao sistema, pode pesquisar, criar e alterar administradores, pesquisar e editar usuários, gerenciar comentários e notícias.  </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><img src="../_imagens/shield-2.png"></td>
                                    <td><span><b>Nível 2:</b> pode visualizar e gerenciar notícias e comentários, tem acesso à pesquisa de usuário, pode criar administradores até o nível 2. </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><img src="../_imagens/shield-3.png"></td>
                                    <td><b><span>Nível 3:</b> pode visualizar e gerenciar notícias e comentários, tem
                                        acesso à pesquisa de usuário, porém não pode alterar dados.</span></td>
                                </tr>

                                <tr>
                                    <td><img src="../_imagens/shield-4.png"></td>
                                    <td><span><b>Nível 4:</b> pode visualizar e gerenciar notícias apenas.</span></td>
                                </tr>


                            </table>


                        </div>
                    </div>
                </form>


                <?php
                if (array_key_exists("salvar", $_POST)) {


                    $erro = false;

                    $nome_adm = $_POST['novo_adm_nome'];
                    $email_adm = $_POST['novo_adm_email'];
                    $senha_adm = $_POST['novo_adm_senha'];
                    $LevelSec = $_POST['LevelSec'];


                    /*echo$_POST['LevelSec'];
                    echo" <BR> $LevelSec <BR> ";
                    */

                    if($SecLev <= $LevelSec) {
                        include "../../include_login/conexao.php";


                        $comando_pesquisa = "SELECT Email_ADM FROM adm";
                        $resultado = mysql_query($comando_pesquisa) or die("Erro ao executar pesquisa");//retorna os dados
                        while ($linha = mysql_fetch_array($resultado)) {


                            $pesquisa_email = $linha[0];
                            if ($pesquisa_email == $email_adm) {
                                $erro = true;
                            }

                        }


                        if (empty($nome_adm)) {
                            echo "<script>alert('Campo nome incompleto')</script>";
                            //   echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
                        } else if (empty($email_adm)) {
                            echo "<script>alert('Campo e-mail incompleto')</script>";
                            //   echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
                        } else if (empty($senha_adm)) {
                            echo "<script>alert('Campo senha incompleto')</script>";
                            //  echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
                        } else if ($erro == true) {
                            echo "<script>alert('Email já cadastrado')</script>";

                        } else if ($LevelSec < 1 OR $LevelSec > 4) {
                            echo "<script>alert('Erro 1 no nível de segurança')</script>";
                            // echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
                        } else {

                            include "../../include_login/conexao.php";


                            $comando = "INSERT INTO adm (Nome_ADM, Email_ADM, Senha_ADM, Nivel_ADM) VALUES('$nome_adm', '$email_adm','" . md5($senha_adm) . "' , '$LevelSec')";
                            $resultado = mysql_query($comando) or die("Erro ao executar comando");//retorna os dados


                            echo "<script>alert('Enviando informações para o banco... <br>Criando nova conta de administrador')</script>";


                            // echo "<meta http-equiv='refresh' content='2;URL=index_adicionar_adm.php'>";


                        }

                    }

                    else {
                        echo "<script>alert('Você não tem permissão para adicionar um usuário com este nível')</script>";
                        session_destroy();
                        echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";

                    }

                }

                ?>





            </section>
        </div>
    </center>


    </body>
    </html>





    <?php
}
else {
    acessoNegado();
}
    ?>