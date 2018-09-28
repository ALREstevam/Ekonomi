<meta charset="utf-8">



<div style=" background-color: rgb(253, 44, 13);">

<?php    $seleciona_despesa_2 = mysql_query("SELECT SUM(parcela.valor_parcela) FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND Data_parcela BETWEEN '$data1' AND '$data2'   ORDER BY Data_parcela DESC");
    while($linha2=mysql_fetch_array($seleciona_despesa_2)) {
    $total_despesa = $linha2[0];

   // echo"";

    }



   echo" <div  style='background-color: #781506; float: left; width: 100%; height: 80px'><h2>Despesas</h2></div>";
echo"<div style='float: left'><h2 style='color: white; font-size: 40pt;'>R$ $total_despesa</h2></div><br>";
?>
<br>
    <table style="width: 100%;  padding-top: 30px; padding-bottom: 30px;" class="table_llistar">





<?php


/*

SELECT *
FROM despesas
LEFT OUTER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa
WHERE
Data BETWEEN '2015-10-01' AND '2015-10-31' AND
valido LIKE 's' AND ID_Usuario LIKE '4'
ORDER BY Valor DESC
;
  */


$seleciona_despesa_1 = mysql_query("SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.Data, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND Data_parcela BETWEEN '$data1' AND '$data2'   ORDER BY Data_parcela DESC");

//$seleciona_despesa_1 = mysql_query("SELECT Despesa, Tipo, Descricao, Valor, Data FROM despesas WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND Valido LIKE 's' ORDER BY Valor DESC");
while($linha=mysql_fetch_array($seleciona_despesa_1)) {

    //SELECT despesas.Despesa, despesas.Tipo, despesas.Valor, despesas.`Data`, despesas.Categoria, despesas.Descricao, parcela.Data_parcela, parcela.valor_parcela, parcela.nparcelas

    $Despesa_despesas = ($linha[0]);
    $tipo_despesa = ($linha[1]);

    $despesa_valor = $linha[2];
    $despesa_data = $linha[3];

    $despesa_categoria = ($linha[4]);
    $despesa_descricao = ($linha[5]);

    $parcela_data = $linha[6];
    $parcela_valor = $linha[7];
    $parcela_num = $linha[8];


    $despesa = utf8_decode($Despesa_despesas);
    $tipo = utf8_decode($tipo_despesa);
    $categoria = utf8_decode($despesa_categoria);
    $descricao = utf8_decode($despesa_descricao);


    $Data = $parcela_data;
    $Valor = $parcela_valor;


    $Data_dt = date("Y-m-d", strtotime($Data));
    $data1_dt = date("Y-m-d", strtotime($data1));
    $data2_dt = date("Y-m-d", strtotime($data2));


    $var_des = utf8_encode("<tr><td><strong>Tipo: </strong> $despesa</td><td><strong>Tipo: </strong>  $tipo </td><td><strong>Descri&ccedil;&atilde;o: </strong>  $descricao </td><td><strong>Valor R$ </strong> $Valor </td><td><strong>Data: </strong>  <input type='date' value='$Data' readonly style='border: none; font-size: 12pt; font-family: Arial, sans-serif; background-color: rgb(253, 44, 13);' class='data_listar'></td></tr>");
    echo $var_des;

}

echo"</table>";
?>
</div>
<br>


<div style="background-color:rgba(40, 205, 22, 1);">

    <?php    $seleciona_receita2 = mysql_query("SELECT SUM(valor) FROM receita WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND data BETWEEN '$data1' AND '$data2'   ORDER BY data DESC");
    while($linha3=mysql_fetch_array($seleciona_receita2)) {
        $total_receita = $linha3[0];

        // echo"";

    }



    echo"<div  style='background-color: #0d820f; float: left; width: 100%; height: 80px'><h2>Receitas</h2></div>";
    echo"<div style='float: left'><h2 style='color: white; font-size: 40pt;'>R$ $total_receita</h2></div><br>";
    ?>
    <table style="width: 100%;  padding-top: 30px; padding-bottom: 30px;" class="table_llistar">



    <?php
