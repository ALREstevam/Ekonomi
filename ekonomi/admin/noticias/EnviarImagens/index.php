<?php


@session_start();
$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];
$SecLev =  $_SESSION["SecLev"];



echo"<span style='float: left; font-size: 35px'>$Nome_adm</span>
     <span style='float: right'>$Email_adm</span> <br><br>";



if($Email_adm == null or $SecLev > 4 or $SecLev < 1){
    header("Location:../index.php");

}
?>


<?php
    $conteudo=utf8_encode('


<div id="muda_box">

<table>
<tr>
<td>
<form>
<button type="button" id="carregaimg" onclick="BtnDivEnvia()" class="botao" style="width: 450px; height: 70px; font-size: 23pt"><img src="../_imagens/upload-icon.png" style="width: 40px; position: absolute; border-radius: 100%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 30px">Carregar imagem &nbsp;</span></button>
</form>
</td>

<td>
<form action="EnviarImagens/pesquisa_imgs.php" method="post" target="ifrmigm">
<button type="submit" id="procuraimg" name="procuraimg" onclick="BtnDivProcura()" class="botao"  style="width: 450px; height: 70px; font-size: 23pt"><img src="../_imagens/google-web-search-256.png" style="width: 40px; position: absolute; border-radius: 100%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Procurar imagens</span></button>
</form>
</td>
</tr>
</table>

    <br><br>
</div>





<div id="dv_envia">
<form method="post" enctype="multipart/form-data" action="">

<div style="text-align: left;">

        Selecione uma imagem: <br><input name="arquivo" type="file" style="font-size: 20px"><br><br>

    <label for="titulo_imagem">Título da imagem: </label>
    <input type="text" name="titulo_imagem" class="texto" style="width: 50%"  placeholder="Título"><br><br>





    <textarea class="texto" name="obs_arquivo" style="width: 65%; height: 100px" placeholder="Descrição" required></textarea><br><br>

     <input type="submit" value="Salvar" class="botao" name="enviarimagem" name="enviarimagem" ><br><br>
</div>


</form>
</div>


<div id="dv_abre" >

');

$conteudo1=utf8_encode('

</div>



<script>


    function BtnDivProcura() {
        document.getElementById("dv_envia").style.display = "none";
        document.getElementById("dv_abre").style.display = "block";
        document.getElementById("imgenviado").style.display = "none";
    }


    function BtnDivEnvia() {
        document.getElementById("dv_abre").style.display = "none";
        document.getElementById("dv_envia").style.display = "block";
        document.getElementById("imgenviado").style.display = "block";
    }








</script>



 ');

echo $conteudo;
?>
<script>

    function ajustar()
    {
        try{
            var oBody       =       ifrm.document.body;
            var oFrame      =       document.all("ifrmigm");
            oFrame.style.height = oBody.scrollHeight + (oBody.offsetHeight - oBody.clientHeight);
            oFrame.style.width = oBody.scrollWidth + (oBody.offsetWidth - oBody.clientWidth);
        }
        catch(e)
        {
            window.status = 'Error: ' + e.number + '; ' + e.description;
        }
    }

</script>


<?php
echo'<iframe src="pesquisa_imgs.php" onresize="ajustar()" onload="ajustar()"  id="ifrmigm" name="ifrmigm" style="width: 100%; min-height: 800px; height: 400%; border: none; overflow-x: hidden;"></iframe>';
echo $conteudo1;

 ?>

<?php

if (array_key_exists("enviarimagem", $_POST)) {

    include'recebeUpload.php';



}


?>