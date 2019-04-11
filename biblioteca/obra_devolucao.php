<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');$id = $_GET["id"];$id_obra = $_GET["id_obra"];$id_usuario = $_GET["id_usuario"];/*
echo "Id (tblivro)". $id ."<br>";echo "Id obra". $id_obra ."<br>";echo "Id usuário". $id_usuario ."<br>";*/
$sql1 = "UPDATE `tblivro` SET `status` = '0', usuario=Null, data_hora=Null WHERE `tblivro`.`id` = '$id' AND status=1";
if (mysqli_query($conexao, $sql1)) {    #echo "Livro foi entregue sql 1";	$sql_devolucao = "UPDATE tbemprestimo SET hora_data_devolucao='$horaAtual', devolucao = '0' WHERE id_emprestimo='$id' AND id_obra='$id_obra' AND usuario='$id_usuario' AND devolucao = 1";	if (mysqli_query($conexao, $sql_devolucao)) {		echo "Livro foi entregue sql 2";			} else {		echo "Error: " . $sql_devolucao . "<br>" . mysqli_error($conexao);		#echo "Foi entregue !";	}	
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conexao);
}
mysqli_close($conexao);
header("location: livro_listar.php?id_obra=$id_obra");
?>