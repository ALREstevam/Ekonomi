<?php
@session_start();



$Nome_auto = $_SESSION["Nome"];
$Email_auto = $_SESSION["Email"];
$Sexo = $_SESSION["Sexo"];

?>




<meta charset=utf-8" />


<script src="../include/mensagem.js"></script>


<script src="../js/data_hoje.js"></script>

<link rel="stylesheet" type="text/css" href="../estilos/stylesheet_formatacao_de_input.css">
<section id="conteudo" class="conteudo">
<h2> Envie-nos sua mensagem </h2>
    <fieldset id="contato_fieldset">
        <legend>Formulário de Contato:</legend>
    <div id="contato">



<?php echo'
<form name="formulario_contato" action="include_partes/Enviar_comentario.php" method="post" onsubmit="return validacao();">
'; ?>

<?php echo'
    <label for="cNome">Nome completo:</label>
   <input type="text" id="cNome" name="tNome" placeholder="Seu nome aqui" maxlength="50" class="texto" readonly alt="Este campo não pode ser editado" onblur="nome();" value="'.$Nome_auto.'" >
    <div id="errnome"></div>



    <label for="cEmail">E-mail:</label>
    <input type="email" id="cEmail" name="tEmail" placeholder="exemplo@servidor.com" maxlength="35" readonly alt="Este campo não pode ser editado" class="texto" onblur="email();" value="'.$Email_auto.'">
    <div id="erremail"></div>

    <p>

    Sexo:<br>
    ';



if($Sexo == "masculino")
echo'
     <div id="div_radio"><p>
    <input type="radio" name="tSexo" value="masculino" class="radio" name="tSexo" checked >Masculino<br>
    <input type="radio" name="tSexo" value="feminino" class="radio" name="tSexo">Feminino<br>
';
else if($Sexo == "feminino"){
    echo'
     <div id="div_radio"><p>
    <input type="radio" name="tSexo" value="masculino" class="radio" name="tSexo"  >Masculino<br>
    <input type="radio" name="tSexo" value="feminino" class="radio" name="tSexo"checked >Feminino<br>
';
}
else{
    echo'
     <div id="div_radio"><p>
    <input type="radio" name="tSexo" value="masculino" class="radio" name="tSexo"  checked>Masculino<br>
    <input type="radio" name="tSexo" value="feminino" class="radio" name="tSexo"  checked >Feminino<br>
';
}
?>


</p>
           </div>



    <label for="cMensgem">Escreva aqui sua mensagem:</label>
    <textarea value="" name="tComentario" id=cMensgem rows="10" cols="50" maxlength="600" placeholder="Escreva seu texto aqui" class="texto" style="width: 80%; margin-left: 10px; max-width: 500px;" onblur="mensagem();">  </textarea>
    <div id="errmensagem"></div>





    <div id=""><p>
        <p>
        Este comentário pode ser postado no site:<br>
        <input type="checkbox" name="tPostar" value="s" class="radio" name="cPostar" >Concordo<br>
    </p>

        </div>




    <input type="text" id="time_sqlf" name="time_sqlf" hidden="hidden">
    <input type="text" id="time_txtf" name="time_txtf" hidden="hidden">

    <script>
        document.getElementById("time_sqlf").value = data_hoje_sqlformat;
        document.getElementById("time_txtf").value = data_hoje_txtformat;
    </script>






    <p>
    <input type="submit" value="Enviar " class="botao" style="margin-left: 5%" onclick="validacao();" >
    <input type="reset" value="Limpar" class="botao" onclick="limpar();">
    </p>

       <?php echo"
</form>
</div>
"; ?>
        </fieldset>
</section>
