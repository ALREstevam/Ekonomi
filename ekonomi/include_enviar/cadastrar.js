
/*

CRTL SHIFT J NO CHROME








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
 tEstado_civil

* */



function limpar(){
    document.getElementById("errnome").innerHTML="<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tNome.style.borderColor = "#2f2f2f";


    document.getElementById("erremail").innerHTML="<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tEmail.style.borderColor = "#2f2f2f";


    document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tSenha.style.borderColor = "#2f2f2f";


    document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tConfSenha.style.borderColor = "#2f2f2f";

}

function validacao() {
    document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tNome.style.borderColor = "#2f2f2f";


    document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tEmail.style.borderColor = "#2f2f2f";


    document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tSenha.style.borderColor = "#2f2f2f";


    document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_cadastro.tConfSenha.style.borderColor = "#2f2f2f";


    ///////////////NOME//////////////////////
    if (document.formulario_cadastro.tNome.value == "") {


      //  document.formulario_cadastro.tNome.focus();
        document.formulario_cadastro.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        return false;
    }


    if (document.formulario_cadastro.tNome.value.length < 10) {


     //   document.formulario_cadastro.tNome.focus();
        document.formulario_cadastro.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 10 caracteres</p>";
        return false;


    }

    if (document.formulario_cadastro.tNome.value.length > 50) {
      //  document.formulario_cadastro.tNome.focus();
        document.formulario_cadastro.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 50 caracteres</p>";
        return false;


    }

    ///////////////EMAIL//////////////////////
    if (document.formulario_cadastro.tEmail.value == "") {

       // document.formulario_cadastro.tEmail.focus();
        document.formulario_cadastro.tEmail.style.borderColor = "red";

        document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";
        return false;


    }

    if (document.formulario_cadastro.tEmail.value.indexOf('@') == -1 || document.formulario_cadastro.tEmail.value.indexOf('.') == -1) {


        document.formulario_cadastro.tEmail.style.borderColor = "red";
        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo corretamente</p>";
        return false;


    }


    ///////////////SENHA//////////////////////
    if (document.formulario_cadastro.tSenha.value == "") {

       // document.formulario_cadastro.tSenha.focus();
        document.formulario_cadastro.tSenha.style.borderColor = "red";

        document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";
        return false;


    }


    if (document.formulario_cadastro.tSenha.value.length < 5) {
        document.formulario_cadastro.tSenha.focus();
        document.formulario_cadastro.tSenha.style.borderColor = "red";

        document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 5 caracteres</p>";
        return false;
    }

    if (document.formulario_cadastro.tSenha.value.length > 20) {
    //    document.formulario_cadastro.tSenha.focus();
        document.formulario_cadastro.tSenha.style.borderColor = "red";

        document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 20 caracteres</p>";
        return false;
    }


    ///////////////CONFIRMAR SENHA//////////////////////
    if (document.formulario_cadastro.tConfSenha.value == "") {

     //   document.formulario_cadastro.tConfSenha.focus();
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";
        return false;
    }


    if (document.formulario_cadastro.tConfSenha.value.length < 5) {

    //    document.formulario_cadastro.tConfSenha.focus();
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 5 caracteres</p>";
        return false;
    }

    if (document.formulario_cadastro.tConfSenha.value.length > 20) {

      //  document.formulario_cadastro.tConfSenha.focus();
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 20 caracteres</p>";
        return false;
    }

    /////////////// SENHAS IGUAIS//////////////////////
    if (document.formulario_cadastro.tSenha.value != document.formulario_cadastro.tConfSenha.value) {

      //  document.formulario_cadastro.tConfSenha.focus();

        document.formulario_cadastro.tSenha.style.borderColor = "red";
        document.formulario_cadastro.tConfSenha.style.borderColor = "red";
        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*As senhas não correspondem</p>";
        return false;
    }

    else{

        document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'></p>";
        document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'></p>";

        document.formulario_cadastro.tSenha.style.borderColor = "#2f2f2f";
        document.formulario_cadastro.tConfSenha.style.borderColor = "#2f2f2f";

    }
    var cpf;

cpf = document.formulario_cadastro.tCPF.value;

        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")

            return false;

        add = 0;

        for (i=0; i < 9; i ++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        add = 0;
        for (i = 0; i < 10; i ++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        //  alert('O CPF INFORMADO É VÁLIDO.');
        document.formulario_cadastro.tCPF.style.borderColor = "#2f2f2f";
        document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'></p>";
        return true;
















}
























    function nome() {
        ///////////////NOME//////////////////////
        if (document.formulario_cadastro.tNome.value == "") {


            //   document.formulario_cadastro.tNome.focus();
            document.formulario_cadastro.tNome.style.borderColor = "red";

            document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

            return false;
        }


        else if (document.formulario_cadastro.tNome.value.length < 10) {


            // document.formulario_cadastro.tNome.focus();
            document.formulario_cadastro.tNome.style.borderColor = "red";

            document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 10 caracteres</p>";
            return false;


        }

       else if (document.formulario_cadastro.tNome.value.length > 50) {
            //   document.formulario_cadastro.tNome.focus();
            document.formulario_cadastro.tNome.style.borderColor = "red";

            document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 50 caracteres</p>";
            return false;


        }
        else{
                document.getElementById("errnome").innerHTML="<p class='erro_cadastro'></p>";
                document.formulario_cadastro.tNome.style.borderColor = "#2f2f2f";}




    }

        function email() {
            ///////////////EMAIL//////////////////////
            if (document.formulario_cadastro.tEmail.value == "") {

                //  document.formulario_cadastro.tEmail.focus();
                document.formulario_cadastro.tEmail.style.borderColor = "red";

                document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";
                return false;


            }

           else if (document.formulario_cadastro.tEmail.value.indexOf('@') == -1 || document.formulario_cadastro.tEmail.value.indexOf('.') == -1) {


                //    document.formulario_cadastro.tEmail.focus();
                document.formulario_cadastro.tEmail.style.borderColor = "red";
                document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo corretamente</p>";
                return false;

            }
            else{
                document.getElementById("erremail").innerHTML="<p class='erro_cadastro'></p>";
                document.formulario_cadastro.tEmail.style.borderColor = "#2f2f2f";}





        }


            function senha() {
                ///////////////SENHA//////////////////////
                if (document.formulario_cadastro.tSenha.value == "") {

                    //    document.formulario_cadastro.tSenha.focus();
                    document.formulario_cadastro.tSenha.style.borderColor = "red";

                    document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";
                    return false;


                }


               else if (document.formulario_cadastro.tSenha.value.length < 5) {
                    //    document.formulario_cadastro.tSenha.focus();
                    document.formulario_cadastro.tSenha.style.borderColor = "red";

                    document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 5 caracteres</p>";
                    return false;
                }

               else if (document.formulario_cadastro.tSenha.value.length > 20) {
                    //   document.formulario_cadastro.tSenha.focus();
                    document.formulario_cadastro.tSenha.style.borderColor = "red";

                    document.getElementById("errsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 20 caracteres</p>";
                    return false;
                }

                else{
                    document.getElementById("errsenha").innerHTML="<p class='erro_cadastro'></p>";
                    document.formulario_cadastro.tSenha.style.borderColor = "#2f2f2f";
                }



            }

                function confsenha() {
                    ///////////////CONFIRMAR SENHA//////////////////////
                    if (document.formulario_cadastro.tConfSenha.value == "") {

                        // document.formulario_cadastro.tConfSenha.focus();
                        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

                        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";
                        return false;
                    }


                   else if (document.formulario_cadastro.tConfSenha.value.length < 5) {

                        //  document.formulario_cadastro.tConfSenha.focus();
                        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

                        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 5 caracteres</p>";
                        return false;
                    }

                  else if (document.formulario_cadastro.tConfSenha.value.length > 20) {

                        //    document.formulario_cadastro.tConfSenha.focus();
                        document.formulario_cadastro.tConfSenha.style.borderColor = "red";

                        document.getElementById("errconfsenha").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 20 caracteres</p>";
                        return false;
                    }
                    else{
                        document.getElementById("errconfsenha").innerHTML="<p class='erro_cadastro'></p>";
                        document.formulario_cadastro.tConfSenha.style.borderColor = "#2f2f2f";
                    }


                }





/////////////// VERIFICA SE O CPF É VÁLIDO //////////////////////



function cpfbranco() {
alert("oeee");
    if (document.formulario_cadastro.tCPF.value = "") {

         document.formulario_cadastro.tCPF.focus();

        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.getElementById("errcpf").innerHTML = "<p class='erro_cadastro'>*Complete este campo</p>";
        return false;
    }

}
/*
function cpf(c){

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
    if (!v) {  }document.formulario_cadastro.tCPF.style.borderColor = "#2f2f2f";
    document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'></p>";


}


*/

function VerificaCPF () {
    if (vercpf(document.formulario_cadastro.tCPF.value))
    {
        //document.formulario_cadastro.submit();
    } else {
        errors="1";if (errors) //alert('CPF inválido');
        document.retorno = (errors == '');

       /////
        document.formulario_cadastro.tCPF.style.borderColor = "red";
        document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'>*CPF inválido, por favor, use somente números</p>";
        return false;
        /////
    }
}

function vercpf (cpf) {
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")

        return false;

    add = 0;

    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
  //  alert('O CPF INFORMADO É VÁLIDO.');
    document.formulario_cadastro.tCPF.style.borderColor = "#2f2f2f";
    document.getElementById("errcpf").innerHTML="<p class='erro_cadastro'></p>";
         return true;
}