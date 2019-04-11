<?php 
   include 'sessao_testar.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>- <?php echo $_SESSION['usuario'] .' - '. $_SESSION['biblioteca'] ;?></title>
    </head>
    <body>
        <?php
            $usuario = $_SESSION["usuario"];
            echo "Olá ".$_SESSION["usuario"]."!<br/>";
        ?>
        <p>
            <a href="listaautores.php">Listar Autores</a><br/>
            <a href="formularioautor.php">Incluir</a><br/>
            <a href="listalivros.php">Listar livros</a><br/>
            <a href="obra_novo.php">Incluir Título de Livro</a><br/>

            <?php if ($_SESSION["admin"] == 1){ ?> 

            <a href="obra_excluir.php">Excluir Livros</a><br/>

            <?php } ?>

            <td><a href="livro_listar.php?id_obra=<?=$linha["id"];?>">Livros</a></td>
            
            <br/>
            <a href="logoff.php"> <button>Sair</button></a>

            
        </p>
    </body>
</html>

