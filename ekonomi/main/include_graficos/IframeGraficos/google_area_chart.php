

<?php

echo"<!--";
$anoesse = date("Y");

$ano_pst = $_POST['data1'];

echo"$ano_pst<br>";


//$dateFormat = 'Y-m-d';
//$date = DateTime::createFromFormat($dateFormat, $ano_pst);

//$year = $date->format('Y'); // returns a string



/*




if($ano_pst == ""){
    $ano = date("Y");}
else{
    $ano = date("Y");
}


$i = 0;
$Valor = 0;
$Tot_Desp_mes = 0;
$Tot_Rec_mes = 0;
$lucro = 0;

$data[0] = "'$ano-01-01' AND '$ano-01-31'";
$data[1] = "'$ano-02-01' AND '$ano-02-28'";
$data[2] = "'$ano-03-01' AND '$ano-03-31'";
$data[3] = "'$ano-04-01' AND '$ano-04-30'";
$data[4] = "'$ano-05-01' AND '$ano-05-31'";
$data[5] = "'$ano-06-01' AND '$ano-06-30'";
$data[6] = "'$ano-07-01' AND '$ano-07-31'";
$data[7] = "'$ano-08-01' AND '$ano-08-31'";
$data[8] = "'$ano-09-01' AND '$ano-09-30'";
$data[9] = "'$ano-10-01' AND '$ano-10-31'";
$data[10] = "'$ano-11-01' AND '$ano-11-30'";
$data[11] = "'$ano-12-01' AND '$ano-12-31'";


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
?>






<!-- //////////  AREA CHART ////////// -->
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mês', 'Receita', 'Despesa', 'Lucro'],



<?php

//Echo"DESPESAS<BR>";
while($i < 12) {

    $query_despesa = "SELECT Valor FROM despesa WHERE Usuario_ID_Usuario LIKE $ID AND Data_Venc BETWEEN $data[$i] ORDER BY Valor DESC";
    $seleciona_despesa = mysql_query($query_despesa);
    // echo"$query_despesa<br>";
    $Tot_Desp_mes = 0;
    $Tot_Rec_mes = 0;

    while ($linha = mysql_fetch_array($seleciona_despesa)) {

        $Valor = $linha[0];
        $Tot_Desp_mes = ($Tot_Desp_mes + $Valor);

      //  echo " $Trocames[$i] = R$ $Tot_Desp_mes<br>";

    }
        //Echo "RECEITAS<BR>";

        $query_receita = "SELECT Valor FROM receita WHERE Usuario_ID_Usuario LIKE $ID AND Data_Venc BETWEEN $data[$i] ORDER BY Valor DESC";
        $seleciona_receita = mysql_query($query_receita);
        // echo"$query_despesa<br>";



        while ($linha = mysql_fetch_array($seleciona_receita)) {

            $Valor = $linha[0];
            $Tot_Rec_mes = ($Tot_Rec_mes + $Valor);

         //   echo " $Trocames[$i] = R$ $Tot_Rec_mes<br>";

        }


     //   Echo "LUCRO<BR>";

        $lucro = round($Tot_Rec_mes - $Tot_Desp_mes);
       // echo "$lucro<br>";



    $jscommand = "  ['$Trocames[$i]',  $Tot_Rec_mes, $Tot_Desp_mes, $lucro],";

    $i++;

echo"
$jscommand
    ";












}

    ?>



        ]);

        var options = {
            title: 'Despesas X Receitas',
             <?php echo" hAxis: {title: 'Ano $ano',  titleTextStyle: {color: '#333'}}, "; ?>
            vAxis: {minValue: 0},
            chartArea: {left:100,top:100,width:'70%',height:'70%'},
            colors: ['#28E02D','#FF2D0F','#1B83FF'],
            titleTextStyle: {fontSize: 40},

            backgroundColor: '#F9FDFD',




        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
<!-- //////////  AREA CHART END ////////// -->