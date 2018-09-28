


<html>
<header>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>

        @font-face {
            font-family: RobotoRegular;
            src: url('../estilos/fonts/Roboto-Regular.ttf');
        }

        @font-face {
            font-family: RobotoThin;
            src: url('../estilos/fonts/Roboto-Thin.ttf');
        }


        .fine{
            font-family: RobotoThin, Arial, sans-serif
        }


    </style>

</header>
<body bgcolor="13171C">


<?php


include'../include_login/conexao.php';


    $Nome=$_POST["tNome"];
    $Email=$_POST["tEmail"];
    $Senha=$_POST["tSenha"];
    $ConfSenha=$_POST["tConfSenha"];
    $CPF=$_POST["tCPF"];
    $Celular=$_POST["tCelular"];


    $Cidade=$_POST["tCidade"];
    $Endereco=$_POST["tEndereco"];
    $CEP=$_POST["tCEP"];
    $Pais=$_POST["tPais"];

    $A_sexo=$_POST["tSexo"];
    $A_Estado=$_POST["tEstado_civil"];
    $A_Foto=$_POST["tImagem"];


$Nome = str_replace("=,>,<", "_", $Nome);
$Email = str_replace("=,>,<", "_", $Email);
$Senha = str_replace("=,>,<", "_", $Senha);
$ConfSenha = str_replace("=,>,<", "_", $ConfSenha);
$CPF = str_replace("=,>,<", "_", $CPF);
$Celular = str_replace("=,>,<", "_", $Celular);

$Cidade = str_replace("=,>,<", "_", $Cidade);
$Endereco = str_replace("=,>,<", "_", $Endereco);
$CEP = str_replace("=,>,<", "_", $CEP);
$Pais = str_replace("=,>,<", "_", $Pais);

$A_sexo = str_replace("=,>,<", "_", $A_sexo);
$A_Estado = str_replace("=,>,<", "_", $A_Estado);
$A_Foto = str_replace("=,>,<", "_", $A_Foto);












$ERRO = 0;
$err_foto = 'n';


//DEFINE O SEXO
if($A_sexo == "m")
{$Sexo = "masculino";}

else
{$Sexo = "feminino";}




//DEFINE O ESTADO CIVIL
if($A_Estado == "Casado")
{$Estado_Civil = "Casado";}

else if($A_Estado == "Viuvo")
{$Estado_Civil = "Viuvo";}

else if($A_Estado == "Divorciado")
{$Estado_Civil = "Divorciado";}

else
{$Estado_Civil = "Solteiro";}


//DEFINE O CAMINHO DA FOTO
if($A_Foto == '1'){
    $Foto = "imagens/users1.png";
}
else if($A_Foto == '2'){
    $Foto = "imagens/users2.png";
}
else if($A_Foto == '3'){
    $Foto = "imagens/users3.png";
}



else if($A_Foto == '4'){
    $Foto = "imagens/users7.png";
}
else if($A_Foto == '5'){
    $Foto = "imagens/users4.png";
}
else if($A_Foto == '6'){
    $Foto = "imagens/users5.png";
}



else if($A_Foto == '7'){
    $Foto = "imagens/users8.png";
}
else if($A_Foto == '8'){
    $Foto = "imagens/users9.png";
}
else if($A_Foto == '9'){
    $Foto = "imagens/users10.png";
}
else{
    $err_foto = 's';
}





echo'<div id="informacao" style="background-color: #ffffff;" >';

echo'

        <h1> GRAVANDO DADOS... </h1>

