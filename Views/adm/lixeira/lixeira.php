<?php
	session_start();
	require_once "../../../Model/financasModel.php";
	require_once "../../../Controller/financasController.php";

	$financa_controller = new FinancasController();
	$financa_controller->listarFinancasEntrada();
	$financa_controller->listarFinancasPendente();
	$financa_controller->listarFinancasSaida();
	$financa_controller->somarEntradasFinancas();
	$financa_controller->somarPendenciasFinancas();
	$financa_controller->somarSaidasFinancas();
	$financa_controller->totalFinancas();

	//inicio sessões================================================================================
	//sessões de listagem dinâmica
	if(empty($_SESSION['financasEntrada'])){
	//	$financasEntrada = array("- - -");
	}else{
		$financasEntrada = $_SESSION['financasEntrada'];
	}
	if(empty($_SESSION['financasPendente'])){
		$financasPendente = array("- - -");
	}else{
		$financasPendente = $_SESSION['financasPendente'];
	}
	if(empty($_SESSION['financasSaidas'])){
		$financasSaidas = array("- - -");
	}else{
		$financasSaidas = $_SESSION['financasSaidas'];
	}
	//sessões de soma dos valores
	if(empty($_SESSION['somarEntradaFinanca'])){
		$somarEntradaFinancas = array("- - -");
	}else{
		$somarEntradaFinancas = $_SESSION['somarEntradaFinanca'];
	}
	if(empty($_SESSION['somarPendenciaFinanca'])){
		$somarPendenciaFinancas = array("- - -");
	}else{
		$somarPendenciaFinancas = $_SESSION['somarPendenciaFinanca'];
	}
	if(empty($_SESSION['somarSaidaFinanca'])){
		$somarSaidaFinancas = array("- - -");
	}else{
		$somarSaidaFinancas = $_SESSION['somarSaidaFinanca'];
	}
	if(empty($_SESSION['totalFinancas'])){
		$totalFinancas = array("- - -");
	}else{
		$totalFinancas = $_SESSION['totalFinancas'];
	}
	//fim sessões=====================================================================================
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
				<div class="container col-sm-12">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-8">
									<h2><b class="black">Balanço Financeiro</b></h2>
								</div>
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Tipo</th>
									<th>Valor</th>
									<th>Ações</th>
									<th></th>
								</tr>

									<tr class="btn-outline-success">
										<th></th>
										<th>Entrada</th>
										<?php
											foreach($somarEntradaFinancas as $fin){
												$entradaFinancas = $fin;
											}
											echo "<th>R$ $entradaFinancas</th>";
										?>
										<th><a href="?tipo=entrada" class="btn btn-success" title='Visualizar tabela de Entrada'><i class="fas fa-search"></i></a></th>
										<?php
											// if($_GET['tipo']=='entrada'){
											// 	$entradaAtiva = '<h5>Mostrar Tabela</h5>';
											// 	echo '<th>'.$entradaAtiva.'</th>';
											// }
										?>
										<th></th>
									</tr>
								
								
								<tr class="btn-outline-info">
								<th></th>
									<th>Pendência</th>
									<?php
										foreach($somarPendenciaFinancas as $fin){
											$financasPendencia = $fin;
										}
										echo "<th>R$ $financasPendencia</th>";
									?>
									<th><a href="#entrada"><a href="?tipo=pendencia" class="btn btn-info" title='Visualizar tabela de Pendência'><i class="fas fa-search"></i></a></a></th>
									<th></th>
								</tr>
								<tr class="btn-outline-danger">
									<th></th>
									<th>Saída</th>
									<?php
										foreach($somarSaidaFinancas as $fin){
											$financasSaida = $fin;
										}
										echo "<th>R$ $financasSaida</th>";
									?>
									<th><a href="?tipo=saida" class="btn btn-danger" title='Visualizar tabela de Saída'><i class="fas fa-search"></i></a></th>
									<th></th>
								</tr>
								<tr class="btn-light">
									<th></th>
									<th>TOTAL LÍQUIDO</th>
									<?php
										foreach($totalFinancas as $fin){
											$totalFinancas = $fin;
										}
										echo "<th>R$ $totalFinancas</th>";
										echo "<th><a href='#addFinanca' class='btn btn-primary' data-toggle='modal' title='Adicionar Finança'><i class='fas fa-plus'></i></a></th>";
										echo "<th></th>";
									?>
								</tr>
								
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>

				

				

			</div>
			<!-- fim tabela balanco -->

			<!-- inicio modal adicionar finança -->
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
									<input type="text" name="data" class="form-control" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
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
								
								<label>Tipo de Finança</label>
								<div class="form-group">
									<input type="radio" required="required" value="2" name="tipo" id="pendencia" checked="checked"/>
										<label for="pendencia">Pendência</label></br>
									
									<input type="radio" required="required" value="3" name="tipo" id="saida"/>
										<label for="saida">Saída</label>
								</div>
								
								<label>Local de Armazenamento</label>
								<div class="form-group">
									<input type="radio" required="required" value="Conta Bancária" name="armazenamento" id="contaBancaria" checked="checked"/>
									<label for="contaBancaria">Conta Bancária</label></br>

									<input type="radio" required="required" value="Conta Maquineta" name="armazenamento" id="contaMaquineta"/>
									<label for="contaMaquineta">Conta Maquineta</label></br>

									<input type="radio" required="required" value="Físico" name="armazenamento" id="dineiroFisico"/>
									<label for="dineiroFisico">Físico</label>
								</div>	
								<input type='hidden' name='id' value=''>
								<input type='hidden' name='classe' value='Financas'>
								<input type='hidden' name='metodo' value='inserirFinancas'>			
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

								<script>
								function funcao1(){
									alert("Finança adicionada com sucesso!!!");
								}
								</script>

								<input type="submit" class="btn btn-success" name="submit" value="Adicionar" onfinck="funcao1()">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Fim Modal adicionar finança -->


			<div class="container id='entrada'">		

					<?php 
					
					if(isset($_GET['tipo']) && $_GET['tipo'] == "entrada"){
			echo'		<div class="table-wrapper">';
			echo'			<div class="table-title">';
			echo'				<div class="row">';
			echo'					<div class="col-sm-6">';
			echo'						<h2 class="green-dark">REGISTROS | <b>ENTRADA</b></h2>';
			echo'					</div>';
			echo'					<div class="col-sm-6">';
			echo'				</div>';
			echo'			</div>';
			echo'		</div>';
			echo'		<table class="table table-striped table-hover">';
			echo'			<thead>';
			echo'				<tr>';
			echo'					<th>Cód.</th>';
			echo'					<th>Data</th>';
			echo'					<th>Valor</th>';
			echo'					<th>Descrição</th>';
			echo'					<th>Categoria</th>';
			echo'					<th>Armazenamento</th>';
			echo'					<th>Ações</th>';
			echo'				</tr>';
			echo'			</thead>';
			echo'			<tbody>';
								foreach ($financasEntrada as $fin):
									$idFinancas = $fin->getIdFinancas();
									$dataFinancas = $fin->getDataFinancas();
									$categoriaFinancas = $fin->getCategoriaFinancas();
									$descricaoFinancas = $fin->getDescricaoFinancas();
									$valorFinancas = $fin->getValorFinancas();
									$tipoFinancaFinancas = $fin->getTipoFinancaFinancas();
									$armazenamentoFinancas = $fin->getArmazenamentoFinancas();

			echo				 "<tr>";
			echo				 "<td>$idFinancas</td>";
			echo				 "<td>$dataFinancas</td>";
			echo				 "<td>R$ $valorFinancas</td>";
			echo				 "<td>$descricaoFinancas</td>";
			echo				 "<td>$categoriaFinancas</td>";
			echo				 "<td>$armazenamentoFinancas</td>";
			echo				 "<td><label for='modal-trigger-center$idFinancas' class='open-modal btn-outline-primary'><i class='fas fa-edit'title='Editar Finança'></i></label>
									<div class='pure-modal'>
										<input id='modal-trigger-center$idFinancas' class='checkbox' type='checkbox'>
										<div class='pure-modal-overlay'>
											<label for='modal-trigger-center$idFinancas' class='o-close'></label>
											<div class='pure-modal-wrap a-center'>
												<label for='modal-trigger-center$idFinancas' class='close'>&#10006;</label>
												</br>
												</br>
												<h2>EDITAR FINANÇA</h2>
												<p>
													<form action='../../../Controller/financasController.php' method='POST'>
														<div class='modal-header'>
															<h4 class='modal-title'>CÓDIGO: $idFinancas - ENTRADA</h4>
														</div>
															<div class='modal-body'>
															<div class='form-group text-left'>
																<label>Data de Inserção</label>
																<input type='text' name='data' class='form-control' value = '$dataFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Categoria</label>
																<input type='text' name='categoria' class='form-control' value ='$categoriaFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Descrição</label>
																<input type='text' name='descricao' class='form-control' value ='$descricaoFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Valor</label>
																<input type='text' name='valor' class='form-control' value ='$valorFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Armazenamento</label>
																<input type='text' name='armazenamento' class='form-control' value ='$armazenamentoFinancas' required>
															</div>
															<input type='hidden' name='id' value='$idFinancas'>
															<input type='hidden' name='tipo' value='$tipoFinancaFinancas'>
															<input type='hidden' name='classe' value='Financas'>
															<input type='hidden' name='metodo' value='alterarFinancas'>
														</div>
														<div class='modal-footer'>
															<input type='submit' name='submitEdit' class='btn btn-success' value='Salvar'>	
														</div>
														<h5>* para fechar a janela clique fora da caixa</h5>
													</form>
												</p>
											</div>
										</div>
									</div>

									<label for='modal-trigger-center-mover$idFinancas' class='open-modal'><i class='fas fa-money red'title='Mover para Pendência'></i></label>
									<div class='pure-modal'>
										<input id='modal-trigger-center-mover$idFinancas' class='checkbox' type='checkbox'>
										<div class='pure-modal-overlay'>
											<label for='modal-trigger-center-mover$idFinancas' class='o-close'></label>
											<div class='pure-modal-wrap a-center'>
												<label for='modal-trigger-center-mover$idFinancas' class='close'>&#10006;</label>
												</br>
												</br>
												<h3>DESEJA MOVER A FINANÇA DE <span class='bold'>CÓDIGO $idFinancas</span> PARA A PENDÊNCIA?</h3>
												<p>
													<form action='../../../Controller/financasController.php' method='POST'>
														<div class='modal-header'>
															<input type='hidden' name='id' value='$idFinancas'>
															<input type='hidden' name='tipo' value='2'>
															<input type='hidden' name='classe' value='Financas'>
															<input type='hidden' name='metodo' value='alterarTipoFinancas'>
														</div>
														<div class='modal-header'>
															<input type='submit' name='submitConfirmEntrada' class='btn btn-success' value='Confirmar'>	
														</div>
														<div class='modal-footer center'>
														<h5>* para fechar a janela clique fora da caixa</h5>
														</div>
													</form>
													
												</p>
											</div>
										</div>
									</div>
									</td>";
							endforeach;
			echo'				</tbody>';
			echo'				</table>';
			echo'				<div class="clearfix">';
			echo'					<ul class="pagination">';
			echo'						<li class="page-item disabled"><a href="#">Anterior</a></li>';
			echo'						<li class="page-item active"><a href="#" class="page-link">1</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">2</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">3</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">4</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">5</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">Próximo</a></li>';
			echo'					</ul>';
			echo'				</div>';
			echo'			</div>';
			echo'		</div>';
						}
						elseif(isset($_GET['tipo']) && $_GET['tipo'] == "saida"){
			echo'		<div class="table-wrapper">';
			echo'			<div class="table-title">';
			echo'				<div class="row">';
			echo'					<div class="col-sm-6">';
			echo'						<h2 class="red">REGISTROS | <b>SAÍDA</b></h2>';
			echo'					</div>';
			echo'					<div class="col-sm-6">';
			echo'				</div>';
			echo'			</div>';
			echo'		</div>';
			echo'		<table class="table table-striped table-hover">';
			echo'			<thead>';
			echo'				<tr>';
			echo'					<th>Cód.</th>';
			echo'					<th>Data</th>';
			echo'					<th>Valor</th>';
			echo'					<th>Descrição</th>';
			echo'					<th>Categoria</th>';
			echo'					<th>Armazenamento</th>';
			echo'					<th>Ações</th>';
			echo'				</tr>';
			echo'			</thead>';
			echo'			<tbody>';

								foreach ($financasSaidas as $fin):
									$idFinancas = $fin->getIdFinancas();
									$dataFinancas = $fin->getDataFinancas();
									$categoriaFinancas = $fin->getCategoriaFinancas();
									$descricaoFinancas = $fin->getDescricaoFinancas();
									$valorFinancas = $fin->getValorFinancas();
									$tipoFinancaFinancas = $fin->getTipoFinancaFinancas();
									$armazenamentoFinancas = $fin->getArmazenamentoFinancas();

			echo				 "<tr>";
			echo				 "<td>$idFinancas</td>";
			echo				 "<td>$dataFinancas</td>";
			echo				 "<td>R$ $valorFinancas</td>";
			echo				 "<td>$descricaoFinancas</td>";
			echo				 "<td>$categoriaFinancas</td>";
			echo				 "<td>$armazenamentoFinancas</td>";
			echo				 "<td><label for='modal-trigger-center$idFinancas' class='open-modal btn-outline-primary'><i class='fas fa-edit'title='Editar Finança'></i></label>
									<div class='pure-modal'>
										<input id='modal-trigger-center$idFinancas' class='checkbox' type='checkbox'>
										<div class='pure-modal-overlay'>
											<label for='modal-trigger-center$idFinancas' class='o-close'></label>
											<div class='pure-modal-wrap a-center'>
												<label for='modal-trigger-center$idFinancas' class='close'>&#10006;</label>
												</br>
												</br>
												<h2>EDITAR FINANÇA</h2>
												<p>
													<form action='../../../Controller/financasController.php' method='POST'>
														<div class='modal-header'>
															<h4 class='modal-title'>CÓDIGO: $idFinancas - SAÍDA</h4>
														</div>
															<div class='modal-body'>
															<div class='form-group text-left'>
																<label>Data de Inserção</label>
																<input type='text' name='data' class='form-control' value = '$dataFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Categoria</label>
																<input type='text' name='categoria' class='form-control' value ='$categoriaFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Descrição</label>
																<input type='text' name='descricao' class='form-control' value ='$descricaoFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Valor</label>
																<input type='text' name='valor' class='form-control' value ='$valorFinancas' required>
															</div>
															<div class='form-group text-left'>
																<label>Armazenamento</label>
																<input type='text' name='armazenamento' class='form-control' value ='$armazenamentoFinancas' required>
															</div>
															<input type='hidden' name='id' value='$idFinancas'>
															<input type='hidden' name='tipo' value='$tipoFinancaFinancas'>
															<input type='hidden' name='classe' value='Financas'>
															<input type='hidden' name='metodo' value='alterarFinancas'>
														</div>
														<div class='modal-footer'>
															<input type='submit' name='submitEdit' class='btn btn-success' value='Salvar'>
														</div>
														<h5>* para fechar a janela clique fora da caixa</h5>
													</form>
												</p>
											</div>
										</div>
									</div>
									</td>";
							endforeach;
			echo'				</tbody>';
			echo'				</table>';
			echo'				<div class="clearfix">';
			echo'					<ul class="pagination">';
			echo'						<li class="page-item disabled"><a href="#">Anterior</a></li>';
			echo'						<li class="page-item active"><a href="#" class="page-link">1</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">2</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">3</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">4</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">5</a></li>';
			echo'						<li class="page-item"><a href="#" class="page-link">Próximo</a></li>';
			echo'					</ul>';
			echo'				</div>';
			echo'			</div>';
			echo'		</div>';
						}
						elseif(isset($_GET['tipo']) && $_GET['tipo'] == "pendencia" OR !isset($_GET['tipo'])){
							echo'		<div class="table-wrapper">';
							echo'			<div class="table-title">';
							echo'				<div class="row">';
							echo'					<div class="col-sm-6">';
							echo'						<h2 class="info">REGISTROS | <b>PENDÊNCIAS</b></h2>';
							echo'					</div>';
							echo'					<div class="col-sm-6">';
							echo'				</div>';
							echo'			</div>';
							echo'		</div>';
							echo'		<table class="table table-striped table-hover">';
							echo'			<thead>';
							echo'				<tr>';
							echo'					<th>Cód.</th>';
							echo'					<th>Data</th>';
							echo'					<th>Valor</th>';
							echo'					<th>Descrição</th>';
							echo'					<th>Categoria</th>';
							echo'					<th>Armazenamento</th>';
							echo'					<th>Ações</th>';
							echo'				</tr>';
							echo'			</thead>';
							echo'			<tbody>';
												foreach ($financasPendente as $fin):
													$idFinancas = $fin->getIdFinancas();
													$dataFinancas = $fin->getDataFinancas();
													$categoriaFinancas = $fin->getCategoriaFinancas();
													$descricaoFinancas = $fin->getDescricaoFinancas();
													$valorFinancas = $fin->getValorFinancas();
													$tipoFinancaFinancas = $fin->getTipoFinancaFinancas();
													$armazenamentoFinancas = $fin->getArmazenamentoFinancas();
				
							echo				 "<tr>";
							echo				 "<td>$idFinancas</td>";
							echo				 "<td>$dataFinancas</td>";
							echo				 "<td>R$ $valorFinancas</td>";
							echo				 "<td>$descricaoFinancas</td>";
							echo				 "<td>$categoriaFinancas</td>";
							echo				 "<td>$armazenamentoFinancas</td>";
							echo				 "<td><label for='modal-trigger-center$idFinancas' class='open-modal btn-outline-primary'><i class='fas fa-edit'title='Editar Finança'></i></label>
													<div class='pure-modal'>
														<input id='modal-trigger-center$idFinancas' class='checkbox' type='checkbox'>
														<div class='pure-modal-overlay'>
															<label for='modal-trigger-center$idFinancas' class='o-close'></label>
															<div class='pure-modal-wrap a-center'>
																<label for='modal-trigger-center$idFinancas' class='close'>&#10006;</label>
																</br>
																</br>
																<h2>EDITAR FINANÇA</h2>
																<p>
																	<form action='../../../Controller/financasController.php' method='POST'>
																		<div class='modal-header'>
																			<h4 class='modal-title'>CÓDIGO: $idFinancas - PENDENTE</h4>
																		</div>
																			<div class='modal-body'>
																			<div class='form-group text-left'>
																				<label>Data de Inserção</label>
																				<input type='text' name='data' class='form-control' value = '$dataFinancas' required>
																			</div>
																			<div class='form-group text-left'>
																				<label>Categoria</label>
																				<input type='text' name='categoria' class='form-control' value ='$categoriaFinancas' required>
																			</div>
																			<div class='form-group text-left'>
																				<label>Descrição</label>
																				<input type='text' name='descricao' class='form-control' value ='$descricaoFinancas' required>
																			</div>
																			<div class='form-group text-left'>
																				<label>Valor</label>
																				<input type='text' name='valor' class='form-control' value ='$valorFinancas' required>
																			</div>
																			<div class='form-group text-left'>
																				<label>Armazenamento</label>
																				<input type='text' name='armazenamento' class='form-control' value ='$armazenamentoFinancas' required>
																			</div>
																			<input type='hidden' name='id' value='$idFinancas'>
																			<input type='hidden' name='tipo' value='$tipoFinancaFinancas'>
																			<input type='hidden' name='classe' value='Financas'>
																			<input type='hidden' name='metodo' value='alterarFinancas'>
																		</div>
																		<div class='modal-footer'>
																			<input type='submit' name='submitEdit' class='btn btn-success' value='Salvar'>	
																		</div>
																		<h5>* para fechar a janela clique fora da caixa</h5>
																	</form>
																</p>
															</div>
														</div>
													</div>
				
													<label for='modal-trigger-center-mover$idFinancas' class='open-modal'><i class='fas fa-money green-dark'title='Editar Finança'></i></label>
													<div class='pure-modal'>
														<input id='modal-trigger-center-mover$idFinancas' class='checkbox' type='checkbox'>
														<div class='pure-modal-overlay'>
															<label for='modal-trigger-center-mover$idFinancas' class='o-close'></label>
															<div class='pure-modal-wrap a-center'>
																<label for='modal-trigger-center-mover$idFinancas' class='close'>&#10006;</label>
																</br>
																</br>
																<h3>DESEJA MOVER A FINANÇA DE <span class='bold'>CÓDIGO $idFinancas </span> PARA A ENTRADA?</h3>
																<p>
																	<form action='../../../Controller/financasController.php' method='POST'>
																		<div class='modal-header'>
																			<input type='hidden' name='id' value='$idFinancas'>
																			<input type='hidden' name='tipo' value='1'>
																			<input type='hidden' name='classe' value='Financas'>
																			<input type='hidden' name='metodo' value='alterarTipoFinancas'>
																		</div>
																		<div class='modal-header'>
																			<input type='submit' name='submitConfirmEntrada' class='btn btn-success' value='Confirmar'>	
																		</div>
																		<div class='modal-footer center'>
																		<h5>* para fechar a janela clique fora da caixa</h5>
																		</div>
																	</form>
																	
																</p>
															</div>
														</div>
													</div>
													</td>";
											endforeach;
							echo'				</tbody>';
							echo'				</table>';
							echo'				<div class="clearfix">';
							echo'					<ul class="pagination">';
							echo'						<li class="page-item disabled"><a href="#">Anterior</a></li>';
							echo'						<li class="page-item active"><a href="#" class="page-link">1</a></li>';
							echo'						<li class="page-item"><a href="#" class="page-link">2</a></li>';
							echo'						<li class="page-item"><a href="#" class="page-link">3</a></li>';
							echo'						<li class="page-item"><a href="#" class="page-link">4</a></li>';
							echo'						<li class="page-item"><a href="#" class="page-link">5</a></li>';
							echo'						<li class="page-item"><a href="#" class="page-link">Próximo</a></li>';
							echo'					</ul>';
							echo'				</div>';
							echo'			</div>';
							echo'		</div>';
										}
					
					?>
								

		
		

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
