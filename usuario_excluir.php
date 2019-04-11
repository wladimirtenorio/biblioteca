<?php
header("Content-type: text/html; charset=utf-8");
   include('conexao.php');
   include 'sessao_testar.php';
$id = $_GET["id"];

#$conexao = mysqli_connect("localhost", "root","","db_biblioteca");

$sql = "DELETE FROM tbusuario WHERE id='$id'";
mysqli_query($conexao, $sql);

header("location: usuario_listar.php");

?>