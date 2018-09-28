<?php


session_start();
$ID = $_SESSION["ID_Usuario"];




include("../../../funcoes/funcoes.php");
conexao();

$id_usuario = $ID;



echo"<!--";
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$ordem = $_POST['pesquisa'];
echo"-->";

if($data1 == ""){

    $data1 = '2015-01-01';
}

if($data2 == ""){
    $data2 = '2015-01-30';
}

if($ordem == ""){
    $ordem = 'Valor';
}

?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="utf-8">


    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <?php
    include"google_donut_chart_despesas.php";
    include"google_donut_chart_receita.php";
    include"google_donut_chart_investimento.php";
  //  include"google_area_chart.php";
    include"google_line_chart.php";
    include"google_line_chart_todos.php";



    ?>






























</head>

<body onload="coloca_data()">
<div id="form" style="border: solid 1px #cccccc; padding: 10px; background-color: #F9FDFD">
<center>

    <h2 class="blackh2">Selecionando dados entre as datas<br>

    <?php echo'
    <input type="date" value="'.$data1.'" readonly style="border: none; font-size: 20pt; padding-left: 100px; font-family: Arial, sans-serif;">

    <input type="date" value="'.$data2.'" readonly style="border: none; font-size: 20pt; font-family: Arial, sans-serif;">
    '; ?>
    </h2>

</center>
<center>

<form action="" method="post" class="form_pesquisa">
    Entre
    <input type="date" name="data1" id="data1" class="form_pesquisa"> e
    <input type="date" name="data2" id="data2" class="form_pesquisa">

<br>

    <label for="pesquisa" hidden="hidden">Ordenar por</label>
    <select name="pesquisa" id="campo" class="form_pesquisa" hidden="hidden">
        <option value="Valor">Valor</option
    </select>
    <br>
    <br><br><br><br><br><br>


    <input type="submit" class="botao_pesquisa_graficos" value="Pesquisar">
</form>
</center>
<script type="text/javascript" language="JavaScript9" src="seleciona_data.js">
</script>



<div id="barras" style="border: solid 1px #cccccc; padding: 10px; background-color: #F9FDFD">
<div style="background-color: red; width: 100%;">
</div>

</div>


<div style="width: 100%; background-color: #68adff; clear: both;">
    <?php include"barra_saldo.php"; ?>
</div>
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background-color: #F9FDFD">
    <tr>
        <td>
      <!-- BARRA DESPESAS -->
               <div id="grafico_barra_despesa" style="width: 50%; height: 100%; display: block">
                         <?php include"barra_despesas.php"; ?>
                </div>
                <!-- BARRA DESPESAS END-->




                <!-- BARRA RECEITAS -->
            <div id="grafico_barra_receita" style="width: 50%; height: 100%">
                <?php include"barra_receita.php"; ?>
            </div>
            <!-- BARRA RECEITAS END-->







        </td>
    </tr>
</table>





<div style="width: 100%; clear: left;"></div>
</div>

<div id="barras" style="border: solid 1px #cccccc; padding: 10px; background-color: #F9FDFD">
<?php
include"listar.php";
?>
</div>

<!-- ////////// GOOGLE CHART DIV////////// -->
    <div id="donutchart_RECEITAS" style="width: 100%; height: 500px; border: solid 1px #cccccc"></div>
    <div id="donutchart_DESPESAS" style="width: 100%; height: 500px; border: solid 1px #cccccc"></div>
    <div id="donutchart_INVESTIMENTOS" style="width: 100%; height: 500px; border: solid 1px #cccccc"></div>

   <!-- <div id="chart_div" style="width: 100%; height: 700px; border: solid 1px #cccccc"></div> -->

<div id="line_chart_todos" style="width: 100%; height: 700px; border: solid 1px #cccccc"></div>
<div id="line_chart" style="width: 100%; height: 700px; border: solid 1px #cccccc"></div>
<!-- ///////// GOOGLE CHART DIV /////////-->






</body>
</html>