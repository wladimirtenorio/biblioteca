<?php
header("Content-type: text/html; charset=utf-8");
   include('conexao.php');
   include 'sessao_testar.php';
   
$id = $_POST["id"];
$nome          = $_POST["nome"];
$email         = $_POST["email"];
$senha         = MD5($_POST["senha"]);
$usuario_admin = $_POST["usuario_admin"];


$sql = "UPDATE tbusuario SET nome='$nome', email='$email', senha='$senha', admin='$usuario_admin' WHERE id='$id'";

mysqli_query($conexao,$sql);

mysqli_close($conexao);

header("location: usuario_listar.php");

?>d