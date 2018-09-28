<!-- ////////// GRÁFICO ROSQUINHA RECEITAS ////////// -->

<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script> -->
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([

            ['Nome', 'R$'],
            <?php



    $seleciona_despesa = mysql_query("SELECT Tipo, OBS, Data, Valor FROM investimento WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND valido LIKE 's' ORDER BY Data DESC");
    while($linha=mysql_fetch_array($seleciona_despesa)) {


        $tipo = $linha[0];
        $obs = $linha[1];
        $data_inv = $linha[2];
        $Valor_inv = $linha[3];



 ?>

            ['<?php echo"$tipo: $obs"; ?>',<?php echo $Valor_inv; ?>],<?php ?>

            <?php } ?>


        ]);

        var options = {
                title: 'Investimentos',
                pieHole: 0.6,
                backgroundColor: '#F9FDFD',
                is3D: false,
                colors: ['#ce6500','#ff9900','#F0A804','#EEC900','#e6e600','#ffff00','#ffff19','#ffff32','ffff4c','#ffff66','#ffff7f','#ffff99'],


                titleTextStyle: {fontSize: 40},
                legend: {position: 'labeled', color: '#cccccc'},
                legendTextStyle: {fontSize: 14},
                pieSliceTextStyle: {
                    color: '#F9F9F9',
                },


            }

            ;

        var chart = new google.visualization.PieChart(document.getElementById('donutchart_INVESTIMENTOS'));
        chart.draw(data, options);
    }
</script>

<!-- ///////// GRÁFICOS ROSQUINHA RECEITAS END!!! /////////-->
<h1 style="color: #ce6500"></h1>
<h1 style="color: #ff9900"></h1>



