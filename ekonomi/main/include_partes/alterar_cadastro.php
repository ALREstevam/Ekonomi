

<meta charset=utf-8" />
<script type="text/javascript" src="../include_enviar/cadastrar.js"></script>
<link rel="stylesheet" type="text/css" href="../estilos/stylesheet_formatacao_de_input.css">

<script src="../include/imagem_selecionada.js"></script>





<section id="conteudo" class="conteudo">
<?php
include"../include_login/conexao.php";

$Email_consulta = $_SESSION["Email"];

//echo"<script> alert(' $Email_consulta '); </script>";



$comando_pesquisa_email="SELECT * FROM usuario WHERE Email = '$Email_consulta' ";
$resultado_pesquisa_email= mysql_query($comando_pesquisa_email) or die("Falha na consulta <br>".mysql_error());

//echo"<script> alert(' $resultado_pesquisa_email '); </script>";



$num = mysql_num_rows($resultado_pesquisa_email);
//Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
if($num > 0) {
//Retorna os dados do banco
    $rst_cons = mysql_fetch_array($resultado_pesquisa_email);

    $Email_cons = $rst_cons["Email"];
    $Senha_cons = $rst_cons["Senha"];
    $Nome_cons = $rst_cons["Nome"];
    $Cidade_cons = $rst_cons["Cidade"];
    $Pais_cons = $rst_cons["Pais"];
    $Endereco_cons = $rst_cons["Endereco"];
    $CEP_cons = $rst_cons["CEP"];
    $CPF_cons = $rst_cons["CPF"];
    $Sexo_cons = $rst_cons["Sexo"];
    $Celular_cons = $rst_cons["Celular"];
    $Foto_cons = $rst_cons["Foto"];
    $Estado_Civil_cons = $rst_cons["Estado_Civil"];


    //$ = $rst[""];

}

echo'







    <div id="contato" >
<h2> Edite aqui seus dados pessoais </h2>



<form name="formulario_cadastro" action="include_partes/enviar_cadastro_alterado.php" method="post" onsubmit="return validacao();VerificaCPF();" >


    <fieldset id="cadastro_fieldlist">
        <legend> Cadastro principal:</legend>


    <label for="cNome">Nome completo:</label>
    <input type="text" name="tNome" id="cNome" placeholder="Seu nome aqui" maxlength="50" class="texto"  onblur="return nome();" value="'.$Nome_cons.'" required>
<div id="errnome"></div>

    <label for="cEmail">Email:</label>
    <input type="email" name="tEmail" id="cEmail" placeholder="exemplo@servidor.com" maxlength="30" class="texto" onblur="return email();" value="'.$Email_cons.'" required>

        <div id="erremail"></div>


    <label for="cSenha">Senha:</label>
    <input type="password" name="tSenha" id="cSenha" placeholder="Senha" maxlength="20" class="texto" onblur="return senha();" required>

        <div id="errsenha"></div>

    <label for="cConfSenha">Confirme a senha:</label>
   <input type="password" name="tConfSenha" id="cConfSenha" placeholder="Senha" maxlength="20" class="texto" onblur="return confsenha();" required>

        <div id="errconfsenha"></div>


<p style="font-size:14px;font-style: italic ">*Você precisa confirmar sua senha antiga aqui ou escolher uma nova</p>
</fieldset>


    <fieldset id="endereco">
        <legend> Endereço e dados pessoais:</legend>

    <label for="cCPF">CPF:</label>
    <input type="number" name="tCPF" id="cCPF" placeholder="12345678912" maxlength="11" class="texto" onblur="VerificaCPF();" value="'.$CPF_cons.'" required>

        <div id="errcpf"></div>

        <label for="cCelular">Celular:</label>
        <input type="tel" name="tCelular" id="cCelular" placeholder="9-9999-9999" maxlength="30" class="texto" value="'.$Celular_cons.'">



    <label for="cCidade">Cidade:</label>
    <input type="text" name="tCidade" id="cCidade" placeholder="Cidade" maxlength="30" class="texto" value="'.$Cidade_cons.'">

      <!--   <div id="errcidade"></div> -->

    <label for="cEndereco">Endereço:</label>
    <input type="text" name="tEndereco" id="cEndereco" placeholder="Rua, Bairro, Apto" maxlength="50" class="texto" value="'.$Endereco_cons.'";>

       <!--    <div id="errendereco"></div>  -->


    <label for="cCEP">CEP:</label>
    <input type="text" name="tCEP" id="cCEP" placeholder="0000-000" maxlength="30" class="texto" value="'.$CEP_cons.'";>

       <!--    <div id="errcep"></div>  -->


    <label for="cPais">País:</label>
    <input type="text" list="Paises" name="tPais" id="cPais" maxlength="40" placeholder="Seu país" class="texto" value="'.$Pais_cons.'";>

    <datalist id="Paises">

