
/*

 CRTL SHIFT J NO CHROME


 <script>

 function TestaCPF(strCPF)
 {
 var Soma;
 var Resto;
 Soma = 0;

 if (strCPF == "00000000000") return false;

 for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
 Resto = (Soma * 10) % 11;

 if ((Resto == 10) || (Resto == 11))Resto = 0;
 if (Resto != parseInt(strCPF.substring(9, 10)) ) return false; Soma = 0;

 for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
 Resto = (Soma * 10) % 11;

 if ((Resto == 10) || (Resto == 11)) Resto = 0;
 if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false; return true;

 }

 var strCPF = "12345678909";
 alert(TestaCPF(strCPF));
 </script>





 tNome
 tEmail
 tSenha
 tConfSenha

 tCPF
 tCidade
 tEndereco
 tCEP

 tPais

 tSexo
 estado

 * */




function validacao(){
    document.getElementById("errnome").innerHTML="<p class='erro_cadastro'></p>";
    document.getElementById("erremail").innerHTML="<p class='erro_cadastro'></p>";
    document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'></p>";
    document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'></p>";

    document.formulario_cadastro.tNome.style.borderColor = "#2f2f2f";
    document.formulario_cadastro.tEmail.style.borderColor = "#2f2f2f";
    document.formulario_cadastro.tSenha.style.borderColor = "#2f2f2f";
    document.formulario_cadastro.tConfSenha.style.borderColor = "#2f2f2f";



    ///////////////NOME//////////////////////
    if (document.formulario_cadastro.tNome.value=="")
    {


        document.formulario_cadastro.tNome.focus();
        document.formulario_cadastro.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML="<p class='erro_cadastro'>*Preencha este campo</p>";

        return false;
    }


    if (document.formulario_cadastro.tNome.value.length < 10 )
    {


        document.formulario_cadastro.tNome.focus();
        document.formulario_cadastro.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML="<p class='erro_cadastro'>*Preencha este campo com mais de 10 caracteres</p>";
        return false;


    }

    if (document.formulario_cadastro.tNome.value.length > 50 )
    {
        document.formulario_cadastro.tNome.focus();
        document.formulario_cadastro.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML="<p class='erro_cadastro'>*Preencha este campo com menos de 50 caracteres</p>";
        return false;


    }

    ///////////////EMAIL//////////////////////
    if (document.formulario_cadastro.tEmail.value=="")
    {

        document.formulario_cadastro.tEmail.focus();
        document.formulario_cadastro.tEmail.style.borderColor = "red";

        document.getElementById("erremail").innerHTML="<p class='erro_cadastro'>*Preencha este campo</p>";
        return false;


    }

    if(document.formulario_cadastro.tEmail.value.indexOf('@')==-1 || document.formulario_cadastro.tEmail.value.indexOf('.')==-1){


        document.formulario_cadastro.tEmail.focus();
        document.getElementById("errnome").innerHTML="<p class='erro_cadastro'>*Preencha este campo corretamente</p>";
        return false;


    }




    ///////////////SENHA//////////////////////
    if (document.formulario_cadastro.tSenha.value=="")
    {

        document.formulario_cadastro.tSenha.focus();
        document.formulario_cadastro.tSenha.style.borderColor = "red";

        document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'>*Preencha este campo</p>";
        return false;


    }


    if (document.formulario_cadastro.tSenha.value.length < 5 )
    {
        document.formulario_cadastro.tSenha.focus();
        document.formulario_cadastro.tSenha.style.borderColor = "red";

        document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'>*Preencha este campo com mais de 5 caracteres</p>";
        return false;
    }

    if (document.formulario_cadastro.tSenha.value.length > 20 )
    {
        document.formulario_cadastro.tSenha.focus();
        document.formulario_cadastro.tSenha.style.borderColor = "red";

        document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'>*Preencha este campo com menos de 20 caracteres</p>";
        return false;
    }



    ///////////////CONFIRMAR SENHA//////////////////////
    if (document.formulario_cadastro.tConfSenha.value=="")
    {

        document.formulario_cadastro.tConfSenha.focus();
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

        document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'>*Preencha este campo</p>";
        return false;
    }


    if (document.formulario_cadastro.tConfSenha.value.length < 5 )
    {

        document.formulario_cadastro.tConfSenha.focus();
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

        document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'>*Preencha este campo com mais de 5 caracteres</p>";
        return false;
    }

    if (document.formulario_cadastro.tConfSenha.value.length > 20 )
    {

        document.formulario_cadastro.tConfSenha.focus();
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

        document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'>*Preencha este campo com menos de 20 caracteres</p>";
        return false;
    }

    /////////////// SENHAS IGUAIS//////////////////////
    if(document.formulario_cadastro.tSenha.value != document.formulario_cadastro.tConfSenha.value){

        document.formulario_cadastro.tConfSenha.focus();

        document.formulario_cadastro.tSenha.style.borderColor = "red";
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";
        document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'>*As senhas não correspondem</p>";
        return false;
    }



    /////////////// CPF //////////////////////
    if(document.formulario_cadastro.tCPF.value=""){

        document.formulario_cadastro.tCPF.focus();

        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'>*Complete este campo</p>";
        return false;
    }

    /////////////// CIDADE //////////////////////
    if (document.formulario_cadastro.tCidade.value.length < 30 )
    {
        document.formulario_cadastro.tCidade.focus();
        document.formulario_cadastro.tCidade.style.borderColor = "red";

        document.getElementById("errcidade").innerHTML="<p class='erro_cadastro'>*Preencha este campo com menos de 30 caracteres</p>";
        return false;
    }

    /*
     /////////////// CIDADE //////////////////////
     if (document.formulario_cadastro.tCidade.value.length < 30 )
     {
     document.formulario_cadastro.tCidade.focus();
     document.formulario_cadastro.tCidade.style.borderColor = "red";

     document.getElementById("errcidade").innerHTML="<p class='erro_cadastro'>*Preencha este campo com menos de 30 caracteres</p>";
     return false;
     }


     */





}














































/////////////// VERIFICA SE O CPF É VÁLIDO //////////////////////
function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;

    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'>*CPF inválido por favor, use somente números</p>";
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'>*CPF inválido por favor, use somente números</p>";
        v = true;
        return false;
    }

    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){


        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'>*CPF inválido, por favor, use somente números</p>";


        v = true;
        return false;
    }
    if (!v) {

    }document.formulario_cadastro.tCPF.style.borderColor = "#2f2f2f";
    document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'></p>";
}