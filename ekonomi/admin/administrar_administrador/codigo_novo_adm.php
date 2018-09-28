




<meta charset="utf-8">
<?php

@session_start();
$SecLev =  $_SESSION["SecLev"];



$erro = false;

$nome_adm = $_POST['novo_adm_nome'];
$email_adm = $_POST['novo_adm_email'];
$senha_adm = $_POST['novo_adm_senha'];
$LevelSec = $_POST['LevelSec'];


/*echo$_POST['LevelSec'];
echo" <BR> $LevelSec <BR> ";
*/


include "../../include_login/conexao.php";


$comando_pesquisa = "SELECT Email_ADM FROM adm";
$resultado = mysql_query($comando_pesquisa) or die("Erro ao executar pesquisa");//retorna os dados
while($linha=mysql_fetch_array($resultado)) {


    $pesquisa_email = $linha[0];
    if($pesquisa_email == $email_adm){
        $erro = true;
    }

}


if(empty($nome_adm)){
    echo'<h1>Campo nome incompleto</h1>';
    echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
}

else if(empty($email_adm)){
    echo'<h1>Campo e-mail incompleto</h1>';
    echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
}

else if(empty($senha_adm)){
    echo'<h1>Campo senha incompleto</h1>';
    echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
}



else if($erro == true){
    echo'<h1>Email já cadastrado</h1>';
    echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
}
else if($LevelSec < 1 OR $LevelSec > 4){
    echo'<h1>Erro 1 no nível de segurança</h1>';
    echo "<meta http-equiv='refresh' content='9;URL=index_adicionar_adm.php'>";
}







else {

        include "../../include_login/conexao.php";



        $comando = "INSERT INTO adm (Nome_ADM, Email_ADM, Senha_ADM, Nivel_ADM) VALUES('$nome_adm', '$email_adm','".md5($senha_adm)."' , '$LevelSec')";
        $resultado = mysql_query($comando) or die("Erro ao executar comando");//retorna os dados


        echo '<h1>Enviando informações para o banco... <br>Criando nova conta de administrador</h1> <br>';


        echo "<meta http-equiv='refresh' content='2;URL=index_adicionar_adm.php'>";




}







?>