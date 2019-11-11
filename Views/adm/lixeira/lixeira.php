<?php
	session_start();

	
	
	//fim sessões=====================================================================================
?>
<!DOCTYPE html>
	<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bello - Lixeira</title>
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
	<!-- modal -->
	<link rel="stylesheet" href="../../Style/css/modal.css">
	<link rel="stylesheet" href="../../Style/css/style-modal.css">

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
					<a class="green" href="../financas/financas.php"><i class="fas fa-money-check-alt fa-2x green-dark" title="Finanças"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-left main-nav">
				<li>
					<a class="active"><i class="icon-hover white fas fa-trash-alt fa-2x" title="Lixeira"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right main-nav">
				<li class="green">
					<a href="../../../Controller/logoutController.php"><i class="icon-hover red fas fa-sign-out-alt fa-2x" title="Sair"></a></i>
				</li>
			</ul>
		</div><!--fim nav-->

		<!--========inicio das tabelas=====================================================-->
		<div class="container-contact100">
			<div class="container col-sm-12">
				<a href="?tipo=financas" class="btn btn-success" title='Visualizar exclusões das finanças'><i class="fas fa-money-check-alt"></i> Finanças</a>
				<a href="?tipo=projetos" class="btn btn-info" title='Visualizar exclusões dos projetos'><i class="fas fa-pencil-ruler"></i> Projetos</a>
			
			<!-- inicio tabela financas-->
			<div class="container">
				<div class="container col-sm-12">
					<div class="row">

						<?php 
						if(isset($_GET['tipo']) && $_GET['tipo'] == "financas" OR !isset($_GET['tipo'])){
							require_once "../../../Controller/financasController.php";
							$financa_controller = new FinancasController();
							$financa_controller->listarFinancasExclusoes();
							if(empty($_SESSION['financasDelete'])){
								$financasEntrada = array("- - -");
							}else{
								$financasDelete = $_SESSION['financasDelete'];
							}
							
				echo'		<div class="col-sm">';
				echo'			<div class="table-wrapper">';
				echo'				<div class="table-title">';
				echo'					<div class="row">';
				echo'						<div class="col-sm-6">';
				echo'							<h2 class="green-dark">EXCLUSÕES | <b>FINANÇAS</b></h2>';
				echo'						</div>';
				echo'						<div class="col-sm-6">';
				echo'					</div>';
				echo'				</div>';
				echo'			</div>';
				echo'			<table class="table table-striped table-hover">';
				echo'				<thead>';
				echo'					<tr>';
				echo'						<th>Cód.</th>';
				echo'						<th>Data</th>';
				echo'						<th>Valor</th>';
				echo'						<th>Descrição</th>';
				echo'						<th>Categoria</th>';
				echo'						<th>Armazenamento</th>';
				echo'						<th>Motivo</th>';
				echo'						<th>Data da Exclusão</th>';
				echo'					</tr>';
				echo'				</thead>';
				echo'				<tbody>';
										foreach ($financasDelete as $fin):
											$idFinancas = $fin->getIdFinancas();
											$dataFinancas = $fin->getDataFinancas();
											$categoriaFinancas = $fin->getCategoriaFinancas();
											$descricaoFinancas = $fin->getDescricaoFinancas();
											$valorFinancas = $fin->getValorFinancas();
											$armazenamentoFinancas = $fin->getArmazenamentoFinancas();
											$dataExclusaoFinancas = $fin->getDataExclusaoFinancas();
											$motivoExclusaoFinancas = $fin->getMotivoExclusaoFinancas();

				echo				 "<tr>";
				echo				 "<td>$idFinancas</td>";
				echo				 "<td>$dataFinancas</td>";
				echo				 "<td>R$ $valorFinancas</td>";
				echo				 "<td>$descricaoFinancas</td>";
				echo				 "<td>$categoriaFinancas</td>";
				echo				 "<td>$armazenamentoFinancas</td>";
				echo				 "<td>$motivoExclusaoFinancas</td>";
				echo				 "<td>$dataExclusaoFinancas</td>";

									endforeach;
				echo'					</tbody>';
				echo'					</table>';
				echo'					<div class="clearfix">';
				echo'						<ul class="pagination">';
				echo'							<li class="page-item disabled"><a href="#">Anterior</a></li>';
				echo'							<li class="page-item active"><a href="#" class="page-link">1</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">2</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">3</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">4</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">5</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">Próximo</a></li>';
				echo'						</ul>';
				echo'					</div>';
				echo'				</div>';
				echo'			</div>';
				echo'		</div>';
							}
							//inicio projetos
						elseif(isset($_GET['tipo']) && $_GET['tipo'] == "projetos"){
							require_once "../../../Controller/projetoController.php";
							$projeto_controller = new ProjetoController();
							$projeto_controller->listarProjetosExclusoes();
							
							if(empty($_SESSION['projetosDelete'])){
								$projetosDelete = array("- - -");
							}else{
								$projetosDelete = $_SESSION['projetosDelete'];
							}
				echo'		<div class="col-sm">';
				echo'			<div class="table-wrapper">';
				echo'				<div class="table-title">';
				echo'					<div class="row">';
				echo'						<div class="col-sm-6">';
				echo'							<h2 class="info">EXCLUSÕES | <b>PROJETOS</b></h2>';
				echo'						</div>';
				echo'						<div class="col-sm-6">';
				echo'					</div>';
				echo'				</div>';
				echo'			</div>';
				echo'			<table class="table table-striped table-hover">';
				echo'				<thead>';
				echo'					<tr>';
				echo'						<th>Cód.</th>';
				echo'						<th>Nome</th>';
				echo'						<th>Plano</th>';
				echo'						<th>Motivo da Exclusão</th>';
				echo'						<th>Data de Exclusão</th>';
				
				echo'					</tr>';
				echo'				</thead>';
				echo'				<tbody>';
										foreach ($projetosDelete as $pro):
											$idProjeto = $pro->getIdProjeto();
											$nomeProjeto = $pro->getNomeProjeto();
											$planoProjeto = $pro->getPlanoProjeto();
											$motivoExclusaoProjetos = $pro->getMotivoExclusao();
											$dataExclusaoProjetos = $pro->getDataExclusao();

				echo				 "<tr>";
				echo				 "<td>$idProjeto</td>";
				echo				 "<td>$nomeProjeto</td>";
				echo				 "<td>$planoProjeto</td>";
				echo				 "<td>$motivoExclusaoProjetos</td>";
				echo				 "<td>$dataExclusaoProjetos</td>";

									endforeach;
				echo'					</tbody>';
				echo'					</table>';
				echo'					<div class="clearfix">';
				echo'						<ul class="pagination">';
				echo'							<li class="page-item disabled"><a href="#">Anterior</a></li>';
				echo'							<li class="page-item active"><a href="#" class="page-link">1</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">2</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">3</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">4</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">5</a></li>';
				echo'							<li class="page-item"><a href="#" class="page-link">Próximo</a></li>';
				echo'						</ul>';
				echo'					</div>';
				echo'				</div>';
				echo'			</div>';
				echo'		</div>';
							}
							
							?>

				</div>
			</div>
			<!-- fim tabelas -->


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
		<!-- Script caixas de confirmação -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
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
