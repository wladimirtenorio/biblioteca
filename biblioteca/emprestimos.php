<?php
header("Content-type: text/html; charset=utf-8");
include('conexao.php');
include 'sessao_testar.php';


$sql = "SELECT tbemprestimo.id AS NumEmprestimo, tbusuario.id AS idusuario,
	   tbusuario.nome AS nome, tbobra.id AS idobra, tbobra.nome AS obra, tbemprestimo.hora_data_emprestimo, tbemprestimo.hora_data_devolucao, tbemprestimo.devolucao
		FROM tbemprestimo
		INNER JOIN tbusuario ON tbusuario.id = tbemprestimo.usuario
		INNER JOIN tbobra ON tbemprestimo.id_obra = tbobra.id
		ORDER BY NumEmprestimo";

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Empréstimos - <?php echo $_SESSION['usuario'] . ' - ' . $_SESSION['biblioteca']; ?></title>
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" language="javascript">
            $(document).ready(function () {

                $('#example').DataTable();

            });

        </script>
    </head>
    <body>
        <div class="page-wrapper chiller-theme toggled">
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div id="toggle-sidebar">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <?php if (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)) { ?>
                        <div class="sidebar-brand">
                            <a href="area_admin.php"><?php echo $_SESSION['biblioteca']; ?></a>
                        </div><?php } else {
                        ?>
                        <div class="sidebar-brand">
                            <a href="area_usuario.php"><?php echo $_SESSION['biblioteca']; ?></a>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="sidebar-header">
                        <div class="user-info">
                            <span class="user-name">
                                <strong><?php
                                    if (isset($_SESSION["usuario"])) {
                                        echo $_SESSION["usuario"];
                                    };
                                    ?></strong>
                            </span>
                            <span class="user-role"><?= (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)) ? "Administrador" : "Usuário"; ?></span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>Menu</span>
                            </li>
                            <li>
                                <a href=" <?php
                                if (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)) {
                                    echo"area_admin.php";
                                } else {
                                    echo"area_usuario.php";
                                };
                                ?>											
                                   ">
                                    <i class=""></i>
                                    <span>Início</span>
                                </a>
                            </li>
                            <li>
                                <a href="obra_listar.php">
                                    <i class=""></i>
                                    <span>Listar Autores/Livros</span>
                                </a>
                            </li>
                            <?php if ($_SESSION["admin"] == 1) { ?> 
                                <li>
                                    <a href="obra_novo.php">
                                        <i class=""></i>
                                        <span>Cadastrar Autor/Livro</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION["admin"] == 1) { ?> 
                                <li>
                                    <a href="emprestimos.php">
                                        <i class=""></i>
                                        <span>Empréstimos</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION["admin"] == 1) { ?> 
                                <li>
                                    <a href="usuario_cadastrar.php">
                                        <i class=""></i>
                                        <span>Cadastrar Usuários</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION["admin"] == 1) { ?> 
                                <li>
                                    <a href="usuario_listar.php">
                                        <i class=""></i>
                                        <span>Listar Usuários</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION["admin"] == 0) { ?> 
                                <li>
                                    <a href="usuario_emprestimos.php">
                                        <i class=""></i>
                                        <span>Meus Empréstimos</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="sair">
                                <a href="logout.php">
                                    <i class=""></i>
                                    <span >Sair</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
                </div>
            </nav>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">                  
                    <h1>Lista de Obra(s)</h1>
                    <br/>  
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Obra</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Usuário</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Emprestado em:</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Entregue em:</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Devolvido ?</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
                                            <tr role="row" class="odd">
                                                <td><?= $linha["NumEmprestimo"]; ?></td>
                                                <td><?= $linha["obra"]; ?></td>
                                                <td><?= $linha["nome"]; ?></td>
                                                <td><?= $linha["hora_data_emprestimo"]; ?></td>
                                                <td><?= $linha["hora_data_devolucao"]; ?></td>
                                                <td><?= $linha["devolucao"] == 1 ? "Sim" : "Não"; ?></td>                                 
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Obra</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Usuário</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Emprestado em:</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Entregue em:</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Devolvido ?</th>                                 
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">         
                        </div>
                    </div>
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <script src="js/menu.js"></script>
         
    </body>
</html>