<?php


$total_receita = 0;
$total_despesa = 0;

$total_inv = 0;




$seleciona_despesa_1 = mysql_query("SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.Data, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas FROM despesas LEFT OUTER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' ORDER BY Data DESC");

//$seleciona_despesa_1 = mysql_query("SELECT Despesa, Tipo, Descricao, Valor, Data FROM despesas WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND Valido LIKE 's' ORDER BY Valor DESC");
while($linha=mysql_fetch_array($seleciona_despesa_1)) {

    //SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.`Data`, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas

    $Despesa_despesas = utf8_decode($linha[0]);
    $tipo_despesa = utf8_decode($linha[1]);

    $despesa_valor = $linha[2];
    $despesa_data = $linha[3];

    $despesa_categoria = utf8_decode($linha[4]);
    $despesa_descricao = utf8_decode($linha[5]);

    $parcela_data = $linha[6];
    $parcela_valor  = $linha[7];
    $parcela_num  = $linha[8];


    $despesa = utf8_decode($Despesa_despesas);
    $tipo = utf8_decode($tipo_despesa);
    $categoria = utf8_decode($despesa_categoria);
    $descricao = utf8_decode($despesa_descricao);


    if($parcela_num == null){


        $Data = $despesa_data;
        $Valor = $despesa_valor;
    }
    else{


        $Data = $parcela_data;
        $Valor = $parcela_valor;
    }



    $Data_dt = date("Y-m-d", strtotime($Data));
    $data1_dt = date("Y-m-d", strtotime($data1));
    $data2_dt = date("Y-m-d", strtotime($data2));




    if(($Data_dt > $data1_dt)&&($Data_dt<$data2_dt)) {
        $total_despesa = $total_despesa + $Valor;

    }
    else{
        // echo"invalido<br>";
    }


}

$seleciona_despesa = mysql_query("SELECT Tipo, OBS, Data, Valor FROM investimento WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND valido LIKE 's' ORDER BY Data DESC");
while($linha=mysql_fetch_array($seleciona_despesa)) {


    $tipo = $linha[0];
    $obs = $linha[1];
    $data_inv = $linha[2];
    $Valor_inv = $linha[3];


$total_inv = $total_inv + $Valor_inv;
$total_despesa = $total_despesa + $Valor_inv;


}












$comando_seleciona_1 = ("SELECT valor FROM receita WHERE data BETWEEN '$data1' AND '$data2' AND ID_Usuario LIKE $ID AND valido LIKE 's' ORDER BY valor DESC");
$seleciona_receita= mysql_query($comando_seleciona_1) or die("Falha na consult -barra saldo - erro ao selecionar valor da receita");




while($linha=mysql_fetch_array($seleciona_receita)) {

    $Valor = $linha[0];
    $total_receita = $total_receita + $Valor;
}





$lucro = (round($total_receita - $total_despesa));
$saldo = $total_receita - $total_despesa;
$porcentagem = 0;







echo"<div class='barra_saldo'>";

if($lucro == 0 or $total_despesa == $total_receita){
    echo "
<div style='background-color: #9ae2ff; width: 100%; height: 90px;'>
<span style='float: left; padding: 5px; font-weight: bold'>Saldo: +R$ 0,00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Receita: +R$ $total_receita &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Despesa: R$ $total_despesa</span>
</div>";
}


else if($lucro > 0){

    $porcentagem_saldo = ($lucro/$total_receita)*100;

    echo "
<div class='saldo_barra_fundo'>

 <span class='span_despesa'>Despesa: -R$ $total_despesa</span>

 <div class='barra_lucro_mai' style='width: $porcentagem_saldo%; padding: 5px'>
 <span class='spn_sald' style='width: 200px'>Saldo: +R$ $saldo</span></div>


 </div>
    ";
}


else if($lucro < 0 ){
    $lucro = $lucro * -1;
    echo "

<div class='saldo_barra_fundo'>

 <span class='span_despesa'>Despesa: -R$ $total_despesa</span>
 <div class='' style='width: 600px ; padding: 5px; background-color: #FF2C0D;'></div>
 <span class='spn_sald_1' style='width: 200px '>Saldo: -R$ $saldo </span>
 </div>
    ";
}
echo"</div>";

?>