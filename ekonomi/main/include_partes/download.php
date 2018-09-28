

<?php

$content1 = '
<section id="conteudo" class="conteudo">



    <h1>
        Download
    </h1>
    <h2>Download do Ekonomi</h2>


    <img src="imagens/_login.png" class="caixa" style="width: auto; height: 300px;">

    <!-- <div id="divisor" style="height: 1px; width: 100%; clear: both"></div> -->
    <br>

<p>Aqui você poderá baixar o Ekonomi, um software para gerenciar suas despesas pessoais, para efetuar o login no programa use o
mesmo e-mail e senha que você utilizou para criar sua conta neste site.</p>


<p>Para efetuar o dowload clique no botão abaixo:</p>

    <center>
                <iframe name="iframe_download" style="visibility: hidden"></iframe>


        <a id="download_button" href="../download_software/ekonomi_setup.exe" target="iframe_download"> </a>
    </center>



    <br>
</section>
    ';


echo utf8_encode($content1);