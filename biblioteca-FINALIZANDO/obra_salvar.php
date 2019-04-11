<?php
if ($_SESSION["admin"] == 1){
	header("Location: obra_listar.php");
	
}
$nome = $_POST["nome"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];
$editora = $_POST["editora"];

if(!empty($nome) and !empty($autor) and !empty($ano) and !empty($editora) and isset($nome) and isset($autor) and isset($ano) and isset($editora)){
	$conexao = mysqli_connect("localhost", "root","","db_biblioteca");

$sql = "INSERT INTO tbobra (nome,autor,ano,editora) VALUES ('$nome','$autor','$ano','$editora')";

mysqli_query($conexao,$sql);

mysqli_close($conexao);


}

header("location: obra_listar.php");
?>