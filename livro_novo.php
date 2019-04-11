!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Novo Livro</title>
</head>
<body>
<form action="livro_salvar.php" method="post" class="form-control" required>
	<label>Nome</label><input type="text" name="nome" class="form-control" required>
   	<label>Autor</label><input type="text" name="autor" class="form-control" required>
   	<label>Ano</label><input type="text" name="ano" class="form-control" required>
   	<label>Editora</label><input type="text" name="editora" class="form-control" required>
   
   	<input type="submit" value="Salvar">
</form>
</body>
</html>