
<html>
<header>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>

        @font-face {
            font-family: RobotoRegular;
            src: url('../../estilos/fonts/Roboto-Regular.ttf');
        }

        @font-face {
            font-family: RobotoThin;
            src: url('../../estilos/fonts/Roboto-Thin.ttf');
        }


        .fine{
            font-family: RobotoThin, Arial, sans-serif
        }


    </style>

</header>
<body bgcolor="13171C">
<?php

include'../../include_login/conexao.php';



$Nome=$_POST["tNome"];
$Email=$_POST["tEmail"];
$Sexo=$_POST["tSexo"];
$Mensagem=$_POST["tComentario"];


$time_sqlf=$_POST["time_sqlf"];
$time_txtf=$_POST["time_txtf"];


echo'<!--';
$Postar=$_POST["tPostar"];
echo'-->';

if(empty($Postar)){
    $Postar = "n";
}





$ERRO = 0;





if($Nome==""){
    $ERRO=$ERRO+1;
    echo'Nome incompleto <br>';
}

if($Email==""){
    $ERRO=$ERRO+1;
    echo'E-mail incompleto <br>';
}

if($Sexo==""){
    $ERRO=$ERRO+1;
    echo'Gênero incompleto <br>';
}



if($Mensagem==""){
    $ERRO=$ERRO+1;
    echo'Mensagem com erro <br>';
}

/*
echo'

'.$Nome.'<br>
'.$Email.'<br>
'.$Mensagem.'<br>
'.$Sexo.'<br>
'.$ERRO.'<br>

';
*/




if($ERRO == 0){

/*
    $comando = "insert into usuario (Email, Senha, Nome,) values('$Email', '$Senha', '$Nome')";
    $result = mysql_query($comando) or die ("Erro ao gravar dados<br>   ");  ;

*/

    $comando="INSERT INTO contato (Nome, Email, Sexo, Texto, Data_SQL, Data_TXT, Postar) VALUES ('$Nome','$Email','$Sexo','$Mensagem','$time_sqlf','$time_txtf','$Postar')";
    $result = mysql_query($comando) or die("Falha ao enviar mensagem<br>".mysql_error()); ;



    echo'
<center>

   <div style="width: 100%; height: 100%; background-color: #13171C; color: lawngreen;  vertical-align: middle; text-align: center; float: left; margin-top: 0px; z-index:999; overflow: auto" >
   <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
   <h1 style="font-size: 50pt;" class="fine">Mensagem enviada com sucesso </h1>
   <h1 style="font-size: 30pt;" class="fine">Voltando<br>
      <img src="../imagens/loadingw81.GIF" style="width:60px; height: 60px;" >

   </h1>

    </div>


</center>


<br>';



   mysql_close($conn) or die ("Não é possivel fechar a conexão<br>".mysql_error());
    echo "<meta http-equiv='refresh' content='1;URL=../main_contato.php'>";


}

else{

    mysql_close($conn);
    echo'Erros foram encontrados<br>';


    echo "<meta http-equiv='refresh' content='5;URL=../main_contato.php'>";




}



//mysql_close($conn);




?>
</body>
</html>

