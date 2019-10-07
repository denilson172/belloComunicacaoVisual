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

		<!-- <div class="preloader">
			<img src="../../Style/img/loader.gif" alt="Preloader image">
		</div> -->

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
		
		<!--========inicio projetos pendentes=====================================================-->
		<div class="container-contact100">
			<!--inicio crud - pendente-->
			<div class="container">
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
								<th>Executar Projeto</th>
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
								}
	
								foreach($logo as $cli){
									$sloganLogo = $cli->getSloganMarcaLogo();
									$descricaoLogo = $cli->getDescricaoMarcaLogo();
								}
								
								foreach($endereco as $cli){
									$logradouroEndereco = $cli->getLogradouroEndereco();
									$numeroEndereco = $cli->getNumeroEndereco();
									$bairroEndereco = $cli->getBairroEndereco();
									$cidadeEndereco = $cli->getCidadeEndereco();									
								}
								
								echo "<tr>";
									echo "<td> $idProjeto</td> ";
									echo "<td> $nomeProjeto </td> ";
									echo "<td> $planoProjeto </td> ";
									 //echo "<td><a href='#detalhesModal$idProjeto' target='_blank' data-toggle='modal'data-target='#detalhesModal$idProjeto'>Visualizar Detalhes</a></td>";
									 echo "<td><a href='detalhesProjetos.php' id='#detalhes$idProjeto' target='_blank'>Visualizar Detalhes</a></td>";
									 echo "<td><a href='../../../Controller/projetoController.php' class='edit'><i class='fas fa-angle-double-right blue' title='Executar Projeto' value='2'></i></a></td>";							
								echo "</tr>";
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
			</div>
			

			<?php 
			foreach($cliente as $cli){
				$idCliente = $cli->getIdCliente();
				$nomeCliente = $cli->getNomeCliente();
				$emailCliente = $cli->getEmailCliente();
				$celularCliente = $cli->getCelularCliente();
			}

			foreach($logo as $cli){
				$sloganLogo = $cli->getSloganMarcaLogo();
				$descricaoLogo = $cli->getDescricaoMarcaLogo();
			}
			
			foreach($endereco as $cli){
				$logradouroEndereco = $cli->getLogradouroEndereco();
				$numeroEndereco = $cli->getNumeroEndereco();
				$bairroEndereco = $cli->getBairroEndereco();
				$cidadeEndereco = $cli->getCidadeEndereco();									
			}

			foreach($projetoPendente as $cli):
				$idProjeto = $cli->getIdProjeto();
				$nomeProjeto = $cli->getNomeProjeto();
				$planoProjeto = $cli->getPlanoProjeto();
				$fkLogo = $cli->getIdLogo();
				$fkCliente = $cli->getIdCliente();
				
				echo "<div id='detalhesModal$idProjeto' class='modal fade'>";
					echo "<div class='modal-dialog'>";
						echo "<div class='modal-content'>";
						echo "<form>";
							echo "<div class='modal-header blue-bg'>";
								echo "<h4 class='modal-title white'>Detalhes </h4>";
							echo "</div>";
							echo "<div class='modal-header'>";
								echo "<h4 class='modal-title'>Sobre o Cliente</h4>";
							echo "</div>";
							echo "<div class='modal-body'>";
								echo "<div class='form-group'>";
								echo "<label>Nome</label>";
								echo "<input type='name' class='form-control' value= $nomeCliente required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Email</label>";
							echo "<input type='email' class='form-control' value= $emailCliente required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Telefone</label>";
							echo "<input type='phone' class='form-control' value= $celularCliente required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Cidade</label>";
							echo "<input type='city' class='form-control' value= $cidadeEndereco required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Rua</label>";
							echo "<input type='text' class='form-control'  value= $logradouroEndereco required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Número</label>";
							echo "<input type='text' class='form-control' value= $numeroEndereco required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Bairro</label>";
							echo "<input type='text' class='form-control' value= $bairroEndereco required disabled>";
							echo "</div>";
							echo "<div class='modal-header'>";
								echo "<h4 class='modal-title'>Sobre o Projeto</h4>";
							echo "</div></br>";
							echo "<div class='form-group'>";
							echo "<label>Plano</label>";
							echo "<input type='plano' class='form-control' value= $planoProjeto required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Nome</label>";
							echo "<input type='text' class='form-control' value= $nomeProjeto required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Slogan</label>";
							echo "<input type='text' class='form-control' value= $sloganLogo required disabled>";
							echo "</div>";
							echo "<div class='form-group'>";
							echo "<label>Descrição</label>";
							echo "<input type='text' class='form-control' value= $descricaoLogo required disabled>";
							echo "</div>";
							echo "</div>";
							echo "<div class='modal-footer'>";
							echo "<input type='button' class='btn btn-default' data-dismiss='modal' value='Fechar'>";
							echo "</div>";
							echo "</form>";
							echo "</div>";
							echo "</div>";

				echo '</div>';
								
				endforeach;
			?>
		</div>

		<!--========inicio projetos em produção=====================================================-->
		<div class="container-contact100">
			<!--inicio crud - pendente-->
			<div class="container">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2><b class="blue">Projetos em Produção</b></h2>
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
								<th>Finalizar Projeto</th>
							</tr>
						</thead>
						<tbody>
							<!-- inserir campos dinâmicamente -->
							<?php
							foreach($projetoEmProducao as $cli){
								$idProjeto = $cli->getIdProjeto();
								$nomeProjeto = $cli->getNomeProjeto();
								$planoProjeto = $cli->getPlanoProjeto();
								
								echo "<tr>";
									echo "<td> $idProjeto</td> ";
									echo "<td> $nomeProjeto </td> ";
									echo "<td> $planoProjeto </td> ";
									echo "<td><a href='#detalhesModal2' data-toggle='modal'>Visualizar Detalhes</a></td>";
									echo "<td><a href='' class='edit'><i class='fas fa-angle-double-right green-dark' title='Finalizar Projeto' value='2'></i></a></td>";							
								echo "</tr>";
							}

							?>	
						</tbody>
					</table>
				</div>
			</div>
			<!-- VIEW Modal HTML -->
			<div id="detalhesModal" class="modal fade">
			<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header blue-bg">						
								<h4 class="modal-title white">Detalhes </h4>
							</div>

							<div class="modal-header">						
								<h4 class="modal-title">Sobre o Cliente</h4>
							</div>
							
							<div class="modal-body">					
								<div class="form-group">
								<!-- <?php
									// foreach($clienteEmProducao as $cli){
									// 	echo "<label>Nome: $nomeCliente</label></br>";
									// 	echo "<label>Email: $emailCliente</label></br>";
									// 	echo "<label>Telefone: $celularCliente</label></br>";
									// }
								?>-->
								</div>
								<div class="form-group">
									<label>Cidade</label>
									<input type="city" class="form-control" value=<?php echo $cidadeEndereco ?> required disabled>
								</div>			
								<div class="form-group">
									<label>Rua</label>
									<input type="text" class="form-control"  value=<?php echo $logradouroEndereco ?> required disabled>
								</div>	
								<div class="form-group">
									<label>Número</label>
									<input type="text" class="form-control" value=<?php echo $numeroEndereco ?> required disabled>
								</div>	
								<div class="form-group">
									<label>Bairro</label>
									<input type="text" class="form-control" value=<?php echo $bairroEndereco ?> required disabled>
								</div>	

								<div class="modal-header">						
									<h4 class="modal-title">Sobre o Projeto</h4>
								</div></br>

								<div class="form-group">
									<label>Plano</label>
									<input type="plano" class="form-control" value=<?php echo $planoProjeto ?> required disabled>
								</div>
								<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" value=<?php echo $nomeProjeto ?> required disabled>
								</div>
								<div class="form-group">
									<label>Slogan</label>
									<input type="text" class="form-control" value=<?php echo $sloganLogo ?> required disabled>
								</div>
								<div class="form-group">
									<label>Descrição</label>
									<input type="text" class="form-control" value=<?php echo $descricaoLogo ?> required disabled>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--fim modal-->
		</div>

		<!--========inicio projetos finalizados=====================================================-->
		<div class="container-contact100">
			<!--inicio crud - finalizados-->
			<div class="container">
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
								<th>Excluir Projeto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($projetoFinalizados as $cli){
								$idProjeto = $cli->getIdProjeto();
								$nomeProjeto = $cli->getNomeProjeto();
								$planoProjeto = $cli->getPlanoProjeto();
								
								echo "<tr>";
									echo "<td> $idProjeto</td> ";
									echo "<td> $nomeProjeto </td> ";
									echo "<td> $planoProjeto </td> ";
									echo "<td><a href='#detalhesModal2' data-toggle='modal'>Visualizar Detalhes</a></td>";
									echo "<td><a href='' class='edit'><i class='fas fa-angle-double-right red' title='Excluir Projeto' value='2'></i></a></td>";							
								echo "</tr>";
							}
							?>	
						</tbody>
					</table>
				</div>
			</div>
			<!-- VIEW Modal HTML -->
			<div id="detalhesModal2" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form>
							<div class="modal-header blue-bg">						
								<h4 class="modal-title white">Detalhes </h4>
							</div>

							<div class="modal-header">						
								<h4 class="modal-title">Sobre o Cliente</h4>
							</div>
							
							<div class="modal-body">					
								<div class="form-group">
								<!-- <?php
									// foreach($clienteEmProducao as $cli){
									// 	echo "<label>Nome: $nomeCliente</label></br>";
									// 	echo "<label>Email: $emailCliente</label></br>";
									// 	echo "<label>Telefone: $celularCliente</label></br>";
									// }
								?>-->
								</div>
								<div class="form-group">
									<label>Cidade</label>
									<input type="city" class="form-control" value=<?php echo $cidadeEndereco ?> required disabled>
								</div>			
								<div class="form-group">
									<label>Rua</label>
									<input type="text" class="form-control"  value=<?php echo $logradouroEndereco ?> required disabled>
								</div>	
								<div class="form-group">
									<label>Número</label>
									<input type="text" class="form-control" value=<?php echo $numeroEndereco ?> required disabled>
								</div>	
								<div class="form-group">
									<label>Bairro</label>
									<input type="text" class="form-control" value=<?php echo $bairroEndereco ?> required disabled>
								</div>	

								<div class="modal-header">						
									<h4 class="modal-title">Sobre o Projeto</h4>
								</div></br>

								<div class="form-group">
									<label>Plano</label>
									<input type="plano" class="form-control" value=<?php echo $planoProjeto ?> required disabled>
								</div>
								<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" value=<?php echo $nomeProjeto ?> required disabled>
								</div>
								<div class="form-group">
									<label>Slogan</label>
									<input type="text" class="form-control" value=<?php echo $sloganLogo ?> required disabled>
								</div>
								<div class="form-group">
									<label>Descrição</label>
									<input type="text" class="form-control" value=<?php echo $descricaoLogo ?> required disabled>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--fim modal-->
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
