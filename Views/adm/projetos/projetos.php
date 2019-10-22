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
					<a href="../../index.php"><i class="icon-hover grey fas fa-trash-alt fa-2x" title="Lixeira"></a></i>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right main-nav">
				<li class="green">
					<a href="../../../Controller/logoutController.php"><i class="icon-hover red fas fa-sign-out-alt fa-2x" title="Sair"></a></i>
				</li>
			</ul>

		</div><!--fim nav-->
		
		<div class="container-contact100">
			<div class="container">
				<!--========inicio projetos pendentes=====================================================-->
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2><b class="red">Projetos Pendentes</b></h2>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Código</th>
								<th>Marca</th>
								<th>Plano</th>
								<th>Detalhes</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<!-- inserir campos dinâmicamente -->
							<?php
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
									echo "<td><a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=2' class='edit'><i class='fas fa-angle-double-down blue' title='Executar Projeto'></i></a></td>";
								echo "</tr>";
								} 
							?>
							<?php	
							endforeach;
							?>	
						</tbody>
					</table>
					<div class="clearfix">
						<div class="hint-text">Exibindo <b>5</b> de <b>25</b> registros</div>
						<ul class="pagination">
							<li class="page-item disabled"><a href="#">Anterior</a></li>
							<li class="page-item active"><a href="#" class="page-link">1</a></li>
							<li class="page-item"><a href="#" class="page-link">2</a></li>
							<li class="page-item"><a href="#" class="page-link">3</a></li>
							<li class="page-item"><a href="#" class="page-link">4</a></li>
							<li class="page-item"><a href="#" class="page-link">5</a></li>
							<li class="page-item"><a href="#" class="page-link">Próximo</a></li>
						</ul>
					</div>
				</div>
		
				<!--========inicio projetos em produção=====================================================-->							
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2><b class="blue">Projetos Em Produção</b></h2>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Código</th>
								<th>Marca</th>
								<th>Plano</th>
								<th>Detalhes</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<!-- inserir campos dinâmicamente -->
							<?php
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
									echo "<td>
											<a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=3' class='edit'><i class='fas fa-angle-double-down green-dark'title='Finalizar Projeto'></i></a>
											<a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=1' class='edit'><i class='fas fa-angle-double-up red'title='Voltar par Pendência'></i></a>
									</td>";
								echo "</tr>";
								} 
							?>
							<?php	
							endforeach;
							?>	
						</tbody>
					</table>
					<div class="clearfix">
						<div class="hint-text">Exibindo <b>5</b> de <b>25</b> registros</div>
						<ul class="pagination">
							<li class="page-item disabled"><a href="#">Anterior</a></li>
							<li class="page-item active"><a href="#" class="page-link">1</a></li>
							<li class="page-item"><a href="#" class="page-link">2</a></li>
							<li class="page-item"><a href="#" class="page-link">3</a></li>
							<li class="page-item"><a href="#" class="page-link">4</a></li>
							<li class="page-item"><a href="#" class="page-link">5</a></li>
							<li class="page-item"><a href="#" class="page-link">Próximo</a></li>
						</ul>
					</div>
				</div>

				<!--========inicio projetos finalizado=====================================================-->							
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2><b class="green-dark">Projetos Finalizados</b></h2>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Código</th>
								<th>Marca</th>
								<th>Plano</th>
								<th>Detalhes</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<!-- inserir campos dinâmicamente -->
							<?php
							foreach($projetoFinalizados as $cli):
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
										echo "<td>
											<a href='../../../Controller/projetoController.php?projeto=$idProjeto&status=2' class='edit'><i class='fas fa-angle-double-up blue'title='Voltar para Projeto em Produção'></i></a>
											<a href='#funcaoConfirmacao' id='btn' onclick='confirmar($idProjeto)'><i class='fas fa-trash-alt red'  title='Excluir Projeto'></i></a>
												<div id='dialog-confirm' title='Deseja apagar esse registro?'></div>

												<script id='funcaoConfirmacao'>
													function funcao_deletar() {
														location.href='../../../Controller/projetoController.php?projeto=$idProjeto&cliente=$fkCliente&logo=$fkLogo&delete=delete';
														alert('Projeto de Código $idProjeto excluído com sucesso!');
													}
													function confirmar() {
														$( '#dialog-confirm' ).dialog({
															resizable: false,
															height: 'auto',
															width: 400,
															modal: true,
															buttons: {
															'Confirmar': function() {
																$( this ).dialog( 'close');
																funcao_deletar();
															},
															'Cancelar': function() {
																$( this ).dialog( 'close');
																console.log('cancelado');
															}
															}
														});
													}
												</script>

										</td>";
								echo "</tr>";
								}

								// echo '<script id="funcaoConfirmacao">';
								// 	echo 'function funcao_deletar() {';
								// 		echo "alert('$idProjeto, $fkCliente');";
								// 	echo '}';
								// 	echo 'function confirmar() {';
								// 		echo '$( "#dialog-confirm" ).dialog({';
								// 			echo 'resizable: false,';
								// 			echo 'height: "auto",';
								// 			echo 'width: 400,';
								// 			echo 'modal: true,';
								// 			echo 'buttons: {';
								// 			echo '"Confirmar": function() {';
								// 				echo  '$( this ).dialog( "close" );';
								// 				echo 'funcao_deletar();';
								// 			echo '},';
								// 			echo "'Cancelar': function() {";
								// 				echo '$( this ).dialog( "close" );';
								// 				echo "console.log('cancelado');";
								// 			echo '}';
								// 			echo '}';
								// 		echo '});';
								// 	echo '}';
								// echo '</script>';
								
							?>
							<?php	
							endforeach;
							?>	
						</tbody>
					</table>
					<div class="clearfix">
						<div class="hint-text">Exibindo <b>5</b> de <b>25</b> registros</div>
						<ul class="pagination">
							<li class="page-item disabled"><a href="#">Anterior</a></li>
							<li class="page-item active"><a href="#" class="page-link">1</a></li>
							<li class="page-item"><a href="#" class="page-link">2</a></li>
							<li class="page-item"><a href="#" class="page-link">3</a></li>
							<li class="page-item"><a href="#" class="page-link">4</a></li>
							<li class="page-item"><a href="#" class="page-link">5</a></li>
							<li class="page-item"><a href="#" class="page-link">Próximo</a></li>
						</ul>
					</div>
				</div>
				<!-- fim tabela projeto finalizado -->
			</div>			
			
				<!-- delete modal -->
				<!-- <div id="deleteModal<?php //echo$idProjeto; ?>" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<form>
								<div class="modal-header">						
									<h4 class="modal-title red">Deletar esse projeto?</h4>
								</div>
								<div class="modal-footer">
									<input type="button" class="btn btn-danger left" data-dismiss="modal" value="Fechar">
									<a class="btn btn-success right" href='../../../Controller/projetoController.php?projeto=$idProjeto&cliente=$fkCliente&logo=$fkLogo&endereco=$fkEndereco&delete=delete' target='_blank'>Confirmar</a>
								</div>

							</form>
						</div>
					</div>
				</div> -->
				<!--fim delete modal -->
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

	<!-- script das caixas de confirmação -->
	<!-- <script id="funcaoConfirmacao">
		function funcao_deletar($idProjeto,$fkCliente,$fkLogo,$fkEndereco) {
			alert('<?php //echo $idProjeto, $fkCliente ?>');
		}
		function confirmar() {
			$( "#dialog-confirm" ).dialog({
				resizable: false,
				height: "auto",
				width: 400,
				modal: true,
				buttons: {
				"Confirmar": function() {
					$( this ).dialog( "close" );
					funcao_deletar();
				},
				'Cancelar': function() {
					$( this ).dialog( "close" );
					console.log('cancelado');
				}
				}
			});
		}
	</script> -->

	</body>
</html>
