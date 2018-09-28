<?php ?>
<html>
<head>
    <meta charset="utf-8">

</head>
<body onload="BtnDivEnvia();">





<section id="conteudo" class="conteudo">












<form>
<button type="button" id="carregaimg" onclick="BtnDivEnvia()" class="botao_painel" style="background-image: url('imagens/You.png'); background-position: left; background-repeat: no-repeat; background-size: 66px; width: 100%"><span>Enviar conta</span></button>
</form>

<form action="CloudAddImg.php" method="post" target="ifrmigm">
<button type="submit" id="procuraimg" name="procuraimg" onclick="BtnDivProcura()" class="botao_painel" style="background-image: url('imagens/search.png'); background-position: left; background-repeat: no-repeat; background-size: 66px; width: 100%; margin-top: -15px"> <span>Procurar contas</span></button>
</form>


<script>
    function BtnDivProcura() {
        document.getElementById("dv_envia").style.display = "none";
        document.getElementById("dv_abre").style.display = "block";
        document.getElementById("imgenviado").style.display = "none";
    }


    function BtnDivEnvia() {
        document.getElementById("dv_abre").style.display = "none";
        document.getElementById("dv_envia").style.display = "block";
        document.getElementById("imgenviado").style.display = "block";
    }
</script>



<div id="dv_envia">
    <form method="post" enctype="multipart/form-data" action="">

        <div style="text-align: left;">

            Selecione uma imagem: <br><input name="arquivo" type="file" style="font-size: 20px"><br><br>

            <label for="titulo_imagem">Título da imagem: </label>
            <input type="text" name="titulo_imagem" class="texto" style="width: 50%"  placeholder="Título"><br><br>





            <textarea class="texto" name="obs_arquivo" style="width: 65%; height: 100px" placeholder="Descrição" required></textarea><br><br>

            <input type="submit" value="Salvar" class="botao" name="enviarimagem" name="enviarimagem" ><br><br>
        </div>


    </form>
</div>








<div id="dv_abre">
    <iframe src="CloudAddImg.php" name="ifrmigm" id="ifrmigm"></iframe>
</div>











    </section>

</body>
</html>