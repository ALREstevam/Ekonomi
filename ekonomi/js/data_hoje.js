
//2015-08-16
//yyyy-mm-dd

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


