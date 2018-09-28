<?php

/*

        echo '
<div class="fundo_despesa">


         <div class="div_valor_despesa">
    <p class="texto_valor_despesa"> R$ ' . $Valor . '</p>
     </div>

     <div class="div_tipos_despesa">
     <P class="texto_tipos_despesa"><wbr/>'.$tipo.'<wbr/> '.$descricao.'<wbr/></P>
     </div>


    <div class="barra_despesa"  style=" width: ' . $resultado . '% ; "
</div>
</div>';

?>
<?php

//SELECIONA AS DESPESAS
$seleciona_despesa_1 = mysql_query("SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.Data, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND parcela.Data_parcela BETWEEN '$data1' AND '$data2' ORDER BY Valor DESC");

while($linha=mysql_fetch_array($seleciona_despesa_1)) {


    $Despesa_despesas = utf8_decode($linha[0]);
    $tipo_despesa = utf8_decode($linha[1]);

    $despesa_valor = $linha[2];
    $despesa_data = $linha[3];

    $despesa_categoria = utf8_decode($linha[4]);
    $despesa_descricao = utf8_decode($linha[5]);

    $parcela_data = $linha[6];
    $parcela_valor = $linha[7];
    $parcela_num = $linha[8];


    $despesa = utf8_decode($Despesa_despesas);
    $tipo = utf8_decode($tipo_despesa);
    $categoria = utf8_decode($despesa_categoria);
    $descricao = utf8_decode($despesa_descricao);

}
*/
?>












<?php



$comando_seleciona = ("SELECT sum(parcela.valor_parcela) FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND parcela.Data_parcela BETWEEN '$data1' AND '$data2' ORDER BY Valor DESC");
$seleciona_despesa= mysql_query($comando_seleciona) or die("Falha na consulta");
//echo $comando_seleciona;


$total = 0;
$Valor = 0;

while($linha=mysql_fetch_array($seleciona_despesa)) {

    $Valor = $linha[0];
    $total = $Valor;
}

echo'

<div class="fundo_despesa">

    <div class="div_tipos_despesa">
        <P class="texto_tipos_despesa" style="font-size: 20pt;"><b>R$ ' .$total. '</b> : Despesa total</P>
    </div>

    <div class="barra_despesa" style=" width: 100%">
    </div>


</div>
';


?>

<?php



//SELECIONA AS DESPESAS
$seleciona_despesa_1 = mysql_query("SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.Data, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND parcela.Data_parcela BETWEEN '$data1' AND '$data2' ORDER BY Valor DESC");

while($linha=mysql_fetch_array($seleciona_despesa_1)) {


    $Despesa_despesas = utf8_decode($linha[0]);
    $tipo_despesa = utf8_decode($linha[1]);

    $despesa_valor = $linha[2];
    $despesa_data = $linha[3];

    $despesa_categoria = utf8_decode($linha[4]);
    $despesa_descricao = utf8_decode($linha[5]);

    $parcela_data = $linha[6];
    $parcela_valor = $linha[7];
    $parcela_num = $linha[8];



    $despesa_categoria = utf8_encode($despesa_categoria);
    $tipo_despesa =  utf8_encode($tipo_despesa);




    $Tipo_1 = $Despesa_despesas;
    $Tipo_2 = $despesa_categoria;
    $Tipo_3 = $tipo_despesa;
    $Valor = $parcela_valor;
    $Data_Venc = $parcela_data;



    $resultado = ($Valor / $total) * 100;

    echo '
<div class="fundo_despesa">




     <div class="div_tipos_despesa" style="float: left">
     <span class="texto_tipos_despesa"><b style="font-size: 15pt"> R$ ' . $Valor . ' </b> '.$Tipo_2.':  '.$Tipo_3.'</P>
     </div>


    <div class="barra_despesa"  style=" width: ' . $resultado . '% ; ">
</div>
</div>';


} ?>
























