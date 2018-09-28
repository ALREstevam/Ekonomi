<?php


$cont = 1;


if (array_key_exists("buscar_usuario", $_POST)) {
    $data1 = $_POST['data1'];
    $date_output = explode('-', $data1);
    $date_output = $date_output[0];
}
else{
    $date_output = date("Y");
}






$i = 0;
$Valor = 0;
$Tot_Desp_mes = 0;
$Tot_Rec_mes = 0;
$tot_inv_mes = 0;
$lucro = 0;
$linha = 0;
$despmaisinvest = 0;


$total_mês = 0;
/*
$Trocames[0] = 'Jan';
$Trocames[1] = 'Fev';
$Trocames[2] = 'Mar';
$Trocames[3] = 'Abr';
$Trocames[4] = 'Mai';
$Trocames[5] = 'Jun';
$Trocames[6] = 'Jul';
$Trocames[7] = 'Ago';
$Trocames[8] = 'Set';
$Trocames[9] = 'Out';
$Trocames[10] = 'Nov';
$Trocames[11] = 'Dez';
*/

$Trocames[0] = '1';
$Trocames[1] = '2';
$Trocames[2] = '3';
$Trocames[3] = '4';
$Trocames[4] = '5';
$Trocames[5] = '6';
$Trocames[6] = '7';
$Trocames[7] = '8';
$Trocames[8] = '9';
$Trocames[9] = '10';
$Trocames[10] = '11';
$Trocames[11] = '12';

$data1_dp[0] = "$date_output-01-01";
$data1_dp[1] = "$date_output-02-01";
$data1_dp[2] = "$date_output-03-01";
$data1_dp[3] = "$date_output-04-01";
$data1_dp[4] = "$date_output-05-01";
$data1_dp[5] = "$date_output-06-01";
$data1_dp[6] = "$date_output-07-01";
$data1_dp[7] = "$date_output-08-01";
$data1_dp[8] = "$date_output-09-01";
$data1_dp[9] = "$date_output-10-01";
$data1_dp[10] = "$date_output-11-01";
$data1_dp[11] = "$date_output-12-01";


$data2_dp[0] = "$date_output-01-31";
$data2_dp[1] = "$date_output-02-28";
$data2_dp[2] = "$date_output-03-31";
$data2_dp[3] = "$date_output-04-30";
$data2_dp[4] = "$date_output-05-31";
$data2_dp[5] = "$date_output-06-30";
$data2_dp[6] = "$date_output-07-31";
$data2_dp[7] = "$date_output-08-31";
$data2_dp[8] = "$date_output-09-30";
$data2_dp[9] = "$date_output-10-31";
$data2_dp[10] = "$date_output-11-30";
$data2_dp[11] = "$date_output-12-31";

echo"<!--";
$date_outputD = explode('-', $Data);
$date_outputD = $date_outputD[1];
$date_outputD = $date_outputD-1;
echo"-->";
?>





<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

    google.load('visualization', '1', {packages: ['corechart', 'line']});
    google.setOnLoadCallback(drawTrendlines);

    function drawTrendlines() {
        var data = new google.visualization.DataTable();

        data.addColumn('number', 'Mês');
        data.addColumn('number', 'Receita');
        data.addColumn('number', 'Despesa');
        data.addColumn('number', 'Saldo');


        data.addRows([





            <?php



while($i < 12) {


$Valor = 0;
$Tot_Desp_mes = 0;
$Tot_Rec_mes = 0;
$tot_inv_mes = 0;
$lucro = 0;
$linha = 0;
$linha1 = 0;
$linha2 = 0;
$despmaisinvest = 0;
$sum_usuarios = 0;
$linha_usr = 0;



// $query_despesa = "SELECT Valor FROM despesa WHERE Usuario_ID_Usuario LIKE $ID AND Data_Venc BETWEEN $data[$i] ORDER BY Valor DESC";

$query_despesa = "SELECT sum(parcela.valor_parcela) FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND Data_parcela BETWEEN '$data1_dp[$i]' AND '$data2_dp[$i]' ORDER BY Data_parcela ASC";
$seleciona_despesa = mysql_query($query_despesa) or die (mysql_error());;


while ($linha = mysql_fetch_array($seleciona_despesa)) {
    $Tot_Desp_mes = $linha[0];


}


    $query_receita = "SELECT sum(valor) FROM receita WHERE data BETWEEN '$data1_dp[$i]' AND '$data2_dp[$i]' AND valido LIKE 's' ORDER BY valor DESC";
    $seleciona_receita = mysql_query($query_receita)  or die (mysql_error());;
    while ($linha2 = mysql_fetch_array($seleciona_receita)) {
        $Tot_Rec_mes = $linha2[0];
        //echo"/*$Tot_Rec_mes*/\n";
    }


            $query_investimento = "SELECT sum(Valor) FROM investimento WHERE Data BETWEEN '$data1_dp[$i]' AND '$data2_dp[$i]' AND valido LIKE 's' ORDER BY Valor DESC";
    $seleciona_investimento = mysql_query($query_investimento)  or die (mysql_error());;
    while ($linha1 = mysql_fetch_array($seleciona_investimento)) {

        $tot_inv_mes = $linha1[0];


    }


    $query_qntusers = "SELECT ID_Usuario FROM usuario WHERE Senha != 'INATIVO_INATIVO'";
    $quant_usrs = mysql_query($query_qntusers)  or die (mysql_error());;
    while ($linha_usr = mysql_fetch_array($quant_usrs)) {

        $sum_usuarios++;




    }
    


    if(!isset($Tot_Rec_mes)){
    $Tot_Rec_mes=0;
    }


    $lucro = round($Tot_Rec_mes - ($Tot_Desp_mes+$tot_inv_mes));
    $despmaisinvest = ($Tot_Desp_mes+$tot_inv_mes);


//echo"$Tot_Rec_mes receita \n$$Tot_Desp_mes despesa \n$tot_inv_mes investimento \n";
$Tot_Rec_mes = round($Tot_Rec_mes/$quant_usrs);
$despmaisinvest = round($despmaisinvest/$quant_usrs);
$lucro = round($lucro/$quant_usrs);

$jscommand = "  [$Trocames[$i],  $Tot_Rec_mes, $despmaisinvest, $lucro],";
//echo"/*$Tot_Rec_mes - ($Tot_Desp_mes+$tot_inv_mes))*/";

$i++;

echo"
$jscommand
";




}




                ?>


        ]);

        var options = {

            title:'Despesas x receitas baseadas em dados de todos os clientes',

            hAxis: {
                title: 'Meses'
            },
            vAxis: {
                title: 'Valor'
            },
            colors: ['#0cb90e', '#B9211B', '#2c6fbf'],

            trendlines: {
                0: {type: 'exponential', color: '#111', opacity:.3},
                1: {type: 'linear', color: '#111', opacity: .3}

            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart_todos'));
        chart.draw(data, options);
    }




</script>

