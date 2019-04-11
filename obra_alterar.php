<?php
header("Content-type: text/html; charset=utf-8");
   include('conexao.php');
   include 'sessao_testar.php';
   
$id = $_POST["id"];
$nome = $_POST["nome"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];
$editora = $_POST["editora"];

$sql = "UPDATE tbobra SET nome='$nome', autor='$autor', ano='$ano', editora='$editora' WHERE id='$id'";

mysqli_query($conexao,$sql);

mysqli_close($conexao);

header("location: obra_listar.php");

?>d