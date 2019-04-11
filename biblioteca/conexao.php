<?php
$servidor = "localhost";
$usuariobd = "root";
$senhabd = "";
$banco = "db_biblioteca";

// Cria a conexão
$conexao = mysqli_connect($servidor, $usuariobd, $senhabd, $banco);
// Checa a conexão
if (!$conexao) {
    die("Falha ao Conectar: " . mysqli_connect_error());
}else{
    echo "<b>ONLINE!</b><br>";
}

date_default_timezone_set('America/Fortaleza');
$horaAtual =  date("Y-m-d H:i:s");


?>