';
?>
        <?php

            include("include_enviar/options.html");

        ?>
    </datalist>
</fieldset>






    <fieldset id="fieldset_imagem">
        <legend> Imagem de usuário:</legend>
        <div id="div_imagem"><p>



       <tr>


           <table width="100%">
               <tr>
                   <th> <label for="cImg1"> <img src="imagens/users1.png"  class="user_img"></label><div id="users1" name="div_user" class="div_marcafoto" ></div></th>
                   <th> <label for="cImg2"> <img src="imagens/users2.png"  class="user_img"></label><div id="users2" name="div_user" class="div_marcafoto"></div></th>
                   <th> <label for="cImg3">  <img src="imagens/users3.png" class="user_img"></label><div id="users3" name="div_user" class="div_marcafoto"></div></th>


               </tr>
               <tr>
                   <td><input type="radio" name="tImagem" id="cImg1" value="1" class="radio_hidden" onclick="img_selecionada('cImg1');"></td>
                   <td><input type="radio" name="tImagem" id="cImg2" value="2" class="radio_hidden" onclick="img_selecionada('cImg2');"></td>
                   <td><input type="radio" name="tImagem" id="cImg3" value="3" class="radio_hidden" onclick="img_selecionada('cImg3');"></td>


               </tr>
           </table>




           <table   width="100%">
               <tr>

                   <th> <label for="cImg4"> <img src="imagens/users7.png"  class="user_img" ></label><div id="users4" name="div_user" class="div_marcafoto"></div></th>
                   <th> <label for="cImg5"> <img src="imagens/users4.png"  class="user_img"></label><div id="users5" name="div_user" class="div_marcafoto"></div></th>
                   <th> <label for="cImg6"> <img src="imagens/users5.png"  class="user_img"></label><div id="users6" name="div_user" class="div_marcafoto"></div></th>

                   </th>


               </tr>
               <tr>

                   <td><input type="radio" name="tImagem" id="cImg4"  value="4" class="radio_hidden" onclick="img_selecionada('cImg4');"></td>
                   <td><input type="radio" name="tImagem" id="cImg5" value="5" class="radio_hidden" onclick="img_selecionada('cImg5');"></td>
                   <td><input type="radio" name="tImagem" id="cImg6" value="6" class="radio_hidden" onclick="img_selecionada('cImg6');"></td>

                   </td>


               </tr>
           </table>

           <table  width="100%">

               <tr>
                   <th><label for="cImg7"><img src="imagens/users8.png"  class="user_img"></label><div id="users7" name="div_user" class="div_marcafoto"></div></th>
                   <th><label for="cImg8"><img src="imagens/users9.png"  class="user_img"></label><div id="users8" name="div_user" class="div_marcafoto"></div></th>
                   <th><label for="cImg9"><img src="imagens/users10.png"  class="user_img"></label><div id="users9" name="div_user" class="div_marcafoto"></div></th>

               </tr>

               <tr>
               <td><input type="radio" name="tImagem" id="cImg7"  value="7" class="radio_hidden" onclick=" img_selecionada('cImg7'); "></td>
               <td><input type="radio" name="tImagem" id="cImg8"  value="8" class="radio_hidden" onclick=" img_selecionada('cImg8'); "></td>
               <td><input type="radio" name="tImagem" id="cImg9" value="9" class="radio_hidden" onclick=" img_selecionada('cImg9'); "></td>

               </tr>

           </table>


        </div>
    </fieldset>
<?php
$Foto_cons;

if($Foto_cons == 'imagens/users1.png'){
    echo'
<script>
    document.getElementById("cImg1").checked = true;
    document.getElementById("cImg1").click();
</script>
';
}


if($Foto_cons == 'imagens/users2.png'){
    echo'
<script>
    document.getElementById("cImg2").checked = true;
    document.getElementById("cImg2").click();
</script>
';

}
if($Foto_cons == 'imagens/users3.png'){
    echo'
<script>
    document.getElementById("cImg3").checked = true;
    document.getElementById("cImg3").click();
</script>
';
}
if($Foto_cons == 'imagens/users4.png'){
    echo'
<script>
    document.getElementById("cImg5").checked = true;
    document.getElementById("cImg5").click();
</script>
';
}
if($Foto_cons == 'imagens/users5.png'){
    echo'
<script>
    document.getElementById("cImg6").checked = true;
    document.getElementById("cImg6").click();
</script>
';
}
if($Foto_cons == 'imagens/users7.png'){
    echo'
<script>
    document.getElementById("cImg4").checked = true;
    document.getElementById("cImg4").click();
</script>
';
}
if($Foto_cons == 'imagens/users8.png'){
    echo'
<script>
    document.getElementById("cImg7").checked = true;
    document.getElementById("cImg7").click();
</script>
';
}
if($Foto_cons == 'imagens/users9.png'){
    echo'
<script>
    document.getElementById("cImg8").checked = true;
    document.getElementById("cImg8").click();
</script>
';
}
if($Foto_cons == 'imagens/users10.png'){
    echo'
<script>

    document.getElementById("cImg9").checked = true;
    document.getElementById("cImg9").click();
</script>';
}




