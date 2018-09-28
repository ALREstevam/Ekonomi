<?php


?>

<h1>Pesquisa de Usuários</h1>

<form name='form_consulta' action='_usuario_index.php' method='post'>


<div id="pesquisacampos">


    <input type="text" placeholder="Pesquisa" class="texto" name="pesquisa" id="pesquisa">



    <select class="texto" name="campo" id="campo">
        <option value="ID_Usuario">ID</option>
        <option value="Nome">Nome</option>
        <option value="Email">E-mail</option>
        <option value="CPF">CPF</option>
        <option value="Cidade">Cidade</option>
        <option value="CEP">CEP</option>
    </select>



    <br>




    <input type='submit' value='Buscar' class="botao" name="buscar_usuario" id="buscar_usuario">


</form>

</div>
<form action=""><input type='submit' value='Atualizar' class="botao"></form>


<div id="resultado">
<?php
include "../../include_login/conexao.php";

$pesquisa = "";

// Recebemos os dados digitados pelo usu�rio
if (array_key_exists("buscar_usuario", $_POST)) {


$campo = $_POST['campo'];
$pesquisa = $_POST['pesquisa'];

    $campo = str_replace("'","",$campo);
    $pesquisa = str_replace("'","",$pesquisa);


}

if(empty($campo)){
    $campo = 'ID_Usuario';
}

//CÓDIGO SQL
$comando = "select * from usuario where $campo like '%$pesquisa%' and Senha <> 'INATIVO_INATIVO' order by $campo";
//echo $comando;


echo'<br>';


echo'<p id="pesq_campos">';
echo'Pesquisando campo: <b>'.$campo.'</b> <br>';
echo'Pela informação:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <b>'.$pesquisa.'</b> <br>';
echo'</p>';



//estabelecendo conexão com o servidor
mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");


//selecionando o banco de dados
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");


//executando comando SQL
$resultado= mysql_query($comando) or die("Falha na consulta");//retorna os dados





//estabelecendo conexão com o servidor mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão"); //selecionando o banco de dados mysql_select_db($banco) or die("Não foi possível selecionar o Banco"); //executando comando SQL $resultado= mysql_query($comando) or die("Falha na consulta");//retorna os dados
//fazer uma tabela para organizar o resultado da consulta

echo "<table class='tabela_pesquisa' border='1' cellspacing='0' cellpadding='5' >";
echo "<tr style='font-weight: bold;font-size: 15pt'>";

        echo "<td></td>  \n";
        echo "<td>ID</td>  \n";
        echo "<td>Email</td>  \n";
     //   echo "<td>Senha</td>  \n";
        echo "<td>Nome</td>  \n";
        echo "<td>Cidade</td>  \n";
        echo "<td>País</td>  \n";
 //       echo "<td>Endereço</td>  \n";
// echo "<td>CEP</td>  \n";
        echo "<td>CPF</td>  \n";
        echo "<td>Sexo</td>  \n";
      //  echo "<td>Celular</td>  \n";
        echo "<td>Foto</td>  \n";
       // echo "<td>Civil</td>  \n";
        echo "</tr>  \n";
    //enquanto houver registros do resultado, exibi-los
    while($linha=mysql_fetch_array($resultado)){
 /*   $ra=$linha[0];
    $nome=$linha[1];
    $endereco=$linha[2];
    $telefone=$linha[3]; */

        $ID_Usuario =$linha[12];
        $Email=$linha[0];
        $Senha=$linha[1];
        $Nome=$linha[2];
        $Cidade=$linha[3];
        $Pais=$linha[4];
        $Endereco=$linha[5];
        $CEP=$linha[6];
        $CPF=$linha[7];
        $Sexo=$linha[8];
        $Celular=$linha[9];
        $Foto=$linha[10];
        $Estado_Civil=$linha[11];





    echo "<tr>";
/*
        echo "<td>$ra</td>";
        echo "<td>$nome</td>";
        echo "<td>$endereco</td>";
        echo "<td>$telefone</td>";

*/

        echo'<form action="alterar_usuario.php" target="iframe_alterar" id="alterar" method="post">';

        echo "<td>";
        if($SecLev == 1) {
            echo"<button name='user_id' id='user_id' type='submit' value='$ID_Usuario' class='botao_alterar'>&nbsp;</button> </td>   \n";
        }
        else{
          //  acessoNegado();
        }

        echo "<td>$ID_Usuario</td>   \n";
        echo "<td>$Email</td>  \n";
       // echo "<td>*******</td>  \n";
        echo "<td>$Nome</td>  \n";
        echo "<td>$Cidade</td>  \n";
        echo "<td>$Pais</td>  \n";
       //echo "<td>$Endereco</td>  \n";
       // echo "<td>$CEP</td>  \n";
        echo "<td>$CPF</td>  \n";
        echo "<td>$Sexo</td>  \n";
       // echo "<td>$Celular</td>  \n";
        echo "<td><img src='../_$Foto' class='user_foto_adm'></td>  \n";
       // echo "<td>$Estado_Civil</td>  \n";

echo'</form>  ';


        echo "</tr>  \n";

    } echo "</table>   \n";


?>





