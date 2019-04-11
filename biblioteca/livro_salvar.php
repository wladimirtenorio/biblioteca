<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');

$id_obra = $_GET["id_obra"];


$sql = "INSERT INTO tblivro (id_obra, status) VALUES ('$id_obra','0')";

mysqli_query($conexao,$sql);


mysqli_close($conexao);

header("location: livro_listar.php?id_obra=$id_obra");
?>