?>








<?php
if($Sexo_cons == "masculino"){
echo'

<fieldset id="sexo">
    <legend> Sexo:</legend>
        <div id="div_radio"><p>
    <input type="radio" name="tSexo" value="m" class="radio" checked>Masculino
    <input type="radio" name="tSexo" value="f" class="radio">Feminino
        </div>
</fieldset>
';
}



else if ($Sexo_cons == "feminino"){
echo'
<fieldset id="sexo">
    <legend> Sexo:</legend>
    <div id="div_radio"><p>
            <input type="radio" name="tSexo" value="m" class="radio" >Masculino
            <input type="radio" name="tSexo" value="f" class="radio" checked>Feminino
    </div>
</fieldset>
';
}


else{

echo'
<fieldset id="sexo">
    <legend> Sexo:</legend>
    <div id="div_radio"><p>
            <input type="radio" name="tSexo" value="m" class="radio" >Masculino
            <input type="radio" name="tSexo" value="f" class="radio" >Feminino
    </div>
</fieldset>
';

}

?>











<?php

if($Estado_Civil_cons == "Casado"){
echo'
    <fieldset id="estado_civil" >
        <legend> Estado Civil:</legend>

        <input type="radio" name="tEstado_civil" value="Solteiro" class="radio" >Solteiro(a)
        <input type="radio" name="tEstado_civil" value="Casado" class="radio" checked>Casado(a)
        <input type="radio" name="tEstado_civil" value="Viuvo" class="radio">Viúvo(a)
        <input type="radio" name="tEstado_civil" value="Divorciado" class="radio">Divorciado(a)
    </p>
    </fieldset>
';}



else if($Estado_Civil_cons == "Viuvo"){
    echo'
    <fieldset id="estado_civil" >
        <legend> Estado Civil:</legend>

        <input type="radio" name="tEstado_civil" value="Solteiro" class="radio" >Solteiro(a)
        <input type="radio" name="tEstado_civil" value="Casado" class="radio">Casado(a)
        <input type="radio" name="tEstado_civil" value="Viuvo" class="radio" checked >Viúvo(a)
        <input type="radio" name="tEstado_civil" value="Divorciado" class="radio">Divorciado(a)
    </p>
    </fieldset>
';}


else if($Estado_Civil_cons == "Solteiro"){
    echo'
    <fieldset id="estado_civil" >
        <legend> Estado Civil:</legend>

        <input type="radio" name="tEstado_civil" value="Solteiro" class="radio" checked>Solteiro(a)
        <input type="radio" name="tEstado_civil" value="Casado" class="radio">Casado(a)
        <input type="radio" name="tEstado_civil" value="Viuvo" class="radio">Viúvo(a)
        <input type="radio" name="tEstado_civil" value="Divorciado" class="radio">Divorciado(a)
    </p>
    </fieldset>
';}



else if($Estado_Civil_cons == "Divorciado"){
    echo'
    <fieldset id="estado_civil" >
        <legend> Estado Civil:</legend>

        <input type="radio" name="tEstado_civil" value="Solteiro" class="radio" >Solteiro(a)
        <input type="radio" name="tEstado_civil" value="Casado" class="radio">Casado(a)
        <input type="radio" name="tEstado_civil" value="Viuvo" class="radio">Viúvo(a)
        <input type="radio" name="tEstado_civil" value="Divorciado" class="radio" checked >Divorciado(a)
    </p>
    </fieldset>
';}




else{
    echo'
    <fieldset id="estado_civil" >
        <legend> Estado Civil:</legend>

        <input type="radio" name="tEstado_civil" value="Solteiro" class="radio" >Solteiro(a)
        <input type="radio" name="tEstado_civil" value="Casado" class="radio">Casado(a)
        <input type="radio" name="tEstado_civil" value="Viuvo" class="radio">Viúvo(a)
        <input type="radio" name="tEstado_civil" value="Divorciado" class="radio">Divorciado(a)
    </p>
    </fieldset>
';}

?>
















    <p>
    <input type="submit" value="Enviar " class="botao" style="margin-left: 5%"  onclick="VerificaCPF()" onmouseover="validacao();">
    <input type="reset" value="Limpar" class="botao" onclick="limpar()">




         <input type="button" value="Excluir" class="botao" onclick=" location.reload();location.href='main_excluir_conta.php' ">




</p>

</form>





</div>
</section>












