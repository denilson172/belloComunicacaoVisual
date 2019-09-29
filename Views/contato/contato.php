<?php
	require_once "../../Model/ClienteModel.php"
?>
	<!DOCTYPE html>
	<html lang="PT-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bello - Contato</title>
		<meta name="Bello Design" content="Site Bello Design - 2019" />
	<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="../Style/img/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="../Style/css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/animate.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/animsition/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/util.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/style-contact.css">
	<!--===============================================================================================-->
	<!--css pag02-->
	<link href="../Style/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../Style/css/animate.css">
	<link rel="stylesheet" href="../Style/css/animate.min.css">
	<link rel="stylesheet" href="../Style/css/overwrite.css">
	<link rel="stylesheet" href="../Style/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Style/css/jquery.bxslider.css">
	<link rel="stylesheet" type="../Style/text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="../Style/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="../Style/css/style-secundario.css" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Style/css/style-principal.css">
	<link rel="stylesheet" type="text/css" href="../Style/css/style-secundario.css" >
	<!--===============================================================================================-->

	</head>
	<body>
		<?php 
		$plano = $_REQUEST['plano'];
		?>

		<!--div class="preloader">
			<img src="../Style/img/loader.gif" alt="Preloader image">
		</div-->

		<div class="container-contact100">
			<div class="wrap-contact100">
				<form class="contact100-form validate-form" action="../../Controller/clienteController.php" method="POST">

					<span class="contact100-form-title">SEU PLANO É O <?php echo $plano ?></span> <!--variavel plano-->
						<img class ="img-mini" src="../Style/img/planos/<?php echo $plano?>-MINI.jpg" alt="PLANOS"></br>
					
					<span class="contact100-form-title margin-top padding-top">SOLICITE SEU ORÇAMENTO</span>

					<span class="contact100-form-text">SOBRE VOCÊ</span>

					<label class="label-input100" for="nome">Nome Completo *</label>
					<div class="wrap-input100 validate-input">
						<input id="first-name" class="input100" type="text" name="nome" placeholder="Ex. João">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="email">Email *</label>
					<div class="wrap-input100 validate-input">
						<input id="email" class="input100" type="text" name="email" placeholder="Ex. bello@email.com">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="phone">Telefone *</label>
					<div class="wrap-input100 validate-input">
						<input id="phone" class="input100" type="text" name="phone" placeholder="Ex. 00 0 00000000)">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="cidade">Endereço *</label>				
					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="text" name="cidade" placeholder="Cidade: ">
						<span class="focus-input100"></span>
					</div>				
					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="text" name="logradouro" placeholder="Rua:">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs1">
						<input class="input100" type="text" name="numero" placeholder="Número:">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs1">
						<input class="input100" type="text" name="bairro" placeholder="Bairro:">
						<span class="focus-input100"></span>
					</div>

					<!--=================================================================================-->
					<span class="contact100-form-text padding-top">SOBRE O PROJETO</span>

					<label class="label-input100" for="plano">Plano</label>
					<div class="wrap-input100 validate-input">
						<input id="first-name" class="input100" type="text" name="plano" value="<?php echo $plano?>" placeholder="<?php echo $plano?>" disabled>
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="cidade">Nome da Marca *</label>				
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nomeMarca" placeholder="Ex. Bello Comunicação Visual">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="cidade">Slogan da Marca</label>				
					<div class="wrap-input100">
						<input class="input100" type="text" name="sloganMarca" placeholder="Ex. Deixando sua vida mais Bella!">
						<span class="focus-input100"></span>
					</div>

					<label class="label-input100" for="descricaoMarca">Descrição *</label>
					<div class="wrap-input100 validate-input">
						<textarea id="message" class="input100" name="descricaoMarca" placeholder="Descreva seu projeto..."></textarea>
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-contact100-form-btn">

					<button class="contact100-form-btn-cancelar" onclick="javascript: location.href='../questionario/homeQuestionario.php';">
						<span>Cancelar</span>
					</button>
							
						</button>
						
						<input type="hidden" name="classe" value="Cliente"/>
						<input type="hidden" name="metodoInserir" value="inserir"/>
						<input type="hidden" name="planos" value="<?php echo $plano?>">
						<input type="hidden" name="status" value="1">
						
						
						<button class="contact100-form-btn" name="submit">
							<span>Enviar</span>
						</button>
					</div>
				</form>
			</div>
		</div>



	<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/animsition/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/bootstrap/popper.js"></script>
		<script src="../Style/js/vendor-contact/bootstrap/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/daterangepicker/moment.min.js"></script>
		<script src="../Style/js/vendor-contact/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="../Style/js/main-contact.js"></script>


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
