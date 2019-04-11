<?php
   header("Content-type: text/html; charset=utf-8");
   include('conexao.php');

   session_start();  

   if (!isset($_SESSION["admin"])){
   header("Location: login.php");
   }
   
   $id = $_GET["id"];
   $sql = "SELECT * FROM tbobra WHERE id='$id'";
   $resultado = mysqli_query($conexao, $sql);
   $linha = mysqli_fetch_row($resultado);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Biblioteca</title>
   </head>
   <body>
      <h1>Edição de Obra</h1>
      <form action="obra_alterar.php" method="post">
         <input type="hidden" name="id" value="<?=$linha[0]?>">
         <label>Nome</label><input type="text" name="nome" value="<?=$linha[1]?>"><br>
         <label>Autor</label><input type="text" name="autor" value="<?=$linha[2]?>"><br>
         <label>Ano</label><input type="text" name="ano" value="<?=$linha[3]?>"><br>
         <label>Editora</label><input type="text" name="editora" value="<?=$linha[4]?>"><br>
         <input type="submit" value="Alterar">
         <a href="obra_listar.php"> <button>Voltar</button></a>
      </form>
   </body>
</html>