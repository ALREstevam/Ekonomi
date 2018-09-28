<?php




    include "../../include_login/conexao.php";





    //CÓDIGO SQL
    $comando = "SELECT * FROM noticias ORDER BY Data_sql DESC ";

    mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");
    mysql_select_db($banco) or die("Não foi possível selecionar o Banco");
    $resultado= mysql_query($comando) or die("Falha na consulta");//retorna os dados


echo'
<form action="criar_noticia.php">
    <input type="submit" class="adicionar_noticia" value="">
</form>

';








    while($linha=mysql_fetch_array($resultado)){


        $idnoticia = $linha[0];
        $idadm = $linha[1];
        $titulo = $linha[2];
        $texto = $linha[3];
        $fonte = $linha[4];
        $data_sql = $linha[5];
        $data_txt = $linha[6];
        $invalido = $linha[7];


$sql_nome_edit = "SELECT Nome_ADM FROM `adm` WHERE ID_ADM LIKE '$idadm'";
$rs_nomeadm = mysql_query($sql_nome_edit) or die("Falha na consulta");

while($linha=mysql_fetch_array($rs_nomeadm)) {


    $nome_adm = $linha[0];


    if ($invalido == 's') {
        $Postado = '

        <form action="valida_noticia.php" method="post">
<button type="submit" value="'.$idnoticia.'" class="postar" name="add" alt="Validar esta notíca" >&nbsp;</button>
<p class="npostado" >Postar</p>
</form>
';
    } else {
        $Postado = '

        <form action="invalida_noticia.php" method="post">
<button type="submit" value="'.$idnoticia.'" class="tirar" name="remove" alt="Invalidar esta noticia" >&nbsp;</button>
<p class="postado" >Retirar</p>
</form>
';

    }

    $editar = '

        <form action="editar_noticia.php" method="post">
<button type="submit" value="'.$idnoticia.'" class="editar" name="edit" alt="Editar" >&nbsp;</button>
<p class="azul_edit" >Editar</p>
</form>

';

    $excluir = '

        <form action="excluir_noticia.php" method="post">
<button type="submit" value="'.$idnoticia .'" class="excluir" name="del" alt="Excluir" >&nbsp;</button>
<p class="amare_excluir" >Excluir</p>
</form>

';


    echo '
<div id="pesquisa">


<table border="0" class="tabela_noticia" cellpadding="5">
        <tr>

            <td><h3> ' . $titulo . '</h3> </td>

        </tr>
        <tr>
        <td>' . $texto . '</td>
        <td>' . $Postado . '<br>' . $editar . '  <br> ' . $excluir . '</td>
        </tr>

        <tr>
        <td>'.$nome_adm.' <br>' . $data_txt . ' <br> ' . $fonte . '</td>
        </tr>
</table>


';


        }
    }


    ?>
