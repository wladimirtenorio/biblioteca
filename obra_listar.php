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
      <title>Painel Admin - <?php echo $_SESSION['biblioteca'] ;?></title>
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
               <h1>Usuário <?= (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1))?"Administrador":"Padrão" ;?></h1>
               <h1>Lista de Obra(s)</h1>
               <br/>  
               <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                     <div class="col-sm-12">
                        <table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                           <thead>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 119.75px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nome</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 197.75px;" aria-label="Position: activate to sort column ascending">Autor</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 92.75px;" aria-label="Office: activate to sort column ascending">Ano</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 32.75px;" aria-label="Age: activate to sort column ascending">Editora</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.75px;" aria-label="Start date: activate to sort column ascending">Ações</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php while($linha = mysqli_fetch_assoc($resultado)): ?>
                                <tr role="row" class="odd">
                                 <td><?=$linha["nome"];?></td>
                                 <td><?=$linha["autor"];?></td>
                                 <td><?=$linha["ano"];?></td>
                                 <td><?=$linha["editora"];?></td>
                                 <td>
                                    <div class='btn-group' data-toggle='buttons'>
                                       <a href="livro_listar.php?id_obra=<?=$linha["id"];?>"><button class='btn btn-info btn-xs'>Livros</button></a>              
                                       <?php if(isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)):?>
                                       <a href="obra_edicao.php?id=<?=$linha["id"];?>"><button class='btn btn-warning btn-xs'>Alterar</button></a>
                                       <a href="obra_excluir.php?id=<?=$linha["id"];?>"><button class='btn btn-danger btn-xs'>Excluir</button></a>
                                       <?php endif;?>
                                    </div>
                                 </td>
                              </tr>
                              <?php endwhile; ?>
                           </tbody>
                           <tfoot>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 119.75px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nome</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 197.75px;" aria-label="Position: activate to sort column ascending">Autor</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 92.75px;" aria-label="Office: activate to sort column ascending">Ano</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 32.75px;" aria-label="Age: activate to sort column ascending">Editora</th>
                                 <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 75.75px;" aria-label="Start date: activate to sort column ascending">Ações</th>
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
      <!-- https://bootsnipp.com/snippets/orAAd -->
      </body>
</html>