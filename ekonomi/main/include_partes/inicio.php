<?php

$content = '

<meta charset="utf-8">
<style>
    .conteudo{
        @charset "utf-8";
    }
</style>

<section id="conteudo" class="conteudo" xmlns="http://www.w3.org/1999/html">


    <img src="imagens/box2_n.png"   class="caixa">

    <h1>Ekonomi</h1>
    <h2>Um sistema de gerenciamento de finan�as pessoais</h2>

    <p>
        O Ekonomi � um dos maiores grupos financeiros de simula��o de renda do Brasil, com s�lida atua��o voltada aos interesses de seus clientes desde 2015.
    </p>

    <p>
        Al�m da excel�ncia em servi�os, destaca-se por ser um dos melhores gestores de recursos do mercado, com resultados constru�dos sobre bases sustent�veis.
    </p>

<p>Clique no bot�o abaixo para fazer o download do Ekonomi para desktop:</p>

    <center>
                <iframe name="iframe_download" style="visibility: hidden"></iframe>


        <a id="download_button" href="../download_software/ekonomi_setup.exe" target="iframe_download"> </a>
    </center>

';

echo utf8_encode($content);



