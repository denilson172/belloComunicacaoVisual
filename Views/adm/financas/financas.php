<?php
	session_start();
	require_once "../../../Model/projetoModel.php";
	require_once "../../../Model/logoModel.php";
	require_once "../../../Model/enderecoModel.php";
	require_once "../../../Model/clienteModel.php";
	require_once "../../../Controller/projetoController.php";
	require_once "../../../Controller/logoController.php";
	require_once "../../../Controller/enderecoController.php";
	require_once "../../../Controller/clienteController.php";

	//$projeto = "";

	if(empty($_SESSION['projetoPendente'])){
		echo "erro";
	}else{
		$projetoPendente = $_SESSION['projetoPendente'];
		$logo = $_SESSION['logoPendente'];
		$endereco= $_SESSION['enderecoPendente'];
		$cliente = $_SESSION['clientePendente'];
	}
	if(empty($_SESSION['projetoEmProducao'])){
		echo "erro";
	}else{
		$projetoEmProducao = $_SESSION['projetoEmProducao'];
	}
	if(empty($_SESSION['projetoFinalizado'])){
		echo "erro";
	}else{
		$projetoFinalizados = $_SESSION['projetoFinalizado'];
	}
?>


<!DOCTYPE html>
	<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bello - Finanças</title>
		<meta name="Bello Design" content="Site Bello Design - 2019" />
	<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="../../Style/img/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="../../Style/css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/animate.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/animsition/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/util.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/style-contact.css">
	<!--===============================================================================================-->
	<!--css home-->
		<link rel="stylesheet" type="text/css" href="../../Style/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/owl.css">
		<link rel="stylesheet" type="text/css" href="../../Style/css/animate.css">
		<link rel="stylesheet" type="text/css" href="../../Style/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../Style/fonts/eleganticons/et-icons.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../Style/css/style-principal.css">
	<!--===============================================================================================-->
	<!--css crud-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../Style/css/style-crud.css">
	<!--===============================================================================================-->

	</head>
	<body>

		<!-- <div class="preloader">
			<img src="../../Style/img/loader.gif" alt="Preloader image">
		</div> -->

		<!-- Menu horizontal -->
		<div class="collapse navbar-collapse white-bg" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav main-nav">
				<li class="green">
					<a href="../projetos/projetos.php"><i class="icon-hover blue fas fa-pencil-ruler fa-2x" title="Projetos"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-left main-nav">
				<li class="green">
					<a class="active" href="../financas/financas.php"><i class="fas fa-money-check-alt fa-2x" title="Finanças"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-left main-nav">
				<li class="green">
					<a href="../../index.php"><i class="icon-hover grey fas fa-trash-alt fa-2x" title="Lixeira"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right main-nav">
				<li class="green">
					<a href="../../../Controller/logoutController.php"><i class="icon-hover red fas fa-sign-out-alt fa-2x" title="Sair"></a></i>
				</li>
			</ul>

		</div><!--fim nav-->
		
		<!--========inicio balanço=====================================================-->
		<div class="container-contact100">
			<!-- inicio tabela balanco-->
			<div class="container">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2><b class="black">Balanço Financeiro</b></h2>
							</div>
							<div class="col-sm-6">
								<a href="#addFinanca" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Finança</span></a>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Tipo</th>
								<th>Valor</th>								
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>Entrada</th><td>valor dinâmico do total</td>
							</tr>
							<tr>
								<th>Pendência</th><td>valor dinâmico do total</td>
							</tr>
							<tr>
								<th>Saída</th><td>valor dinâmico do total</td>
							</tr>
							<tr>
								<th>Total</th><td>valor dinâmico do total</td>
							</tr>
						</tbody>

					</table>					
				</div>
			<!-- </div> -->
			<!-- fim tabela balanco -->

				<!-- Menu horizontal -->
				<div class="collapse navbar-collapse white-bg" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav main-nav">
						<li class="green">
							<a href=""><i class="fas fa-exclamation-triangle red title="Projetos"></a></i>
						</li>
					</ul>
					<ul class="nav navbar-nav main-nav">
						<li class="green">
							<a href=""><i class="fas fa-clock grey title="Projetos"></a></i>
						</li>
					</ul>
					<ul class="nav navbar-nav main-nav">
						<li class="green">
							<a href=""><i class="fas fa-check-circle green-dark title="Projetos"></a></i>
						</li>
					</ul>
				</div><!--fim nav-->
			</div>

			<!-- inicio tabela resumo-->
			<div class="container">
				<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>Thomas Hardy</td>
							<td>thomashardy@mail.com</td>
							<td>89 Chiaroscuro Rd, Portland, USA</td>
							<td>(171) 555-2222</td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox2" name="options[]" value="1">
									<label for="checkbox2"></label>
								</span>
							</td>
							<td>Dominique Perrier</td>
							<td>dominiqueperrier@mail.com</td>
							<td>Obere Str. 57, Berlin, Germany</td>
							<td>(313) 555-5735</td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox3" name="options[]" value="1">
									<label for="checkbox3"></label>
								</span>
							</td>
							<td>Maria Anders</td>
							<td>mariaanders@mail.com</td>
							<td>25, rue Lauriston, Paris, France</td>
							<td>(503) 555-9931</td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox4" name="options[]" value="1">
									<label for="checkbox4"></label>
								</span>
							</td>
							<td>Fran Wilson</td>
							<td>franwilson@mail.com</td>
							<td>C/ Araquil, 67, Madrid, Spain</td>
							<td>(204) 619-5731</td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>					
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox5" name="options[]" value="1">
									<label for="checkbox5"></label>
								</span>
							</td>
							<td>Martin Blank</td>
							<td>martinblank@mail.com</td>
							<td>Via Monte Bianco 34, Turin, Italy</td>
							<td>(480) 631-2097</td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr> 
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item active"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="addEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">						
							<h4 class="modal-title">Add Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<textarea class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control" required>
							</div>					
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-success" value="Add">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="editEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">						
							<h4 class="modal-title">Edit Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<textarea class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control" required>
							</div>					
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-info" value="Save">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<div id="deleteEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">						
							<h4 class="modal-title">Delete Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">					
							<p>Are you sure you want to delete these Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>

		
		

		<!--===============================================================================================-->
		<script src="../../Style/js/vendor-contact/jquery/jquery-3.2.1.min.js"></script>
		<script src="../../Style/js/vendor-contact/animsition/animsition.min.js"></script>
		<script src="../../Style/js/vendor-contact/bootstrap/popper.js"></script>
		<script src="../../Style/js/vendor-contact/bootstrap/bootstrap.min.js"></script>
		<script src="../../Style/js/vendor-contact/select2/select2.min.js"></script>
		<script src="../../Style/js/vendor-contact/daterangepicker/moment.min.js"></script>
		<script src="../../Style/js/vendor-contact/daterangepicker/daterangepicker.js"></script>
		<script src="../../Style/js/vendor-contact/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="../../Style/js/main-contact.js"></script>

		<!--===============================================================================================-->	
		<!-- Scripts home -->
		<script src="../../Style/js/jquery-1.11.1.min.js"></script>
		<script src="../../Style/js/owl.carousel.min.js"></script>
		<script src="../../Style/js/bootstrap.min.js"></script>
		<script src="../../Style/js/wow.min.js"></script>
		<script src="../../Style/js/typewriter.js"></script>
		<script src="../../Style/js/jquery.onepagenav.js"></script>
		<script src="../../Style/js/main.js"></script>
		<!--===============================================================================================-->
		<!--script crud-->
		<script src="../../Style/js/functions-crud.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
		</script>

	</body>
</html>
