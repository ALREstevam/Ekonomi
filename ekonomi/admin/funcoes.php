<?php
@session_start();
$SecLev = $_SESSION["SecLev"];



function SecLev()
{

    @session_start();
    $SecLev = $_SESSION["SecLev"];

    if ($SecLev == "1") {
        $FotoNivel = '  <div class="shield1" onclick="levelgrande(1)"></div> ';
    } elseif ($SecLev == "2") {
        $FotoNivel = '<div class="shield2" onclick="levelgrande(2)"></div>';
    } elseif ($SecLev == "3") {
        $FotoNivel = '<div class="shield3" onclick="levelgrande(3)"></div>';
    } elseif ($SecLev == "4") {
        $FotoNivel = '<div class="shield4" onclick="levelgrande(4)"></div>';
    }

    echo "$FotoNivel";

}

function acessoNegado(){
    echo "
<!--
<center>

<div  style='background-color: rgba(162, 204, 159, 0.18); padding: 20px; border: solid #5cff60 4px'>
<h3 style='text-align: center'>Acesso negado para o seu n&iacute;vel</h3>
    <div class='acessoNegado'></div>
</div>
    </center>

    -->

    <center><span style='text-align: center; color: grey'>__________________</span></center>
    ";

}




?>