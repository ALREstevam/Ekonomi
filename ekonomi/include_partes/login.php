<script>
    function mostralogin(){
        //width:420px;
        //height:259px;
        document.getElementById("login").style.width = "450px";
        document.getElementById("login").style.height = "259px";

    }



    function voltalogin(){
        // width:250px;
        // height:60px;
        document.getElementById("login").style.width = "250px";
        document.getElementById("login").style.height = "60px";
    }
</script>




    <div id="login" onmouseover="mostralogin();"  onmouseout="voltalogin();" >

        <h1 style="color: white; font-family: RobotoThin, Arial, sans-serif; font-size: 30pt; text-align: center; margin-top: 0px">Login</h1>
        <div id="fotologin"> </div>

    <form id="login" method="post"  action="include_login/auth.php" name="autenticacao">

        <input type="text" placeholder="Login" id="login" name="login" class="login_texto" autocomplete="off"><br>
        <input type="password" placeholder="Senha" id="senha" name="senha" class="login_texto"><br>


        <a href="cadastro.php">Cadastre-se</a> &nbsp
        <a href="esqueci_senha.php">Esqueci minha senha</a>

        <input type="submit" value="Entrar" id="logar" >

        <br>

    </form>


        <!-- <input type="button" value="Sair" id="sair" name="sair" href="include_login/destroi.php"/>
    </div> -->
</div>




