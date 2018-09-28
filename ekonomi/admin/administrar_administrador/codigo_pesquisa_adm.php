
<?php
@session_start();

if($SecLev == 1) {


?>

<center><h1 style="text-align: center; margin-left: 140px">Pesquisa de Administradores</h1></center>

<form name='form_consulta' action='' method='post' autocomplete="off">


    <div id="pesquisacampos">


        <input type="text" placeholder="Pesquisa" class="texto" name="pesquisa" id="pesquisa">

        <select class="texto" name="campo" id="campo">
            <option value="ID_ADM">ID</option>
            <option value="Nome_ADM">Nome</option>
            <option value="Email_ADM">E-mail</option>
            <option value="Nivel_ADM">Nível de segurança</option>

        </select>



        <br>
        <input type='submit' value='Buscar' class="botao"></form>
       
        <form action=""><input type='submit' value='Atualizar' class="botao"></form>






<?php
include "../../include_login/conexao.php";


echo'<!--';
$campo = $_POST['campo'];
$pesquisa = $_POST['pesquisa'];
echo'-->';

if(empty($campo)){
    $campo = 'ID_ADM';
}


echo'<p id="pesq_campos">';
echo'Pesquisando campo: <b>'.$campo.'</b> <br>';
echo'Pela informação:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <b>'.$pesquisa.'</b> <br>';
echo'</p>';







$comando = "select * from adm where $campo like '%$pesquisa%' order by $campo";



mysql_connect($servidor,$usuario,$senha_bd) or die("Falha na conexão");
mysql_select_db($banco) or die("Não foi possível selecionar o Banco");
$resultado= mysql_query($comando) or die("Falha na consulta");//retorna os dados



echo "<table class='tabela_pesquisa' border='1' cellspacing='0' cellpadding='5' >";
echo "<tr style='font-weight: bold;font-size: 15pt'>";

echo "<td></td>  \n";
echo "<td>ID</td>  \n";
echo "<td>Nome</td>  \n";
echo "<td>E-mail</td>  \n";
echo "<td>Nível</td>  \n";
//echo "<td>Senha</td>  \n";
echo "</tr>";

while($linha=mysql_fetch_array($resultado)) {


    $ID_ADM = $linha[0];
    $Nome_ADM = $linha[1];
    $Email_ADM = $linha[2];
    $Senha_ADM = $linha[3];
    $Nivel_ADM = $linha[4];




    echo'<form action="editar_adm.php" target="iframe_alterar" id="alterar" method="post">';

    echo "<td><button name='id_adm' id='id_adm' type='submit' value='$ID_ADM' class='botao_alterar'>&nbsp;</button> </td> </form>  \n";
    echo "<td>$ID_ADM</td>   \n";
    echo "<td>$Nome_ADM</td>  \n";
    echo "<td>$Email_ADM</td>  \n";
    echo "<td><img src='../_imagens/shield-$Nivel_ADM.png' style='width: 40px; height: 40px'></td>  \n";

  //  echo "<td>$Senha_ADM</td>  \n";

    echo "</tr>  \n";

}

echo "</table>   \n";

if($SecLev == 1) {
    echo'<iframe src="editar_adm.php" name="iframe_alterar" style="width: 100%; height: 1000px; border: none;background-color: rgba(236, 246, 239, 0.93);" ></iframe>';
}
else{
    acessoNegado();
}


}
else{
    acessoNegado();
}




?>