<?php


$comando_seleciona = ("SELECT valor FROM receita WHERE data BETWEEN '$data1' AND '$data2' AND ID_Usuario LIKE $ID AND valido LIKE 's' ORDER BY valor DESC");
$seleciona_receita= mysql_query($comando_seleciona) or die("Falha na consulta - barra-receita - selecionar valor de receita");
//echo $comando_seleciona;


$total = 0;
$Valor = 0;

while($linha=mysql_fetch_array($seleciona_receita)) {

$Valor = $linha[0];
$total = $total + $Valor;
}

echo'

<div class="fundo_receita">



    <div class="div_tipos_receita">
        <P class="texto_tipos_receita" style="font-size: 20pt;"> Receita total : <b>R$ ' .$total. '</b> </P>
    </div>


    <div class="barra_receita" style="width: 100%; background-color: #26e02c;">
    </div>
</div>
';


?>

<?php
$comando_busca = "SELECT * FROM receita WHERE data BETWEEN '$data1' AND '$data2' AND ID_Usuario LIKE $ID AND valido LIKE 's' ORDER BY $ordem DESC ";
//echo $comando_busca;
$seleciona_receita = mysql_query($comando_busca) or die ("Falha na consulta - barra receita - selecionar receita");
while($linha=mysql_fetch_array($seleciona_receita)) {

    $id_receita = $linha[0];
    $ID_Usuario = $linha[1];
    $data = $linha[2];
    $Tipo = $linha[3];
    $obs = $linha[4];
    $Valor = $linha[5];
    $Valido = $linha[6];



    $resultado = ((($Valor / $total) * 100) -100 )*-1;


    //'.$Tipo_1.'
    echo '
<div class="fundo_receita">




     <div class="div_tipos_receita" style="float: right;">
        <span class="texto_tipos_receita">  '.$Tipo.' '.$obs.' <b style="font-size: 15pt">R$ ' . $Valor . '</b>  </span>
     </div>


    <div class="barra_receita" style=" width: ' . $resultado . '% ; " >
    </div>

</div>';


}
?>