<link type="text/css" href="../_css/adm_logado_stylesheet.css

"

<?php


@session_start();

$id = $_POST['userid'];

include "../../include_login/conexao.php";




$Email = $id.'@INATIVO.EKONOMI';
$Senha = 'INATIVO_INATIVO';
$Nome = $id.' :__INATIVO_INATIVO_INATIVO';
$Cidade = "";
$Pais = "";
$Endereco = "";
$CEP = "";
$CPF = "";
$Sexo = "masculino";
$Celular ="";
$Estado_Civil = "Solteiro";
$Foto = "imagens/users1.png";

$comando = "UPDATE usuario SET Email='$Email', Senha='$Senha', Nome='$Nome', Cidade='$Cidade', Pais='$Pais', Endereco='$Endereco', CEP='$CEP', CPF='$CPF', Sexo='$Sexo', Celular='$Celular', Estado_Civil='$Estado_Civil', Foto='$Foto' WHERE ID_Usuario = '$id' ";
$result = mysql_query($comando) or die ("Erro ao gravar dados<br>   ");




mysql_close($conn);




echo'
<center>
<h1>A conta foi excluída</h1>
</center>
';

echo "<meta http-equiv='refresh' content='2;URL=alterar_usuario.php'>";

?>
<meta http-equiv='refresh' content='5;URL='>