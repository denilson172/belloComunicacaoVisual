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
	$projeto_controller->encontrarProjeto($_GET['projeto']);

	$cliente_controller = new ClienteController();
	$cliente_controller->encontrarCliente($_GET['cliente']);

	$logo_controller = new LogoController();
	$logo_controller->encontrarLogo($_GET['logo']);

	$endereco_controller = new EnderecoController();
	$endereco_controller->encontrarEndereco($_GET['cliente']);

	if(empty($_SESSION['projetoPendente'])){
		echo "erro";
	}else{
		$projetoPendente = $_SESSION['projetoPendente'];
		$logo = $_SESSION['logoPendente'];
		$endereco = $_SESSION['enderecoPendente'];
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
	<body class="blue-bg">
		<!-- Menu horizontal -->
		<div class="collapse navbar-collapse white-bg" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right main-nav">
				<li class="">
				<a href="javascript:void()" onclick="window.close()"><i class="icon-hover red fas fa-close fa-2x" title="Fechar aba"></a></i>
				</li>
			</ul>
		</div><!--fim nav-->
		
		<div id='detalhes$idProjeto'>
		<!--========inicio detalhes=====================================================-->
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

			endforeach;
					
				echo '<div class="container">';
					echo '<div class="table-wrapper">';
						echo '<div class="table-title">';
							echo '<div class="row">';
								echo '<div class="col-sm-6">';
								echo '<h2><b class="black">Detalhes | Cód: '.$idProjeto.'</b></h2>';
								echo '</div>';

							echo '<div class="col-sm-6">';
							echo '<input class="btn btn-success" type="button" value="Imprimir" onClick="window.print()"></input>';
							//echo '<a onClick="window.print()><i class="material-icons">&#xE147;</i> <span>Imprimir</span></a>';
							echo '</div>';

						echo '</div>';
					echo '</div>';
					echo '<table class="table table-striped table-hover">';
						echo "<p><label class='margin-top'>SOBRE O PROJETO</label></p> ";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Marca:</label> $nomeProjeto";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Plano:</label> $planoProjeto";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Slogan:</label> $sloganLogo";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Descrição:</label> $descricaoLogo";
						echo '<div class="border-top-two-black"></div>';

						echo "<p><label class='margin-top-50'>SOBRE O CLIENTE</label></p> ";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Nome:</label> $nomeCliente";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Email:</label> $emailCliente";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Celular:</label> $celularCliente";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Logradouro:</label> $logradouroEndereco";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Número:</label> $numeroEndereco";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Bairro:</label> $bairroEndereco";
						echo '<div class="border-top-two-black"></div>';
						echo "<label class='margin-top-5px'>Cidade:</label> $cidadeEndereco";
					echo '</table>';
				echo '</div>';
			echo '</div>';
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
