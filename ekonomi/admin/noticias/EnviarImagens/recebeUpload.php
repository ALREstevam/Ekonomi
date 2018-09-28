<?php

$Email_adm = $_SESSION["Email_ADM"];
$Nome_adm = $_SESSION["Nome_ADM"];
$SecLev =  $_SESSION["SecLev"];
$ID_ADM = $_SESSION["ID_ADM"];

if($Email_adm == null or $SecLev > 4 or $SecLev < 1){
    header("Location:../../index.php");

}
?>

<div id="imgenviado" >
<?php

if (isset($_POST['titulo_imagem']) && isset($_POST['obs_arquivo']) && $_POST['obs_arquivo'] != null && $_POST['titulo_imagem'] != null) {


//Upload de arquivos
// verifica se foi enviado um arquivo
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

    echo '<br><br><br><span style="font-size: 30px;">&Uacute;ltimo arquivo salvo:</span><br>';
    echo "Arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
    echo "Tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
//echo "Tempor&aacute; riamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
    echo "Tamanho: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome = $_FILES['arquivo']['name'];

// Pega a extensao
    $extensao = strrchr($nome, '.');

// Converte a extensao para mimusculo
    $extensao = strtolower($extensao);

// Somente imagens, .jpg;.jpeg;.gif;.png
// Aqui eu enfilero as extesões permitidas e separo por ';'
// Isso server apenas para eu poder pesquisar dentro desta String
    if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
// Cria um nome único para esta imagem
// Evita que duplique as imagens no servidor.
        $novoNome = md5(microtime()) . $extensao;

// Concatena a pasta com o nome
        //$destino = 'include_partes/imagens_noticias/' . $novoNome;
        //$destino1 = '../../include_partes/imagens_noticias/' . $novoNome;
        $destino = '../../include_partes/imagens_noticias/' . $novoNome;

// tenta mover o arquivo para o destino



            include "../../funcoes/funcoes.php";
            conexao();



            $descricao_arquivo = $_POST['obs_arquivo'];
            $nome_arquivo = $_POST['titulo_imagem'];

            echo "Nome: <strong>$nome_arquivo</strong><br>";
            echo "Descri&Ccedil;&atilde;o: <strong>$descricao_arquivo</strong><br>";



            if (@move_uploaded_file($arquivo_tmp, $destino)) {
              //  if (@move_uploaded_file($arquivo_tmp, $destino1)) {

                    echo "<span style='color: #0c990d; margin: 5px;'> *Arquivo salvo com sucesso em: <strong>" . $destino . "</strong></span><br />";
                    echo '<img src="' . $destino . '" style="width: 260px; height: auto">';


                    $comando = "INSERT INTO imagens_noticias (Nome_img, Caminho_img , OBS_img, ADM_ID_ADM) VALUES('$nome_arquivo', '$novoNome', '$descricao_arquivo', '$ID_ADM')";
                    $resultado = mysql_query($comando) or die("<span style='color: #d40400'>*Erro ao gravar no banco</span>");//retorna os dados


           //     }else{
             //       echo "<span style='color: #d40400'>*Erro ao salvar o arquivo no index. Aparentemente voc&ecirc; n&atilde;o tem permiss&atilde;o de escrita.</span><br />";
               // }
        } else {
            echo "<span style='color: #d40400'>*Erro ao salvar o arquivo em adm. Aparentemente voc&ecirc; n&atilde;o tem permiss&atilde;o de escrita.</span><br />";
        }





    } else {
        echo "<span style='color: #d40400'>*Voc&ecirc; poder&aacute;  enviar apenas arquivos .jpg .jpeg .gif .png </span><br />";
    }
} else {
echo "<span style='color: #d40400'>*Voc&ecirc; n&atilde;o enviou nenhum arquivo!</span>";

}

} else {
        echo "<span style='color: #d40400'>*Existem campos n&atilde;o preenchidos!</span>";
    }










?>

</div>