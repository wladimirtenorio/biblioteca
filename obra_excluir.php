<?php
header("Content-type: text/html; charset=utf-8");
   include('conexao.php');
   include 'sessao_testar.php';
$id = $_GET["id"];


$sql = "DELETE FROM tbobra WHERE id='$id'";
mysqli_query($conexao, $sql);

header("location: obra_listar.php");

?>