function coloca_data() {
//PEGANDO A DATA DE HOJE NO FORMATO SQL
    //2015-08-16
    //yyyy-mm-dd

    data = new Date(); //Algo aqui sem motivo


    dia = data.getDate(); //Gera o dia de hoje
    mes = data.getMonth(); //Gera o mês
    ano = data.getFullYear(); //Gera o ano

    mes = mes + 1; //O javascript considera o primeiro mês como 0, então somar 1


    //O formato SQL usa dias e meses como 04, o JS como 4
    //If para transformar 4 em 04

    if (mes <= 9) {
        mes = '0' + mes;
    }
    if (dia <= 9) {
        dia = '0' + dia;
    }

    var data_hoje_sqlformat = (ano + '-' + mes + '-' + dia); //Junta ano mes e dia com traços entre eles 2015-09-08


//CALCULANDO O ÚLTIMO DIA DO MÊS
    /*
     Exemplo curto (função):
     Aqui está a grande sacada do javaScript, que interpreta o 0(zero)
     como “o dia antes do dia primeiro” que
     obviamente é o último dia do mês anterior.
     */
    var dd = new Date(ano, mes, 0);
    var ultimodia = dd.getDate();


//COLOCANDO AS DATAS NOS INPUTS
    document.getElementById('data1').value = '' + ano + '-' + mes + '-01'; //PRIMEIRO DIA DO MÊS (ano-mes-01)
    document.getElementById('data2').value = '' + ano + '-' + mes + '-' + ultimodia + ''; //ÚLTIMO DIA DO MÊS (ano-mes-ultimodia)
}

data = new Date(); //Algo aqui sem motivo


dia = data.getDate(); //Gera o dia de hoje
mes = data.getMonth(); //Gera o mês
ano = data.getFullYear(); //Gera o ano

mes = mes + 1; //O javascript considera o primeiro mês como 0, então somar 1


//O formato SQL usa dias e meses como 04, o JS como 4
//If para transformar 4 em 04

if (mes <= 9) {
    mes = '0' + mes;
}
if (dia <= 9) {
    dia = '0' + dia;
}

var data_hoje_sqlformat = (ano + '-' + mes + '-' + dia); //Junta ano mes e dia com traços entre eles 2015-09-08


//CALCULANDO O ÚLTIMO DIA DO MÊS
/*
 Exemplo curto (função):
 Aqui está a grande sacada do javaScript, que interpreta o 0(zero)
 como “o dia antes do dia primeiro” que
 obviamente é o último dia do mês anterior.
 */
var dd = new Date(ano, mes, 0);
var ultimodia = dd.getDate();


//COLOCANDO AS DATAS NOS INPUTS
document.getElementById('data1').value = '' + ano + '-' + mes + '-01'; //PRIMEIRO DIA DO MÊS (ano-mes-01)
document.getElementById('data2').value = '' + ano + '-' + mes + '-' + ultimodia + ''; //ÚLTIMO DIA DO MÊS (ano-mes-ultimodia)