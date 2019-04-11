<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');


$id = $_GET["id"];
$id_obra = $_GET["id_obra"];

#$conexao = mysqli_connect("localhost", "root","","db_biblioteca");

$sql = "DELETE FROM tblivro WHERE id='$id'";

mysqli_query($conexao, $sql);

mysqli_close($conexao);

header("location: livro_listar.php?id_obra=$id_obra");

?>