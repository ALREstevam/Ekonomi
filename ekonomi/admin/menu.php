<?php
$SecLev =  $_SESSION["SecLev"];
?>
<table id="menu">
    <ul id="menu_ul">
        <?php
    if($SecLev == 1 or $SecLev == 2 or $SecLev == 3) {
        echo '   <li><img src="../_imagens/user-512.png" width="25px" height="25px">          <a href="../usuarios/_usuario_index.php"> Usuários  </a></li> ';
    }
    if($SecLev == 1 or $SecLev == 2 ) {
        echo '   <li><img src="../_imagens/team_128.png" width="25px" height="25px">          <a href="../administrar_administrador/a_exibir_adm.php"> Administradores  </a></li>';
    }
     echo'   <li><img src="../_imagens/comment-box-icon.png" width="25px" height="25px">  <a href="../comentarios/comentarios_adm.php"> Comentários  </a></li>';
     echo'    <li><img src="../_imagens/editar.png" width="25px" height="25px">            <a href="../noticias/noticias_index.php"> Notícias  </a></li>';
        ?>
    </ul>
</table>

