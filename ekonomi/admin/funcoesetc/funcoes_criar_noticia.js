data = new Date();
dia = data.getDate();
mes = data.getMonth();
ano = data.getFullYear();

mes = mes+1;

if(mes <= 9){
    mes = '0'+mes;
}
if(dia <= 9){
    dia = '0'+dia;
}

var data_hoje_sqlformat = (ano + '-' + mes + '-' + dia);


//////////////////////////////////////////////////////////////

data = new Date();
diatxt = data.getDate();
mestxt = data.getMonth();
anotxt = data.getFullYear();

mesestxt = new Array(12);

mesestxt[0] = "Janeiro";
mesestxt[1] = "Fevereiro";
mesestxt[2] = "Março";
mesestxt[3] = "Abril";
mesestxt[4] = "Maio";
mesestxt[5] = "Junho";
mesestxt[6] = "Julho";
mesestxt[7] = "Agosto";
mesestxt[8] = "Setembro";
mesestxt[9] = "Outubro";
mesestxt[10] = "Novembro";
mesestxt[11] = "Dezembro";

var data_hoje_txtformat = (diatxt + " de " + mesestxt[mestxt] + " de " + anotxt);



document.getElementById("datasql").value = data_hoje_sqlformat;
document.getElementById("datatxt").value = data_hoje_txtformat;




function myFunction() {
    //var x = document.getElementById("myTextarea").value;

    var titulo = document.getElementById("titulo").value;
    var texto = document.getElementById("texto").value;
    var fonte = document.getElementById("fonte").value;
    var nomeadm =  document.getElementById("nomeadm").value;
    var data =  document.getElementById("datatxt").value;

    document.getElementById("setado").innerHTML = '' +
        '\n <h2>'+titulo+'</h2>  ' +
        '\n <p style="font-size: 12pt; color: #ffffff; font-style: italic; background-color:#8b878b; padding:5px;">'+ data +'</p>' +
        '\n'+ texto + ''+
        '<p style="font-size: 12pt; color: #000000; font-style: italic;">Postado por: '+nomeadm+'</p>'+
        '<p><i> \n <a href="'+fonte+'" target="_blank">Ver na &iacute;ntegra</a></i></p>';


}
