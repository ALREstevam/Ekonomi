<br><br><br><br><br>

<h2>Comentários</h2><br>
<?php

include"include_login/conexao.php";





//CÓDIGO SQL
$comando = "SELECT * FROM contato WHERE Postado ='s' ORDER BY Data_SQL DESC ";
//echo $comando;









//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");


//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");


//executando comando SQL
$resultado= mysql_query($comando) or die("Falha na consulta");//retorna os dados





//estabelecendo conexão com o servidor mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão"); //selecionando o banco de dados mysql_select_db($banco) or die("Não foi possível selecionar o Banco"); //executando comando SQL $resultado= mysql_query($comando) or die("Falha na consulta");//retorna os dados
//fazer uma tabela para organizar o resultado da consulta



//enquanto houver registros do resultado, exibi-los
while($linha=mysql_fetch_array($resultado)){


    $ID_Contato = $linha[0];
    $Nome = $linha[1];
    $Email = $linha[2];
    $Sexo = $linha[3];
    $Texto = $linha[4];
    $Data_SQL = $linha[5];
    $Data_TXT = $linha[6];







    //  echo "<td><button name='user_id' id='user_id' type='submit' value='$ID_Usuario' class='botao_alterar'>&nbsp;</button> </td>   \n";
    //<editor-fold desc="Description">
    if($Sexo == 'masculino'){
        $Sexo_img = '<div class="mascimg"></div>';
    }
    else{
        $Sexo_img = '<div class="femimg"></div>';
    }




    echo'
<div id="pesquisa">


<table border="0" class="tabela_coment" cellpadding="5">
        <tr>
            <td width="40px"> '.$Sexo_img.'</td>
            <td><h3 style="padding-top: 18px;"> '.$Nome.'</h3> </td>

        </tr>
</table>

<table border="0" class="tabela_coment"  cellpadding="5">
    <tr>

    <td>'.$Texto.'</td>
</tr>
    </table>

<table border="0" class="tabela_coment"  cellpadding="5">
<tr>
    <td class="data">'.$Data_TXT.'</td>
    </tr>
</table>


</table>

<br>

';}

?>
</div>

