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

	$projeto_controller = new ProjetoController();
	$projeto_controller->listarProjetoPendente();
	$projeto_controller->listarProjetoEmProducao();
	$projeto_controller->listarProjetoFinalizado();

	//sessões==========================================================
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
		<title>Bello - Projetos</title>
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

		<div class="preloader">
			<img src="../../Style/img/loader.gif" alt="Preloader image">
		</div>

		<!-- Menu horizontal -->
		<div class="collapse navbar-collapse white-bg" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav main-nav">
				<li class="greens">
					<a class="active" href="#"><i class="white fas fa-pencil-ruler fa-2x" title="Projetos"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-left main-nav">
				<li class="green">
					<a href="../financas/financas.php"><i class="icon-hover green-dark fas fa-money-check-alt fa-2x" title="Finanças"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-left main-nav">
				<li class="green">
					<a href="../lixeira/lixeira.php"><i class="icon-hover grey fas fa-trash-alt fa-2x" title="Lixeira"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right main-nav">
				<li class="green">
					<a href="../../../Controller/loginController.php?logout=true"><i class="icon-hover red fas fa-sign-out-alt fa-2x" title="Sair"></a></i>
				</li>
			</ul>

		</div><!--fim nav-->
		
		<div class="container-contact100">
			<div class="container">
				<a href="?tipo=pendente" class="btn btn-danger" title='Visualizar projetos pendentes'><i class="fas fa-exclamation-triangle"></i> Projetos Pendentes</a>
				<a href="?tipo=producao" class="btn btn-info" title='Visualizar projetos em produção'><i class="fas fa-cogs"></i> Projetos em Produção</a>
				<a href="?tipo=finalizado" class="btn btn-success" title='Visualizar projetos finalizados'><i class="fas fa-check-square"></i> Projetos Finalizados</a>
				<!--========inicio projetos pendentes=====================================================-->
				<?php
					if(isset($_GET['tipo']) && $_GET['tipo'] == "pendente" OR !isset($_GET['tipo']) ){
			echo'		<div class="table-wrapper">';
			echo'			<div class="table-title">';
			echo'				<div class="row">';
			echo'					<div class="col-sm-6">';
			echo'						<h2><b class="btn-outline-danger">Projetos Pendentes</b></h2>';
			echo'					</div>';
			echo'				</div>';
			echo'			</div>';
			echo'			<table class="table table-striped table-hover">';
			echo'				<thead>';
			echo'					<tr>';
			echo'						<th>Código</th>';
			echo'						<th>Marca</th>';
			echo'						<th>Plano</th>';
			echo'						<th>Detalhes</th>';
			echo'						<th>Ações</th>';
			echo'					</tr>';
			echo'				</thead>';
			echo'				<tbody>';
									foreach($projetoPendente as $cli):
										$idProjeto = $cli->getIdProjeto();
										$nomeProjeto = $cli->getNomeProjeto();
										$planoProjeto = $cli->getPlanoProjeto();
										$fkLogo = $cli->getIdLogo();
										$fkCliente = $cli->getIdCliente();

										foreach($cliente as $cli){
											$idCliente = $cli->getIdCliente();
											$nomeCliente = $cli->getNomeCliente();
											$emailCliente = $cli->getEmailCliente();
											$celularCliente = $cli->getCelularCliente();
											// $fkEndereco = $cli->getIdEndereco();
										}
								
										echo "<tr>";
										if(empty($idProjeto)){
											
											echo "<td>-</td>";
											echo "<td>-</td>";	
											echo "<td>-</td>";	
											echo "<td>-</td>";	
											echo "<td>-</td>";									
										}else{
											echo "<td> $idProjeto</td> ";
											echo "<td> $nomeProjeto </td> ";
											echo "<td> $planoProjeto </td> ";
											echo "<td><a href='detalhesProjetos.php?projeto=$idProjeto&cliente=$fkCliente&logo=$fkLogo' id='#detalhes$idProjeto' target='_blank'>Visualizar Detalhes</a></td>";
											echo "<td><a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=2'><i class= 'fas fa-cogs btn-outline-info' title='Executar Projeto'></i></a></td>";
										echo "</tr>";
										} 
							
									endforeach;
								
			echo'					</tbody>';
			echo'				</table>';
			echo'			</div>';
					}
		
					//========inicio projetos em produção=====================================================-->		
					elseif(isset($_GET['tipo']) && $_GET['tipo'] == "producao"){					
			echo'		<div class="table-wrapper">';
			echo'			<div class="table-title">';
			echo'				<div class="row">';
			echo'					<div class="col-sm-6">';
			echo'						<h2><b class="btn-outline-info">Projetos Em Produção</b></h2>';
			echo'					</div>';
			echo'				</div>';
			echo'			</div>';
			echo'			<table class="table table-striped table-hover">';
			echo'				<thead>';
			echo'					<tr>';
			echo'						<th>Código</th>';
			echo'						<th>Marca</th>';
			echo'						<th>Plano</th>';
			echo'						<th>Detalhes</th>';
			echo'						<th>Finalizar</th>';
			echo'						<th>Retornar</th>';
			echo'					</tr>';
			echo'				</thead>';
			echo'				<tbody>';

									foreach($projetoEmProducao as $cli):
										$idProjeto = $cli->getIdProjeto();
										$nomeProjeto = $cli->getNomeProjeto();
										$planoProjeto = $cli->getPlanoProjeto();
										$fkLogo = $cli->getIdLogo();
										$fkCliente = $cli->getIdCliente();

										foreach($cliente as $cli){
											$idCliente = $cli->getIdCliente();
											$nomeCliente = $cli->getNomeCliente();
											$emailCliente = $cli->getEmailCliente();
											$celularCliente = $cli->getCelularCliente();
											$fkEndereco = $cli->getIdEndereco();
										}
										
										echo "<tr>";
										if(empty($idProjeto)){
											
											echo "<td>-</td>";
											echo "<td>-</td>";	
											echo "<td>-</td>";	
											echo "<td>-</td>";	
											echo "<td>-</td>";									
										}else{
											echo "<td> $idProjeto</td> ";
											echo "<td> $nomeProjeto </td> ";
											echo "<td> $planoProjeto </td> ";
											echo "<td><a href='detalhesProjetos.php?projeto=$idProjeto&cliente=$fkCliente&logo=$fkLogo' id='#detalhes$idProjeto' target='_blank'>Visualizar Detalhes</a></td>";
											echo "<td><a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=3' class='edit'><i class='fas fa-check-square green-dark'title='Finalizar Projeto'></i></a></td>";
											echo "<td><a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=1' class='edit'><i class='fas fa-exclamation-triangle red'title='Voltar para Pendência'></i></a></td>";
										echo "</tr>";
										} 
									
									endforeach;

			echo'				</tbody>';
			echo'			</table>';
			echo'		</div>';
					}
					
					//========inicio projetos finalizado=====================================================-->
					elseif(isset($_GET['tipo']) && $_GET['tipo'] == "finalizado"){							
			echo'		<div class="table-wrapper">';
			echo'			<div class="table-title">';
			echo'				<div class="row">';
			echo'					<div class="col-sm-6">';
			echo'						<h2><b class="btn-outline-success">Projetos Finalizados</b></h2>';
			echo'					</div>';
			echo'				</div>';
			echo'			</div>';
			echo'			<table class="table table-striped table-hover">';
			echo'				<thead>';
			echo'					<tr>';
			echo'						<th>Código</th>';
			echo'						<th>Marca</th>';
			echo'						<th>Plano</th>';
			echo'						<th>Detalhes</th>';
			echo'						<th>Mover</th>';
			echo'						<th>Excluir</th>';
			echo'					</tr>';
			echo'				</thead>';
			echo'				<tbody>';
									
									foreach($projetoFinalizados as $cli):
										$idProjeto = $cli->getIdProjeto();
										$nomeProjeto = $cli->getNomeProjeto();
										$planoProjeto = $cli->getPlanoProjeto();
										$fkLogo = $cli->getIdLogo();
										$fkCliente = $cli->getIdCliente();
										$dataExclusao = date('d/m/y', time());

										foreach($cliente as $cli){
											$idCliente = $cli->getIdCliente();
											$nomeCliente = $cli->getNomeCliente();
											$emailCliente = $cli->getEmailCliente();
											$celularCliente = $cli->getCelularCliente();
											$fkEndereco = $cli->getIdEndereco();
										}
										
										echo "<tr>";
											if(empty($idProjeto)){
												echo "<td>-</td>";
												echo "<td>-</td>";	
												echo "<td>-</td>";	
												echo "<td>-</td>";	
												echo "<td>-</td>";									
											}else{
												echo "<td> $idProjeto</td> ";
												echo "<td> $nomeProjeto </td> ";
												echo "<td> $planoProjeto </td> ";
												echo "<td><a href='detalhesProjetos.php?projeto=$idProjeto&cliente=$fkCliente&logo=$fkLogo' id='#detalhes$idProjeto' target='_blank'>Visualizar Detalhes</a></td>";
												echo "<td><a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=2'><i class='fas fa-cogs bnt-outline-info'title='Voltar para Projeto em Produção'></i></a></td>";
												echo "<td>
													<label for='modal-trigger-center-deletar$idProjeto' class='open-modal'><i class='fas fa-trash grey'title='Excluir Entrada'></i></label>
													<div class='pure-modal'>
														<input id='modal-trigger-center-deletar$idProjeto' class='checkbox' type='checkbox'>
														<div class='pure-modal-overlay'>
															<label for='modal-trigger-center-deletar$idProjeto' class='o-close'></label>
															<div class='pure-modal-wrap a-center'>
																<label for='modal-trigger-center-deletar$idProjeto' class='close'>&#10006;</label>
																</br>
																</br>
																<h3>DESEJA DELETAR A FINANÇA DE <span class='bold'>CÓDIGO $idProjeto</span>?</h3>
																<p>
																	<form action='../../../Controller/projetoController.php' method='POST'>
																		<div class='modal-header'>
																			<input type='hidden' name='id' value='$idProjeto'>
																			<input type='hidden' name='nome' value='$nomeProjeto'>
																			<input type='hidden' name='plano' value='$planoProjeto'>
																			<input type='hidden' name='fkLogo' value='$idProjeto'>
																			<input type='hidden' name='fkCliente' value='$idProjeto'>
																			<input type='hidden' name='dataExclusao' value='$dataExclusao'>
																			
																			<input type='hidden' name='classe' value='Projeto'>
																			<input type='hidden' name='metodo' value='deletarProjeto'>
																		</div>
																		<div class='form-group text-left'>
																			<h5 class='bold'>Informe o motivo da exclusão</h5>
																			<textarea name='motivoExclusao' class='form-control' required></textarea>
																		</div>
																		<div class='form-group text-left'>
																			<h5 class='bold'>Data da Exclusão</h5>
																			<input type='text' class='form-control' value='$dataExclusao' disabled>
																			
																		</div>
																		<div class='modal-header'>
																		<input type='submit' name='submitConfirmExclusao' class='btn btn-danger' value='Confirmar'>
																		</div>
																		<div class='modal-footer center'>
																		<h5 class='bold red'>* ESTA AÇÃO NÃO PODE SER DESFEITA</h5>
																		</div>
																	</form>
																	
																</p>
															</div>
														</div>
													</div>
												</td>";
										echo "</tr>";
										}
	
									endforeach;
										
			echo'					</tbody>';
			echo'				</table>';
			echo'			</div>';
					}
				?>
						<!-- fim tabela projeto finalizado -->
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
