<section id="conteudo" class="conteudo">

    <h1>Redefinir senha</h1>



<form id="form_redef" method="post" action="">

    <label for="email" >Digite aqui seu e-mail</label>
    <input type="email" id="email" name="email" class="texto">
    <input type="submit" class="botao" style="width: 100px; height: 40px">

</form>



    <?php
echo"<!--";
    $email = $_POST['email'];
echo"-->";






    if (array_key_exists("email", $_POST)) {
        include "include_login/conexao.php";

        $sql = "SELECT * FROM usuario WHERE Email = '$email'";

        //Executamos o comando
        $rs = mysql_query($sql) or die("Falha na consulta");


        //Retornamos o numero de linhas afetadas
        $num = mysql_num_rows($rs);
        //Verificams se alguma linha foi afetada, caso sim retornamos suas informa��es
        if ($num > 0) {
            //Retorna os dados do banco
            $rst = mysql_fetch_array($rs);

            $Email = $rst["Email"];
            $Nome = $rst["Nome"];


          echo"

          <p>Olá $Nome, sua senha será redefinida e enviada para você no e-mail: $Email</p>
          <form id='continuar' name='continuar' method='post' action='' >

                <input type='text' value='$Email' name='bdMail' id='bdMail' hidden='hidden'>
                <input type='text' value='$Nome' name='bdName' id='bdName' hidden='hidden'>

          <input type='submit' value='Continuar' class='botao'>
          </form>
          ";


        } else {
                echo "<p style='color: #f12110; font-weight: bold;'>Não existe nenhum usuário registrado com o e-mail '$email'  </p>";
        }
    }



    if (array_key_exists("bdMail", $_POST)) {


        function generateRandomString($length = 10) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZEKONOMI';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        $mail_pst = $_POST['bdMail'];
        $name_pst = $_POST['bdName'];

        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');

        $novasenha = generateRandomString();;



        $arquivo = '
<html> <meta charset="utf-8">
<center>
<div id="topo" style=" background-color: #333333">
    <img src="http://ekonomi.hostei.com/imagens/ekonomi.png" width="40%" height="*">
</div>
    <div id="centro" style="color: #161616; background-color: #dcdcdc">
    <h1>Olá ' .$name_pst.'</h1>
    <h2>Sua senha do ekonomi foi redefinida</h2>
        <table id="tb">
            <tr>
                <td><b>Email:</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </td>
                <td>'.$mail_pst.'</td>
            </tr>
            <tr>
                <td><b>Nova senha:</b>   </td>
                <td>'.$novasenha.'</td>
            </tr>
        </table>
        <br>
        <br>
        -Obrigado, sinceramente equipe do Ekonomi.
    </div>
</center>
<div style="color: #ffffff; background-color: #333333; width: 50px; padding-top 20px; padding-bottom: 40px; border-top:50px; width: 100%"   id="footer" >
    <center>
    Ekonomi - 2015 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enviado dia '.$data_envio.' às '.$hora_envio.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Não responda este e-mail
    </center>
</div>
</center>
</html>
        ';
        $arquivo_nohtml="
        Ekonomi -- Olá $name_pst, sua senha do Ekonomi foi redefinida para $novasenha, com o e-mail $mail_pst, obrigado

        ";



//PHPMAILER!!!!!
    require_once ("phpmailer/class.phpmailer.php");
    include ("phpmailer/class.smtp.php");



    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    //$mail->setLanguage('pt');


    $from = 'andre-zzz@hotmail.com';
    $fromName = 'Ekonomi';

    $host       = 'smtp.live.com';
    $username   = 'andre-zzz@hotmail.com';
    $password   = 'torchwood42';
    $port       = 587;
    $secure     = 'tls';


    $mail->Host         =   $host;
    $mail->SMTPAuth     =   true;
    $mail->Username     =   $username;
    $mail->Password     =   $password;
    $mail->Port         =   $port;
    $mail->SMTPSecure   =   $secure;






    $mail->From = $from;
    $mail->FromName = $fromName;
    $mail->addReplyTo($from, $fromName);

    $mail->addAddress($mail_pst,$name_pst);

    $mail->isHTML(true);
    $mail->CharSet = 'utf-8';
    $mail->WordWrap = 70;


    $mail->Subject = 'Redefinição de senha do Ekonomi';

    $mail->Body = $arquivo;
    $mail->AltBody = $arquivo_nohtml;


    $send = $mail->Send();

    if($send){

        include'include_login/conexao.php';
$cypt_senha = md5($novasenha);


        $sql = "UPDATE usuario SET Senha = '$cypt_senha' WHERE Email LIKE '$mail_pst'";
        $rs = mysql_query($sql) or die("Falha na consulta");


        echo'E-mail enviado com sucesso!';



        echo " <meta http-equiv='refresh' content='10;URL=esqueci_senha.php'>";

    }
    else{
        echo'Erro : '.$mail->ErrorInfo;
    }
    //PHPMAILER!!!!!





















      



















    }



    ?>















</section>