$seleciona_despesa = mysql_query("SELECT data, tipo, obs, valor FROM receita WHERE ID_Usuario LIKE $ID AND data BETWEEN '$data1' AND '$data2' AND valido LIKE 's' ORDER BY data DESC");
while($linha=mysql_fetch_array($seleciona_despesa)) {


    $data_rec = $linha[0];
    $tipo = utf8_decode($linha[1]);
    $obs = utf8_decode($linha[2]);
    $Valor_rec = $linha[3];


    $var = utf8_encode("<tr><td><strong>Tipo: </strong> $tipo</td><td><strong>Obs: </strong>  $obs </td> <td><strong>Valor R$ </strong> $Valor_rec </td><td><strong>Data: </strong>  <input type='date' value='$data_rec' readonly style='border: none; font-size: 12pt; font-family: Arial, sans-serif; background-color:rgba(40, 205, 22, 1);' class='data_listar'></td></tr>");
    echo $var;
}
?>
    </table>
</div>
<br>



<div style=" background-color: #ff9900;">






        <?php    $seleciona_investimento2 = mysql_query("SELECT SUM(Valor) FROM investimento WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND Data BETWEEN '$data1' AND '$data2'   ORDER BY Data DESC");
        while($linha4=mysql_fetch_array($seleciona_investimento2)) {
            $total_investimento = $linha4[0];

            // echo"";

        }



        echo"<div  style='background-color: #ce6500; float: left; width: 100%; height: 80px'><h2>Investimentos</h2></div>";
        echo"<div style='float: left'><h2 style='color: white; font-size: 40pt;'>R$ $total_investimento</h2></div><br>";
        ?>



        <table style="width: 100%;  padding-top: 30px; padding-bottom: 30px;" class="table_llistar">


    <?php
    $seleciona_despesa = mysql_query("SELECT Tipo, OBS, Data, Valor FROM investimento WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND valido LIKE 's' ORDER BY Data DESC");
    while($linha=mysql_fetch_array($seleciona_despesa)) {


        $tipo = utf8_decode($linha[0]);
        $obs = utf8_decode($linha[1]);
        $data_inv = $linha[2];
        $Valor_inv = $linha[3];


        $var = utf8_encode("<tr><td><strong>Tipo: </strong> $tipo</td><td><strong>Obs: </strong>  $obs </td> <td><strong>Valor R$ </strong> $Valor_inv </td><td><strong>Data: </strong>  <input type='date' value='$data_inv' readonly style='border: none; font-size: 12pt; font-family: Arial, sans-serif; background-color: #ff9900' class='data_listar'></td></tr>");
        echo $var;
    }
    ?>
</table>
        </div>
<br>



<div style="background-color: rgba(0, 176, 226, 1); ">






        <?php    $seleciona_meta2 = mysql_query("SELECT SUM(valor) FROM meta WHERE valido LIKE 's' AND ID_Usuario LIKE '$ID' AND data BETWEEN '$data1' AND '$data2'   ORDER BY data DESC");
        while($linha5=mysql_fetch_array($seleciona_meta2)) {
            $total_meta = $linha5[0];

            // echo"";

        }



        echo" <div  style='background-color: rgb(0, 108, 168); float: left; width: 100%; height: 80px'><h2>Metas</h2></div>";
        echo"<div style='float: left'><h2 style='color: white; font-size: 40pt;'>R$ $total_meta</h2></div><br>";
        ?>





        <table style="width: 100%;  padding-top: 30px; padding-bottom: 30px;" class="table_llistar">



    <?php
    $seleciona_despesa = mysql_query("SELECT metas, data, valor FROM meta WHERE ID_Usuario LIKE $ID AND Data BETWEEN '$data1' AND '$data2' AND valido LIKE 's' ORDER BY Data DESC");
    while($linha=mysql_fetch_array($seleciona_despesa)) {


        $tipo = utf8_decode($linha[0]);
        $data_met = $linha[1];
        $Valor_met = $linha[2];


        $var = utf8_encode("<tr><td><strong>Tipo: </strong> $tipo</td><td><strong>Valor R$ </strong> $Valor_met </td><td><strong>Data: </strong>  <input type='date' value='$data_met' readonly style='border: none; font-size: 12pt; font-family: Arial, sans-serif; background-color: rgba(0, 176, 226, 1)' class='data_listar'></td></tr>");
        echo $var;
    }
    ?>
</table>
            </div>
<br>


