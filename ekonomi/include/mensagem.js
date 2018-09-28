
function limpar() {
    document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_contato.tNome.style.borderColor = "#2f2f2f";

    document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_contato.tEmail.style.borderColor = "#2f2f2f";

    document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'></p>";
    throw document.formulario_contato.tComentario.style.borderColor = "#2f2f2f";






}
function validacao() {

    document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_contato.tNome.style.borderColor = "#2f2f2f";

    document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_contato.tEmail.style.borderColor = "#2f2f2f";

    document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'></p>";
    document.formulario_contato.tComentario.style.borderColor = "#2f2f2f";

    //////////////////////////////////////////////////////////////////////////////
var erro = 0;
    ///////////////NOME//////////////////////

    if (document.formulario_contato.tNome.value == "") {



        document.formulario_contato.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        
        return false;
    }


    if (document.formulario_contato.tNome.value.length < 10) {



        document.formulario_contato.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 10 caracteres</p>";

        
        return false;


    }

    if (document.formulario_contato.tNome.value.length > 50) {


        document.formulario_contato.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 50 caracteres</p>";

        
        return false;


    }

    ///////////////EMAIL//////////////////////
    if (document.formulario_contato.tEmail.value == "") {


        document.formulario_contato.tEmail.style.borderColor = "red";

        document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        
        return false;


    }

    if (document.formulario_contato.tEmail.value.indexOf('@') == -1 || document.formulario_contato.tEmail.value.indexOf('.') == -1) {


        document.formulario_contato.tEmail.style.borderColor = "red";
        document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo corretamente</p>";

        
        return false;


    }


    ///////////////MENSAGEM//////////////////////
    if (document.formulario_contato.tComentario.value == "") {



        document.formulario_contato.tComentario.style.borderColor = "red";

        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        
        return false;
    }


    if (document.formulario_contato.tComentario.value.length < 20) {



        document.formulario_contato.tComentario.style.borderColor = "red";

        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 20 caracteres</p>";

        
        return false;


    }

    if (document.formulario_contato.tComentario.value.length > 300) {


        document.formulario_contato.tComentario.style.borderColor = "red";

        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 300 caracteres</p>";

        
        return false;


    }







}


function nome(){

    ///////////////NOME//////////////////////

    if (document.formulario_contato.tNome.value == "") {



        document.formulario_contato.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        
        return false;
    }


    else if (document.formulario_contato.tNome.value.length < 10) {



        document.formulario_contato.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 10 caracteres</p>";

        
        return false;


    }

    else if (document.formulario_contato.tNome.value.length > 50) {


        document.formulario_contato.tNome.style.borderColor = "red";

        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 50 caracteres</p>";

        
        return false;


    }
    else{    
        document.getElementById("errnome").innerHTML = "<p class='erro_cadastro'></p>";
        document.formulario_contato.tNome.style.borderColor = "#2f2f2f";
    }


}
function email(){
    ///////////////EMAIL//////////////////////
    if (document.formulario_contato.tEmail.value == "") {


        document.formulario_contato.tEmail.style.borderColor = "red";

        document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        
        return false;


    }

    else if (document.formulario_contato.tEmail.value.indexOf('@') == -1 || document.formulario_contato.tEmail.value.indexOf('.') == -1) {


        document.formulario_contato.tEmail.style.borderColor = "red";
        document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'>*Preencha este campo corretamente</p>";

        
        return false;


    }
    else{    
        document.getElementById("erremail").innerHTML = "<p class='erro_cadastro'></p>";
        document.formulario_contato.tNome.style.borderColor = "#2f2f2f";
    }



}
function mensagem(){

    ///////////////MENSAGEM//////////////////////
    if (document.formulario_contato.tComentario.value == "") {



        document.formulario_contato.tComentario.style.borderColor = "red";

        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'>*Preencha este campo</p>";

        
        return false;
    }


  else  if (document.formulario_contato.tComentario.value.length < 1) {



        document.formulario_contato.tComentario.style.borderColor = "red";

        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com mais de 50 caracteres</p>";

        
        return false;


    }

   else if (document.formulario_contato.tComentario.value.length > 400) {


        document.formulario_contato.tComentario.style.borderColor = "red";

        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'>*Preencha este campo com menos de 400 caracteres</p>";

        
        return false;


    }
    
    else{   
        document.getElementById("errmensagem").innerHTML = "<p class='erro_cadastro'></p>";
        document.formulario_contato.tNome.style.borderColor = "#2f2f2f";
    }
}