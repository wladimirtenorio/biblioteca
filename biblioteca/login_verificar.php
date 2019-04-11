<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');
/*
  $email = (isset($_POST['email'])) ? $_POST['email'] : '';
  $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
  $lembrete = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : ''; */
$email = $_POST["email"];
$senha = $_POST["senha"];
$lembrete = $_POST['lembrete'];
#echo $email."<br>";
#echo $senha."<br>";
#echo $lembrete."<br>";

$hashSenha = MD5($senha);
session_start();
if (!empty($email) && !empty($senha)) {
    $sql = "SELECT * FROM tbusuario WHERE email = '$email' AND senha = '$hashSenha '";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_array($resultado);
        if (!empty($linha)) {
            echo "id: " . $linha["id"] . "<br>";
            echo "Nome: " . $linha["nome"] . "<br>";
            echo "E-mail " . $linha["email"] . "<br>";
            echo "Senha " . $linha["senha"] . "<br>";
            echo "Admin: " . $linha["admin"] . "<br>";
            $_SESSION["id_usuario"] = $linha["id"];
            $_SESSION["usuario"] = $linha["nome"];
            $_SESSION["email"] = $linha["email"];
            $_SESSION["admin"] = $linha["admin"];
            $_SESSION['logado'] = TRUE;
            if ($lembrete == 'SIM') {
                $expira = time() + 60 * 60 * 24 * 30;
                setCookie('CookieLembrete', base64_encode('SIM'), $expira);
                setCookie('CookieEmail', base64_encode($email), $expira);
                setCookie('CookieSenha', base64_encode($senha), $expira);
            } else {
                setCookie('CookieLembrete');
                setCookie('CookieEmail');
                setCookie('CookieSenha');
            }
            if ($_SESSION["admin"] == 1) {
                header("Location: area_admin.php");
                #echo "administrador !";
            } else {
                header("Location: area_usuario.php");
                #echo "Usuário !";
            }
        } else {
            $_SESSION['logado'] = FALSE;
            echo "<script>window.location = 'login.php'</script>";
            #echo "logado false<br>";
            #echo "Volta ao login<br>";
        }
    } else {
        header("Location: login.php?msg=1");
        #echo "Não existe login ou senha! <br>";
    }
} else {
    header("Location: login.php?msg=3");
    #echo "Campos em branco! <br>";
}