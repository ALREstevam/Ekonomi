<?php
function localimg(){
            /*
            MEU LOCAL

            1 --> TESTANDO NO USUÁRIO LOCAL DO DO NOTEBOOK -> localhost:8887
            2 --> TESTANDO NO ekonomi.hostei.com

            */



    $meulocal='1';

    if($meulocal == '1') {
        $locationimg = '<img src="http://localhost:8887/z_TCCSITE - 05-10/include_partes/imagens_noticias/';
    }

    else if ($meulocal == '2'){
        $locationimg = '<img src="http://ekonomi.hostei.com/include_partes/imagens_noticias/';
    }
};
?>