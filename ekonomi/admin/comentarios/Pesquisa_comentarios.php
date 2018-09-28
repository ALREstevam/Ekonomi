<?php
?>

<h1 xmlns="http://www.w3.org/1999/html">Comentários, dúvidas e contato</h1>






<div id="resultado">
    <?php
    include "../../include_login/conexao.php";





    //CÓDIGO SQL
    $comando = "SELECT * FROM contato WHERE Lido ='n' ORDER BY Data_SQL DESC ";
    //echo $comando;


    echo'<br>';






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
        $Postar = $linha[7];
        $Postado = $linha[8];


    if($Postar=='s'){
        $Postar='
<form action="postar.php" method="post">
<button type="submit" value="'.$ID_Contato.'" class="botao_postar" name="postar" alt="Postar comentário no site">&nbsp;</button>
</form>
        ';}
        else{
            $Postar=' <button type="button" class="botao_nao_postar" name="postar" alt="Este comentário não deve ser postado">&nbsp;</button>
';
        }

if($Postado=='s'){
    $FoiPostado ='

        <form action="remover.php" method="post">
<button type="submit" value="'.$ID_Contato.'" class="botao_despostar" name="remover" alt="Remover este comentário" >&nbsp;</button>
<p class="foipostado" >&nbsp;&nbsp;&nbsp;Este comentário foi postado</p>
</form>
';
}
        else{
    $FoiPostado ='<p class="naofoipostado">Este comentário não foi postado</p>';
        }







if($Postado=='n'){
        $lido ='
        <form action="lido.php" method="post">
<button type="submit" value="'.$ID_Contato.'" class="botao_lido" name="lido" alt="Marcar comentário como lido">&nbsp;</button>
</form>
';
}
        else{
            $lido ='
            <button type="button" class="botao_lido" name="lido" alt="Este comentário não pode ser marcado como lido" style="cursor: not-allowed"> &nbsp;</button>
        ';
        }



      //  echo "<td><button name='user_id' id='user_id' type='submit' value='$ID_Usuario' class='botao_alterar'>&nbsp;</button> </td>   \n";
        //<editor-fold desc="Description">
        echo'
<div id="pesquisa">


<table border="0" class="tabela_coment" cellpadding="5">
        <tr>

            <td><h3> '.$Nome.'</h3> </td>
            <td>'.$lido.'</td>
        </tr>
</table>

<table border="0" class="tabela_coment" cellpadding="5">
    <tr><td><b>'.$Email.'</b></td></tr>
</table>

<table border="0" class="tabela_coment"  cellpadding="5">
<tr>   <td> '.$Sexo.'</td>
    <td>'.$Data_TXT.'</td></tr>
</table>

<table border="0" class="tabela_coment"  cellpadding="5">
    <tr><td>'.$Texto.' <br>'.$FoiPostado.'</td>
    <td>
    '.$Postar.'



    </td></tr>
    </table>
</table>

<br><br><br>

';
        //</editor-fold>




    }


    ?>

</div>
    <!--
    <iframe src="alterar_usuario.php" name="iframe_alterar" style="width: 100%; height: 2000px; border: none;background-color: rgba(236, 246, 239, 0.93);" ></iframe>
-->
