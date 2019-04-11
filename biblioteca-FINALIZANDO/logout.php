<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['id_usuario']);
unset($_SESSION['email']);
unset($_SESSION['senha']);
session_destroy();

header("Location: login.php");
?>