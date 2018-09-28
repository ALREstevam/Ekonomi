		
		<!-- NOTICIA -->
    <aside id="noticia"> 
	
	<h1>Notícias</h1> 

	<?php

    include'include_login/conexao.php';

    $sql_noticia = "SELECT ADM_ID_ADM, Titulo, Texto, Fonte, Data_txt FROM `noticias` WHERE invalido <> 's' ORDER BY Data_sql DESC ";
    $rs_noticia = mysql_query($sql_noticia) or die("Falha na consulta");

    while($linha=mysql_fetch_array($rs_noticia)) {

        $idadm = $linha[0];
        $Titulo = $linha[1];
        $Texto = $linha[2];
        $Fonte = $linha[3];
        $Data_txt = $linha[4];


        echo'
        <h2> '.$Titulo. '  </h2>
         <p style="font-size: 12pt; color: #ffffff; font-style: italic; background-color:#8b878b; font-weight:none; padding:5px;"> ' .$Data_txt.' </p>


        '.$Texto.'



';


        $sql_nome_edit = "SELECT Nome_ADM FROM `adm` WHERE ID_ADM LIKE '$idadm'";
        $rs_nomeadm = mysql_query($sql_nome_edit) or die("Falha na consulta");

        while($linha=mysql_fetch_array($rs_nomeadm)) {


            $nome_adm = $linha[0];
            echo '
 <p style="font-size: 12pt; color: #000000; font-style: italic;">Postado por: ' .$nome_adm.' </p>




        ';

        echo'

        <p>
            <i>
                 <a href="'.$Fonte.'" target="_blank">Ver na íntegra</a>
            </i>
        </p>

        <br><br><br><br>



        ';




        }


    }







    ?>


	
	
	
	
	</aside>