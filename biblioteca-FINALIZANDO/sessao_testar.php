<?php

   session_start(); 

$_SESSION['biblioteca'] = "Biblioteca Paulo Freire" ;
   if(!isset($_SESSION['usuario'])){

       header("Location: login.php?msg=2");

   }



