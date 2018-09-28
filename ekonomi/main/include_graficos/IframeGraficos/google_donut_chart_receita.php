<!-- ////////// GRÁFICO ROSQUINHA RECEITAS ////////// -->

<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script> -->
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([

            ['Nome', 'R$'],
            <?php



$seleciona_despesa = mysql_query("SELECT data, tipo, obs, valor FROM receita WHERE ID_Usuario LIKE $ID AND data BETWEEN '$data1' AND '$data2' AND valido LIKE 's' ORDER BY valor DESC");
while($linha=mysql_fetch_array($seleciona_despesa)) {


    $data = $linha[0];
    $tipo = $linha[1];
    $obs = $linha[2];
    $Valor = $linha[3];

 ?>

            ['<?php echo"$tipo: $obs"; ?>',<?php echo $Valor; ?>],<?php ?>

            <?php } ?>


        ]);

        var options = {
            title: 'Receitas',
            pieHole: 0.6,
            backgroundColor: '#F9FDFD',
            is3D: false,
            colors: ['#28E02D','#54E657','#66E969','#77EB79','#87ED89','#95EF97','#A1F1A3','#ABF2AC','#B4F3B4','#BCF4BC','#C9F6C9','#D4F8D4'],


                titleTextStyle: {fontSize: 40},
                legend: {position: 'labeled', color: '#cccccc'},
                legendTextStyle: {fontSize: 14},

                pieSliceTextStyle: {
                    color: '#ffffff',
                },

            }

        ;

        var chart = new google.visualization.PieChart(document.getElementById('donutchart_RECEITAS'));
        chart.draw(data, options);
    }
</script>

<!-- ///////// GRÁFICOS ROSQUINHA RECEITAS END!!! /////////-->



