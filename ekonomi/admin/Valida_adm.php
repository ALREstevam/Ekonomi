<?php


include'../include_login/conexao.php';
//echo"<script> alert('Testando Autenticaçao');  </script>";



echo'  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
// Recebemos os dados digitados pelo usu�rio
$login = $_POST['adm_email'];
$senha = $_POST['adm_senha'];






//Criamos o comando que efetua a busca do banco

// $sql = "SELECT id, nome FROM usuarios WHERE login = '$login' AND senha = '$senha'";

$sql = "SELECT * FROM `adm` WHERE Email_ADM = '$login' AND Senha_ADM = '".md5($senha)."'";

//Executamos o comando
$rs = mysql_query($sql) or die("Falha na consulta");



//Retornamos o numero de linhas afetadas
$num = mysql_num_rows($rs);
//Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
if($num > 0)
{
    //Retorna os dados do banco
    $rst = mysql_fetch_array($rs);

    $Email 	= $rst["Email_ADM"];
    $Nome 	= $rst["Nome_ADM"];
    $ID_ADM = $rst["ID_ADM"];
    $SecLev = $rst["Nivel_ADM"];





    //Inicia a sess�o
    session_start();
    //Registra os dados do usu�rio na sess�o
    $_SESSION["Email_ADM"]	= $Email;
    $_SESSION["Nome_ADM"]	= $Nome;
    $_SESSION["ID_ADM"]	= $ID_ADM;
    $_SESSION["SecLev"]	= $SecLev;








    // echo"<script>window.alert('bem-vindo(a) $nome');</script>";

    //Encerra a conex�o com o banco
    mysql_close($conn);

    //Redireciona para o index
    header("Location:usuarios/_usuario_index.php");




}
else
{
    //Encerra a conex�o com o banco
    mysql_close($conn);
    //Caso nenhuma linha seja retornada emite o alerta e retorna
   // echo"<script> alert('Usuário inválido') </script>";
   // echo "<b>Nenhum usuário foi encontrado com os dados informados...</b>";

    include'../erro_login.html';
    echo "<meta http-equiv='refresh' content='3;URL=index.php'>";

}



?>