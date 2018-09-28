<html>
<head>
    <link rel="shortcut icon" href="../../../imagens/favicon.ico" type="image/x-icon">
    <title>Ekonomi - Enviar Imagens</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../_css/adm_logado_stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../../_css/noticias.css">

    <link rel="stylesheet" type="text/css" href="../../_css/menu_lateral.css">
</head>
<body onload="BtnDivEnvia();" style="background-color: transparent; background-image: none">









<?php


@session_start();
$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];
$SecLev =  $_SESSION["SecLev"];


if($Email_adm == null or $SecLev > 4 or $SecLev < 1){
    header("Location:../../index.php");
}
include "../../../funcoes/funcoes.php";


?>

<?php


if (array_key_exists("excluirimg", $_POST)) {

    conexao();

    $id_imagem = $_POST['excluirimg'];

    $comando0 = "UPDATE imagens_noticias SET valido = 'n' WHERE ID like '$id_imagem'";
    $resultado0 = mysql_query($comando0) or die (mysql_error($comando0));




    echo '<br><br><span style="color: #e50000; margin-top: 100px; font-size: 30px; text-align: center;">Excluindo...</span>
<form action="pesquisa_imgs.php" method="post" target="ifrmigm" id="pesquisaimagem" style="">
<button type="submit" id="procuraimg" name="procuraimg" onclick="BtnDivProcura()" class="botao"  style="width: 300px; height: 70px; font-size: 18pt"><span>Voltar</span></button>
</form>


';


}







// Recebemos os dados digitados pelo usu?rio
if (array_key_exists("procuraimg", $_POST)) {


    conexao();


//CÓDIGO SQL
    $comando = "SELECT * FROM imagens_noticias WHERE valido LIKE 's' ORDER BY ID DESC";
    $resultado = mysql_query($comando);

//enquanto houver registros do resultado, exibi-los
    while ($linha = mysql_fetch_array($resultado)) {


        $id_img = $linha[0];
        $nome_img = $linha[1];
        $caminho_img = $linha[2];
        $obs_img = $linha[3];
        $adm_ID_ADM = $linha[4];


        $nome_img_decode = utf8_decode($nome_img);
        $obs_img_decode = utf8_decode($obs_img);


        $info = utf8_encode("

<br>
<center>
<div class='cont_img' style='width: 90%'>

<table style='height: 200px; color: whitesmoke'>
    <tr>
        <td style='background-color: #131313;'>


                <img src='../../../include_partes/imagens_noticias/$caminho_img' class='img_pesquisada'>

        </td>
        <td >

            <div style='padding-left: 50px'>

                <span style='font-size: 25px'>Informações</span><br>
                <span>Título da imagem: <strong>$nome_img_decode</strong></span><br>
                <span>Descrição da imagem: $obs_img_decode</span><br>

                <span>Código de incorporação</span>
                <br>
                <textarea style='width: 400px; height: 100px;'>");
$info3 = utf8_encode(" </textarea>

            </div>


        </td>
        <td>

        <form action='' method='post' >
        <button type='submit' value='$id_img' name='excluirimg' class='excluir_img'></button><br>
        </form>
       <!-- <div class='copiar_img'></div><br> -->

</td>

    </tr>
</table>



</div>
</center>
<br>
        ");


        echo $info;

   ?><img src="http://localhost/ekonomi/include_partes/imagens_noticias/<?php echo$caminho_img ?>" alt="<?php echo$nome_img ?>" class="img_not"><br>
        <?php echo $info3;





    }


}










?>



</body></html>

