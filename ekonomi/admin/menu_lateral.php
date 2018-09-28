<!-- MENU LATERAL -->
<?php
@session_start();
$SecLev = $_SESSION["SecLev"];
?>
<div id="menulateral">

<div id="botoes_nav">
   <center>
    <span style="font-family: RobotoThin, Arial, sans-serif; color: #e7e7e7; font-size: 25pt; text-align:center; font-weight: bold;"> Menu <br> rápido</span><br>
   </center>
       <br><br>

<a href="../../index.php" target="_blank">
<input type="button" id="volta" value="" class="return" >
</a><br><br>


    <form action="../destroiadm.php" id="formsair" name="formsair">
    <input type="submit" id="sair_1" value="">
</form><br><br>


    <form action="" id="reload" name="reload">
        <input type="submit" id="reload_button" value="">
    </form><br><br>








<!--
<form action = "" id = "download" name = "download" >
        <input type = "submit" id = "download_button" value = "" alt = "Download do código fonte" >
    </form >
-->
<?php
if($SecLev =="1") {
    echo'


        <a id="download" href="../code_dowload/SourceCode_Ekonomi.zip" target="iframe_download"> </a>

<iframe name="iframe_download" style="visibility: hidden; height: 0px; width: 0px; border: none;"></iframe>


    ';
}
?>


</div>


<!--
    <div class="puxa"></div>
-->
</div>



<!-- fim MENU LATERAL -->