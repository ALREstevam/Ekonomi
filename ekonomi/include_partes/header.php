
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<head>



    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imagens/favicon.ico" type="image/x-icon">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ekonomi</title>

    <script type="text/javascript">

    </script>


    <link rel="stylesheet" type="text/css" href="estilos/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="estilos/stylesheet_formatacao_de_input.css">
    <link rel="stylesheet" type="text/css" href="estilos/comentarios_estilo.css">





</head>
<body  onload="tamanho();" onmouseover="tamanho();">



<!-- onclick="largura_pag();" -->
<script type="text/javascript" language="JavaScript">

    function tamanho() {



        var altura_conteudo = document.getElementById("conteudo").clientHeight;
        //alert(altura_conteudo);

        var altura_noticia = document.getElementById("noticia").clientHeight;
        //alert(altura_noticia);

        var alturacalc = altura_conteudo - 30;

        document.getElementById("noticia").style.maxHeight = alturacalc+"px";



    }

</script>