<?php 
   header("Content-type: text/html; charset=utf-8");
   include('conexao.php');
   include 'sessao_testar.php';
   
   $sql = "SELECT * FROM tbobra";
   
   $resultado = mysqli_query($conexao, $sql);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Novo Usuário - <?php echo $_SESSION['biblioteca'] ;?></title>
      <link rel="stylesheet" href="css/menu.css">
	  <link rel="stylesheet" href="css/estilo.css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript" language="javascript">
         $(document).ready(function() {
         
            $('#example').DataTable();
         
         } );
         
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
               <?php if(isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)){?>
				<div class="sidebar-brand">
                  <a href="area_admin.php"><?php echo $_SESSION['biblioteca'] ;?></a>
				</div><?php
				}else{?>
				<div class="sidebar-brand">
                  <a href="area_usuario.php"><?php echo $_SESSION['biblioteca'] ;?></a>
				</div>
			   <?php
			   }
			   ?>
               <div class="sidebar-header">
                  <!--<div class="user-pic">                                          
                     </div>-->
                  <div class="user-info">
                     <span class="user-name">
                     <strong><?php if(isset($_SESSION["usuario"])){
                        echo $_SESSION["usuario"];                        
                        } ;?></strong>
                     </span>
                     <span class="user-role"><?= (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1))?"Administrador":"Usuário" ;?></span>
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
                        <a href=" <?php if(isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)){
							echo"area_admin.php";
						}else{
							echo"area_usuario.php";
						};?>											
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
					<?php if ($_SESSION["admin"] == 1){ ?> 
                     <li>
                        <a href="obra_novo.php">
                        <i class=""></i>
                        <span>Cadastrar Autor/Livro</span>
                        </a>
                     </li>
					<?php } ?>
					<?php if ($_SESSION["admin"] == 1){ ?> 
                     <li>
                        <a href="emprestimos.php">
                        <i class=""></i>
                        <span>Empréstimos</span>
                        </a>
                     </li>
					<?php } ?>
                    <?php if ($_SESSION["admin"] == 1){ ?> 
                    <li>
                        <a href="usuario_cadastrar.php">
                        <i class=""></i>
                        <span>Cadastrar Usuários</span>
                        </a>
                     </li>
                     <?php } ?>
                     <?php if ($_SESSION["admin"] == 1){ ?> 
                     <li>
                        <a href="usuario_listar.php">
                        <i class=""></i>
                        <span>Listar Usuários</span>
                        </a>
                     </li>
                     <?php } ?>
                     <?php if ($_SESSION["admin"] == 0){ ?> 
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
               <br/>  
               <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                     <div class="col-sm-4">
                        <h3>Novo Usuário</h3>

                         <?php 
                          if(isset($_GET["msg_cadastro"])){
                               if ($_GET["msg_cadastro"] == 1){
                                   echo "Nome de usuário ou e-mail já existe !<br>";
                               }
                               if ($_GET["msg_cadastro"] == 2){
                                   echo "Usuário foi salvo !<br>";
                               }if ($_GET["msg_cadastro"] == 3){
                                   echo "Erro ao cadastrar, contate o desenvolvedor!<br>";
                               }if ($_GET["msg_cadastro"] == 4){
                                   echo "Campos estão em Branco !<br>";
                               }
                           }
                       ?>
                     <form method="POST" action="verificar_cadastro.php">
                        <label>Nome:</label><br><input type="text" name="nome" class="form-control" required><br>
						<label>Login:</label><br><input type="e-mail" name="email" class="form-control" required><br>
                        <label>Senha:</label><br><input type="password" name="senha" class="form-control" required><br>
                        <label>Usuário é um administrador ?</label><br>
						<input type="radio" name="usuario_admin" value="1"> Sim <input type="radio" name="usuario_admin" value="0"> Não<br><br>
                        <input type="submit" class="btn btn-success" value="Cadastrar" name="Cadastrar">
                     </form>
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
      <!-- https://bootsnipp.com/snippets/orAAd -->
   </body>
</html>