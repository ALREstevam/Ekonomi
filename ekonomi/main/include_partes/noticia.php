
<!-- NOTICIA -->
<aside id="noticia">

    <h1>Notícias</h1>

    <?php

    include'../include_enviar/NOTICIA_conexao.php';

    $sql_noticia = "SELECT Texto FROM 'noticias'";
    $rs_noticia = mysql_query($sql_noticia) or die("Falha na consulta");

    $rst_noticia = mysql_fetch_array($rs_noticia);
    $Resposta_array = $rst_noticia["Texto"];

    $Resposta_texto = utf8_encode($Resposta_array);




    echo'

    '.$Resposta_texto.'

    ';





    ?>






</aside>