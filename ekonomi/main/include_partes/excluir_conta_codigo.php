<?php

@session_start();
$Email_sess = $_SESSION["Email"];

include"../../include_login/conexao.php";

function generateRandomString($length = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZEKONOMI';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$data = date('d/m/Y');
$hora = date('H:i:s');


$rndstr = generateRandomString();
$ID = generateRandomString();




$pesquisa_conta="SELECT ID_Usuario FROM usuario  WHERE Email = '$Email_sess' ";
$resultado_conta= mysql_query($pesquisa_conta) or die("Falha na consulta de e-mail");


$num = mysql_num_rows($resultado_conta);
//Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
if($num > 0) {
    //Retorna os dados do banco
    $rst_x = mysql_fetch_array($resultado_conta);

    $ID = $rst_x["ID_Usuario"];





$Email = $ID.'-'.$rndstr.'@INATIVO.EKONOMI';
$Senha = 'INATIVO_INATIVO';
$Nome = $ID.'-'.$rndstr.':__INATIVO_'.$data.'---'.$hora.'---INATIVO';
$Cidade = "";
$Pais = "";
$Endereco = "";
$CEP = "";
$CPF = "";
$Sexo = "masculino";
$Celular ="";
$Estado_Civil = "Solteiro";
$Foto = "imagens/users1.png";

$comando = "UPDATE usuario SET Email='$Email', Senha='$Senha', Nome='$Nome', Cidade='$Cidade', Pais='$Pais', Endereco='$Endereco', CEP='$CEP', CPF='$CPF', Sexo='$Sexo', Celular='$Celular', Estado_Civil='$Estado_Civil', Foto='$Foto' WHERE Email = '$Email_sess'";
$result = mysql_query($comando) or die ("Erro ao gravar dados<br>   ");



@session_destroy();
mysql_close($conn);




echo'
<center>
<h1>Sua conta foi excluida</h1>
</center>
';

echo "<meta http-equiv='refresh' content='5;URL=../../index.php'>";
}
else{

    echo'
<center>
<h1>Erro ao excluir</h1>
</center>
';

    echo "<meta http-equiv='refresh' content='5;URL=../../index.php'>";
}


?>