<?php
 @session_destroy();
?>

<html>
<head>



    <title>Ekonomi - Administrador</title>
    <link rel="stylesheet" type="text/css" href="_css/adm_stylesheet.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">

</head>
<body>




<div id="menulateral">
    <div id="porcotopo"></div>

    <input type="button" id="volta" value="" class="return" onclick="window.location.href = '../index.php';">


</div>



<center>

    <div id="adm_login">
        <p id="texto">Administrador</p>
    <div id="adm_foto">

    </div>

    <form id="adm_login" action="Valida_adm.php" method="post">

        <br>
    <input type="text" id="adm_email" name="adm_email" class="text" autocomplete="off" placeholder="Email" required><br>
    <input type="password" id="adm_senha" name="adm_senha" class="text" placeholder="Senha" required><br>
    <input type="submit" id="sb_adm" value="Logar"><br>

    </form>

       <br>

</div>
</center>









</body>
</html>