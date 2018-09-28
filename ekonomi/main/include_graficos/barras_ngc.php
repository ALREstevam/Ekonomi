<?php


session_start();
$ID = $_SESSION["ID_Usuario"];


include("../funcoes/funcoes.php");
conexao();

$id_usuario = $ID;

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css">

<body onload="coloca_data()">


<form action="" method="post">
<input type="date" name="data1" id="data1">
<input type="date" name="data2" id="data2">


    <label for="pesquisa">Ordenar por</label>
    <select class="" name="pesquisa" id="campo">
        <option value="Valor">Valor</option>
        <option value="Data_Venc">Data</option>
    </select>



<input type="submit">
</form>

<script type="text/javascript" language="JavaScript9" src="seleciona_data.js">
</script>

<?php




$mes = date('m');
$ano = date('Y');

$num_dias =  cal_days_in_month(CAL_GREGORIAN, $mes , $ano);






$data_atual = date("Y-m");


//echo'<br>';
//echo $data_atual;



echo'<!--';
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$ordem = $_POST['pesquisa'];
$id_usuario = $ID;
echo'-->';

if(empty($data2)){
    $data1 = "$data_atual-01";
    $data2 = "$data_atual-$num_dias";
    //$ordem ="Valor";

    echo $data1;
    echo'<br>';

    echo $data2;
    echo'<br>';

    echo $ordem;
    echo'<br>';
}


mysql_connect($servidor,$usuario,$senha) OR DIE ("Erro ao conectar ao banco");
mysql_select_db($bd) OR DIE ("Erro ao selecionar o banco");


mysql_set_charset('utf-8');

$comando_seleciona = ("SELECT valor FROM despesas WHERE data BETWEEN '$data1' AND '$data2' AND ID_Usuario LIKE $id_usuario ORDER BY valor DESC");
$seleciona_despesa= mysql_query($comando_seleciona) or die("Falha na consulta");
//echo $comando_seleciona;


$total = 0;
$Valor = 0;

while($linha=mysql_fetch_array($seleciona_despesa)) {

    $Valor = $linha[0];
    $total = $total + $Valor;
}

echo'

<div class="fundo">


         <div class="div_valor">
    <p class="texto_valor">R$ ' .$total. '</p>
     </div>

     <div class="div_tipos">
     <P class="texto_tipos">Total:</P>
     </div>


    <div class="barra" style=" width: 100%">
</div>
</div>
';


?>

<?php

$seleciona_despesa = mysql_query("SELECT * FROM despesas WHERE data BETWEEN '$data1' AND '$data2' AND ID_Usuario LIKE $id_usuario ORDER BY $ordem DESC");
while($linha=mysql_fetch_array($seleciona_despesa)) {

    $ID_Despesa = $linha[0];
    $Usuario_ID_Usuario = $linha[1];
    $Tipo_1 = $linha[2];
    $Tipo_2 = $linha[3];
    $Tipo_3 = $linha[4];
    $Valor = $linha[5];
    $Data_Venc = $linha[6];
    $Repeticao = $linha[7];
    $Estabilidade = $linha[8];


    $resultado = ($Valor / $total) * 100;

    echo '
<div class="fundo">


         <div class="div_valor">
    <p class="texto_valor"> R$ ' . $Valor . '</p>
     </div>

     <div class="div_tipos">
     <P class="texto_tipos">'.$Tipo_1.' - '.$Tipo_2.' - '.$Tipo_3.'</P>
     </div>


    <div class="barra"  style=" width: ' . $resultado . '% ; ">
</div>
</div>';


}
?>

</body>
</html>