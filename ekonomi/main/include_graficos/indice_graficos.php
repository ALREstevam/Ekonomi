<?php

$ID = $_SESSION["ID_Usuario"];

?>

<section id="conteudo" class="conteudo" style="width: 86%">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="include_graficos/estilo.css">
    <meta charset="utf-8">
<?php//include "cod_graficos/grafico_rosquinha_cod.php";
?>



<body onload="coloca_data()">

<?php
echo"<!--";
$data1a = $_POST['data1'];
$data2a = $_POST['data2'];

if($data1a=="" or $data2a==""){
    $data1a = $data1;
    $data2a = $data2;
}


echo"-->";

?>
<center><h1>Visualizando gráficos</h1>
    <iframe width="100%" height="7000" src="include_graficos/IframeGraficos/index.php" style="border: none; margin: auto; overflow: hidden"></iframe>





</body>
</html>
    </section>
