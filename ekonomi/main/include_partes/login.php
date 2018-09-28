<!-- LOGIN -->
<!-- include_once("verifica.php"); -->

<?php
@session_start();
$Foto = $_SESSION["Foto"];

echo "

<style>


@font-face {
    font-family: RobotoRegular;
    src: url('../../estilos/fonts/Roboto-Regular.ttf');
}

@font-face {
    font-family: RobotoThin;
    src: url('../../estilos/fonts/Roboto-Thin.ttf');
}



div#fotologin_min{

    width:50px;
    height:50px;

    padding: 10px;
    margin-top: 4px;
    margin-left: 10px;

    position: relative;
    float: left;
    background-image: url('../$Foto');
    background-size: cover;


    background-color: rgb(49, 191, 223);
    border-radius: 100px;
    border-style: solid;

    border-color: rgb(213, 213, 213);
    border-width: 4px;

    margin-bottom: 5px;


    transition:  border 0.2s, background 0.5s;
}
div#fotologin_min:hover{

    border-color: rgba(213, 213, 213, 0.71);
    background-color: rgba(59, 226, 255, 0.94);
</style>


";




//include_once("../include_login/verifica.php");


if(isset($_SESSION["Email"])) {
   // header("location:../index.php");

    
}
else{

}

/*
 if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["login"]))
{
    echo'<script> alert("Acesso n�o autorizado"); </script>';
    Caso n?o exista dados registrados, exige login
    header("Location:../index.php");
}
*/


$nome_bug = $_SESSION["Nome"];


$nome = $nome_bug;
//$nome = utf8_encode($nome_bug);
//$nome = utf8_decode($nome_bug);

if(empty($nome_bug)){  header("Location:../index.php");
echo"<scipt> alert('Erro2');</scipt>";
}




echo'


<div id="login_logado">


<center>
<div style="min-width: 100px; max-width: 300px; float: right">
        <h1 style="color: white; font-family: RobotoThin, Arial, sans-serif; font-size: 33pt; text-align: center; float: right"> Olá, '.$nome.'  </h1>
</div>


<table style="float: left">
<form name="sair" action="../include_login/destroi.php">


<tr>
<td>

<div id="fotologin_min"></div>
</td>
</tr>




<tr>
<td>
        <a href="main_meu_painel.php">
        <button type="button" class="botao_config">
        </button></a>
</td>
</tr>

<tr>
<td>
       <input type="submit" value="" id="sair" name="sair" class="botao_sair" style="margin-bottom: 10px;";>
</td>
</tr>

</form>
</table>



    </center>    <br>



    </form>
    </div>
</div>



';
//</editor-fold>






?>
