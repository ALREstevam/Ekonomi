<?php

$Nome = $_SESSION["Nome"];
$Email = $_SESSION["Email"];
$Sexo = $_SESSION["Sexo"];
$ID = $_SESSION["ID_Usuario"];

include"../funcoes/funcoes.php";
conexao();

?>

<!--
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="notepad/estilos.css">
-->

<?php



if (array_key_exists("deletar", $_POST)) {

    $id_deletar = $_POST['deletar'];

    $comando_deletar = "UPDATE notepad SET Valido='n' where ID_Nota LIKE '$id_deletar' ";
    mysql_query($comando_deletar) or die (mysql_error());
}





if (array_key_exists("enviar", $_POST)) {



    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $data   = $_POST['data'];
    $importancia = $_POST['seletor'];

    $sql_command = "INSERT INTO notepad(ID_Usuario, Titulo, Conteudo, Lembrar, Importancia) VALUES ('$ID','$titulo','$conteudo','$data','$importancia' )";
    $resultdo = mysql_query($sql_command) or die (mysql_error());


}
?>



<h2 style="clear: both; padding-top: 100px">Consultar notas</h2>
<div style="background-color: #00bbdc; clear: both">

    <?php
    $select_comando = "SELECT Titulo, Conteudo, Lembrar, Importancia, ID_Nota FROM notepad WHERE ID_Usuario LIKE '$ID' AND Valido LIKE 's' ORDER BY Importancia  AND Lembrar DESC";
$busca = mysql_query($select_comando) or die (mysql_error());


        //Verificams se alguma linha foi afetada, caso sim retornamos suas informa??es
    while($rst=mysql_fetch_array($busca)){


            $titulo = $rst["Titulo"];
            $conteudo = $rst["Conteudo"];
            $lembrar = $rst["Lembrar"];
            $Importancia = $rst["Importancia"];
             $ID_Nota= $rst["ID_Nota"];


           // echo"$titulo<br>$conteudo<br>$lembrar<br>$importancia<br><br>";




    echo"

    <div class='round'>
        <div class='notepad' style='width: 40%; padding: 20px; font-size: 13pt'>
        <div class='notas_topo'>

                <input type='text' name='titulo' placeholder='Título' class='titulo'  value='$titulo' style='font-size: 14pt; width: 80%'>

                <form action='' method='post'>
                <button class='bnt_deletar' value='$ID_Nota' name='deletar' style='margin-top: -30px'></button>
                </form>
        </div>


        <div class='notas_conteudo' style='height: 200px'>
                <textarea placeholder='Conteúdo' class='textarea_conteudo' name='conteudo'  style='height: 170px; font-size: 13pt; border: none'>$conteudo</textarea>
                <input type='date' value='$lembrar' readonly style='border: none; background-color: transparent; color: #d11010; font-size: 20px; font-family: Arial, sans-serif'>




        </div>

    </div>";
}

    ?>


</div>







