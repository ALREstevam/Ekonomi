<script>
    window.alert("Saindo!");
</script>

<?php
//Inicia a sess�o

session_start();
//Elimina os dados da sess�o
unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['login']);

session_destroy();
 
//Encerra a sess�o

header("Location:../index.php");


?>

