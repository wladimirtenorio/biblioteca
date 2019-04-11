<?php



$email = (isset($_COOKIE['CookieEmail'])) ? base64_decode($_COOKIE['CookieEmail']) : '';

$senha = (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '';

$lembrete = (isset($_COOKIE['CookieLembrete'])) ? base64_decode($_COOKIE['CookieLembrete']) : '';

$checked = ($lembrete == 'SIM') ? 'checked' : '';





?>

<!DOCTYPE html>

<html>

<head>

	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<style type="text/css">

	fieldset{

		width: 300px;

		height: 250px;

		margin:10% auto;

	}

	</style>

</head>

<body>

	<fieldset>

		<legend><h1>Login</h1></legend>

		

        <?php 

           if(isset($_GET["msg"])){

                if ($_GET["msg"] == 1){

                    echo "Login ou senha inválidos!";

                }

                if ($_GET["msg"] == 2){

                    echo "Faça login para acessar essa página";

                }if ($_GET["msg"] == 3){

                    echo "Campos estão em branco !";

                }

            }

        ?>

		<form method="post" action="login_verificar.php">

			<div class="form-group">

		      <label for="email">E-mail</label>

		      <input type="text" class="form-control" value="<?=$email?>" id="email" name="email" placeholder="Infome o E-mail">

			</div>

			<div class="form-group">

		      <label for="senha">Senha</label>

		      <input type="password" class="form-control" value="<?=$senha?>" id="senha" name="senha" placeholder="Infome a Senha">

			</div>

			<div class="checkbox">

			    <label>

			      <input type="checkbox" name="lembrete" value="SIM" <?=$checked?>> Lembre-me

			    </label>

			</div>

		     <button type="submit" class="btn btn-primary" id='botao'> 

			   Entrar

		     </button>	

		</form>

	</fieldset>

</body>

</html>