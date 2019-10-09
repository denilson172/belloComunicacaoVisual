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
								<h2><b class="black">Balanço</b></h2>
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
			</div>
			<!-- fim tabela balanco -->

			<!-- inicio tabela resumo-->
			<div class="container">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2><b class="black">Balanço</b></h2>
							</div>
							<div class="col-sm-6">
								<a href="#addFinanca" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span></span></a>
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
			</div>
			<!-- fim tabela -->
		</div>

		<!-- Edit Modal HTML -->
	<div id="addFinanca" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="../../../Controller/financasController.php" method="POST">
					<div class="modal-header blue-bg">						
						<h4 class="modal-title white">Adicionar Finança</h4>
						
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Data</label>
							<input type="date" name="data" class="form-control" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" required>
						</div>
						<div class="form-group">
							<label>Categoria</label>
							<input type="text" name="categoria" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descrição</label>
							<textarea name="descricao" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Valor</label>
							<input type="text" name="valor" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="radio" required="required" value="1" name="tipoFinanca" id="pendencia"/>
								<label for="pendencia">Pendência</label>
								<label></label>
							<input type="radio" required="required" value="2" name="tipoFinanca" id="saida"/>
								<label for="saida">Saída</label>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="hidden" name="classe" value="Financas"/>
						<input type="hidden" name="metodo" value="inserirFinancas"/>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

						<script>
						function funcao1(){
							alert("Finança adicionada com sucesso!!!");
						}
						</script>

						<input type="submit" class="btn btn-success" name="submit" value="Adicionar" onclick="funcao1()">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->

		
		

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
