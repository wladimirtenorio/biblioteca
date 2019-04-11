<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');
include 'sessao_testar.php';

$nome          = $_POST["nome"];
$email         = $_POST["email"];
$senha         = MD5($_POST["senha"]);
$usuario_admin = $_POST["usuario_admin"];

echo "Nome: " . $nome . "<br>";
echo "email: " . $email . "<br>";
echo "senha: " . $senha . "<br>";
echo "admin: " . $usuario_admin . "<br>";

$sql_select_usuario = "SELECT nome,email,senha FROM tbusuario WHERE nome ='$nome' OR email = '$email'";
$resultado          = mysqli_query($conexao, $sql_select_usuario);

if (mysqli_num_rows($resultado) >= 1) {
    echo "Nome de usuário ou e-mail já existe !";
    header("Location: usuario_cadastrar.php?msg_cadastro=1");
} else {
    
    $sql_cadastrar_usuario = "INSERT INTO tbusuario (nome,email,senha,admin) VALUES ('$nome','$email','$senha','$usuario_admin')";
    if ($conexao->query($sql_cadastrar_usuario) === TRUE) {
        echo "Salvo !";
        header("Location: usuario_cadastrar.php?msg_cadastro=2");
    } else {
        echo "Error: " . $sql_cadastrar_usuario . "<br>" . $conexao->error;
        echo "<br>";
        header("Location: usuario_cadastrar.php?msg_cadastro=3");
    }
}

?>