<table style="width:50%">
  <tr>
    <td> Nome: </td>
    <td>'.$Nome.'</td>

  </tr>
  <tr>
    <td> E-mail:</td>
    <td>'.$Email.'</td>

  </tr>
  <tr>
    <td>CPF:</td>
    <td>'.$CPF.'</td>

  </tr>


  </tr>
  <tr>
    <td>Cidade:</td>
    <td>'.$Cidade.'</td>

  </tr>


  </tr>
  <tr>
    <td>Endereço:</td>
    <td>'.$Endereco.'</td>

  </tr>


  </tr>
  <tr>
    <td> CEP: </td>
    <td>'.$CEP.'</td>

  </tr>


  </tr>
  <tr>
    <td> País:  </td>
    <td> '.$Pais.'</td>

  </tr>

  </tr>
  <tr>
    <td> Sexo:</td>
    <td>'.$Sexo.'</td>

  </tr>

  </tr>
  <tr>
    <td> Estado Civil: </td>
    <td>'.$Estado_Civil.'</td>

  </tr>







</table>
<br><br><br><br><br><br>
<h2>Verificando possíveis erros...</h2>
<br>
<br>

';
//selecionando o banco de dados


$pesquisa_conta="SELECT Email FROM usuario  WHERE Email = '$Email' ";
$resultado_conta= mysql_query($pesquisa_conta) or die("Falha na consulta de e-mail");


$num = mysql_num_rows($resultado_conta);

echo "<table style='width:50%'>";
echo "<tr>";
echo "<td>Email:</td>";


//enquanto houver registros do resultado, exibi-los
while($linha=mysql_fetch_array($resultado_conta)){
    $mail=$linha[0];


    echo "<td>$mail</td>";
    echo "</tr>";
}
echo "</table>";



if($num > 0){
    $ERRO=$ERRO + 1;
if($mail == $Email){
    echo'Já foi criada uma conta com este E-mail<br>   ';
    $ERRO=$ERRO + 1;
}
}

if($err_foto == 's'){
    echo'O valor escolhido para imagem é inválido<br>   ';
    $ERRO=$ERRO+1;

}



if($Senha != $ConfSenha) {

    $ERRO=$ERRO + 1;

    echo'As senhas não conferem<br>   ';
}
if ($Nome==null || $Email==null || $Senha==null || $ConfSenha==null  || $CPF==null) {

    $ERRO=$ERRO + 1;
    echo 'Campos requisitados não foram preenchidos<br>   ';

}
if ($Nome=="" || $Email==""|| $Senha=="" || $ConfSenha=="" || $CPF=="") {

    $ERRO=$ERRO + 1;
    echo 'Campos requisitados não foram preenchidos<br>   ';

}







if($ERRO == 0) {
    $comando = "INSERT INTO usuario (Email, Senha, Nome, Cidade, Pais, Endereco, CEP, CPF, Sexo, Celular, Estado_Civil, Foto) VALUES('$Email', '".md5($Senha)."', '$Nome', '$Cidade', '$Pais', '$Endereco', '$CEP', '$CPF', '$Sexo', '$Celular', '$Estado_Civil','$Foto')";


    $result = mysql_query($comando) or die ("Erro ao gravar dados<br>   ");  ;

    echo'Nenhum erro encontrado, redirecionando para página inicial <br>
         Você já pode efetuar o login <br>';
   // echo"<script> alert('Cadastro Realizado com sucesso'); </script>";

echo'</div>';
    echo'
<script>

     document.getElementById("informacao").style.visibility = "hidden";

    </script>

    <div style="width: 100%; height: 100%; background-color: #13171C; color: lawngreen;  vertical-align: middle; text-align: center; float: left; margin-top: -600px; z-index:999; overflow: auto" >
   <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
   <h1 style="font-size: 50pt;" class="fine">Cadastro realizada com sucesso :)</h1>
   <h1 style="font-size: 30pt;" class="fine">Voltando<br>
      <img src="../imagens/loadingw81.GIF" style="width:60px; height: 60px;" >
    </div>
    ';


    mysql_close($conn);
    echo "<meta http-equiv='refresh' content='5;URL=../index.php'>";
 //   header("Location:../index.php");




   }

else{
    mysql_close($conn);

    echo'Redirecionando para página de cadastro <br>';

    echo "<meta http-equiv='refresh' content='5;URL=../cadastro.php'>";
}




echo'</body>
</html>';




















?>