<!-- ////////// GRÁFICO ROSQUINHA DESPESAS ////////// -->


<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([

            ['Nome', 'R$'],
            <?php
$seleciona_despesa_1 = mysql_query("SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.Data, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND Data_parcela BETWEEN '$data1' AND '$data2' ORDER BY Valor DESC");

//$seleciona_despesa_1 = mysql_query("SELECT Despesa, Tipo, Descricao, Valor, Data FROM despesas WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND Valido LIKE 's' ORDER BY Valor DESC");
while($linha=mysql_fetch_array($seleciona_despesa_1)) {

    //SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.`Data`, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas

    $Despesa_despesas = $linha[0];
    $tipo_despesa = $linha[1];

    $despesa_valor = $linha[2];
    $despesa_data = $linha[3];

    $despesa_categoria = $linha[4];
    $despesa_descricao = $linha[5];

    $parcela_data = $linha[6];
    $parcela_valor  = $linha[7];
    $parcela_num  = $linha[8];


    $despesa = $Despesa_despesas;
    $tipo = $tipo_despesa;
    $categoria = $despesa_categoria;
    $descricao = $despesa_descricao;



        $Data = $parcela_data;
        $Valor = $parcela_valor;




   $Data_dt = date("Y-m-d", strtotime($Data));
    $data1_dt = date("Y-m-d", strtotime($data1));
    $data2_dt = date("Y-m-d", strtotime($data2));















 ?>

            ['<?php echo"$despesa: $tipo - $descricao"; ?>', <?php echo $Valor; ?>], <?php ?>
            <?php } ?>

        ]);
        var options = {



            title: 'Despesas',
            pieHole: 0.6,
            backgroundColor: '#F9FDFD',
            is3D: false,
            colors: ['#FF2D0F','#FF4123','#FF482C','#FF5C45','#FF6244','#FF6C58','#FF8271','#FF9C8E','#FFB9AF','#FFD1CB','#FFE3E0'],
            titleTextStyle: {fontSize: 40},

            legend: {position: 'labeled', color: '#cccccc'},
            legendTextStyle: {fontSize: 14},

            pieSliceTextStyle: {
                color: '#ffffff',
            },



        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart_DESPESAS'));
        chart.draw(data, options);
    }
</script>

<!-- ///////// GRÁFICOS ROSQUINHA DESPESAS END!!! /////////-->


