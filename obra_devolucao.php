﻿<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');
echo "Id (tblivro)". $id ."<br>";
$sql1 = "UPDATE `tblivro` SET `status` = '0', usuario=Null, data_hora=Null WHERE `tblivro`.`id` = '$id' AND status=1";
if (mysqli_query($conexao, $sql1)) {
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conexao);
}
mysqli_close($conexao);
header("location: livro_listar.php?id_obra=$id_obra");
?>