function botaoimg(){
    var texto = document.getElementById("texto").value;
    document.getElementById("texto").value = texto + '\n<img src="" class="img_not">';


    // document.getElementById("texto").innerHTML = '<img src="" class="img_not">';


}

function botaop(){
    var texto = document.getElementById("texto").value;
    document.getElementById("texto").value = texto + '\n<p></p>';


    //document.getElementById("setado").innerHTML = '';

}

cont = 0;
function exibeBox(){
   // document.getElementById("dv_box").style.display = "none";
    cont++;


    if (cont % 2 == 0) {

        document.getElementById("dv_box").style.display = "none"; //SOME


    }else{

        document.getElementById("dv_box").style.display = "block"; //APARECE


    }


}
function abreBox(){
    document.getElementById("dv_box").style.display = "block";
}



function fechaBox(){


     document.getElementById("dv_box").style.display = "none";
   // document.getElementById("dv_box").style.display = "block";
}






