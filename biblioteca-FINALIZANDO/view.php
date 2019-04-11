<?php
 header("Content-type: text/html; charset=utf-8");
 include('conexao.php');
 
session_start();

if (!isset($_SESSION["admin"])){
	header("Location: login.php");
}


$sql = "SELECT * FROM tbobra";

$resultado = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Biblioteca</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
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
      <div class="container">
        
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
                        <tr role="row" class="odd">
                           <td class="sorting_1">Airi Satou</td>
                           <td>Accountant</td>
                           <td>Tokyo</td>
                           <td>33</td>
                           <td>2008/11/28</td>
                        </tr>
						<?php while($linha = mysqli_fetch_assoc($resultado)): ?>
						<tr>
							<td><?=$linha["nome"];?></td>
							<td><?=$linha["autor"];?></td>
							<td><?=$linha["ano"];?></td>
							<td><?=$linha["editora"];?></td>
							<td><div class='btn-group' data-toggle='buttons'>
							<a href="livro_listar.php?id_obra=<?=$linha["id"];?>"><button class='btn btn-info btn-xs'>Livros</button></a>							
							<?php if(isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)):?>
								<a href="obra_edicao.php?id=<?=$linha["id"];?>"><button class='btn btn-warning btn-xs'>Alterar</button></a>
								<a href="obra_excluir.php?id=<?=$linha["id"];?>"><button class='btn btn-danger btn-xs'>Excluir</button></a>
							<?php endif;?>
							</div>
							</td>
						</tr>
						<?php endwhile; ?>
                        <!--<tr role="row" class="odd">
                           <td class="sorting_1">Airi Satou</td>
                           <td>Accountant</td>
                           <td>Tokyo</td>
                           <td>33</td>
                           <td>2008/11/28</td>
                           <td>$162,700</td>
                        </tr>
                        <tr role="row" class="even">
                           <td class="sorting_1">Charde Marshall</td>
                           <td>Regional Director</td>
                           <td>San Francisco</td>
                           <td>36</td>
                           <td>2008/10/16</td>
                           <td>$470,600</td>
                        </tr>-->
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
   </body>

