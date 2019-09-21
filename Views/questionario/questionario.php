<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bello - Questionário</title>
	<meta name="Bello Design" content="Site Bello Design - 2019" />
	
	<link rel="apple-touch-icon" sizes="57x57" href="../Style/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../Style/img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="../Style/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="../Style/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="../Style/img/favicons/manifest.json">
	<link rel="shortcut icon" href="../Style/img/favicons/favicon.png">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="../Style/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
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
	<!--css home-->
		<link rel="stylesheet" type="text/css" href="../Style/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/owl.css">
		<link rel="stylesheet" type="text/css" href="../Style/css/animate.css">
		<link rel="stylesheet" type="text/css" href="../Style/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../Style/fonts/eleganticons/et-icons.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../Style/css/style-principal.css">
	<!--===============================================================================================-->

	</head>
	<body>

		<!--div class="preloader">
			<img src="../Style/img/loader.gif" alt="Preloader image">
		</div-->

		<!-- Menu horizontal -->
		<div class="collapse navbar-collapse white-bg" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left main-nav">
				<li class="green">
					<a href="../../index.php"><i class="green fa fa-home fa-2x"></a></i>
				</li>
			</ul>
		</div><!--fim nav-->

		<form action="../../Controller/clienteController.php" method="POST" class="popup-form h3">

		<h4 class="contact100-form-title">Só precisamos de um pouquinho do seu tempo, é rápido...</h4>

		<div class="border-top-two padding-top-20"></div>

			<!--===pergunta 01==================================================================-->
			<h4 class="contact100-form-text">QUESTÃO 01: Como você descreveria a sua empresa e/ou produtos?</h4>
			<div class="radiobox validate-input">

				<input class="radiobox" type="radio" required="required" value="1" name="q1" id="q1.1"/>
				<label class="label-input100 input100 " for="q1.1"><img src="../Style/img/questionario/icon-home.png"class="img-miniatura-form"> Negócio local ou lugar;</label>

				<input type="radio" required="required" value="2" name="q1" id="q1.2"/>
				<label class="label-input100 input100" for="q1.2"><img src="../Style/img/questionario/icon-building.png"class="img-miniatura-form"> Empresa, organização ou instituição;</label>

				<input type="radio" required="required" value="3" name="q1" id="q1.3"/>
				<label class="label-input100 input100"for="q1.3"><img src="../Style/img/questionario/icon-product.png"class="img-miniatura-form"> Marca ou produto;</label>

				<input type="radio" required="required" value="3" name="q1" id="q1.4"/>
				<label class="label-input100 input100"for="q1.4"><img src="../Style/img/questionario/icon-star.png"class="img-miniatura-form"> Artista, banda ou figura pública;</label>

				<input type="radio" required="required" value="3" name="q1" id="q1.5"/>
				<label class="label-input100 input100"for="q1.5"><img src="../Style/img/questionario/icon-tv.png"class="img-miniatura-form"> Entretenimento;</label>

				<input type="radio" required="required" value="3" name="q1" id="q1.6"/>
				<label class="label-input100 input100"for="q1.6"><img src="../Style/img/questionario/icon-flag.png"class="img-miniatura-form"> Causa ou Comunidade;</label>

				<input type="radio" required="required" value="3" name="q1" id="q1.7"/>
				<label class="label-input100 input100"for="q1.7"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não sei.</label>
			</div><!--fim pergunta 01-->

			<div class="border-top-two margin-top-20"></div>

			<h4 class="contact100-form-text margin-top-20">QUESTÃO 02: Qual a categoria do seu negócio?</h4>
			<div class="radiobox validate-input">
				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.1"/>
				<label class="label-input100 input100" for="q2.1"><img src="../Style/img/questionario/icon-tire.png"class="img-miniatura-form"> Automotivo;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q2" id="q2.2"/>
				<label class="label-input100 input100" for="q2.2"><img src="../Style/img/questionario/icon-home.png"class="img-miniatura-form"> Casa e Decoração;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.3"/>
				<label class="label-input100 input100" for="q2.3"><img src="../Style/img/questionario/icon-energy.png"class="img-miniatura-form"> Energia;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.4"/>
				<label class="label-input100 input100" for="q2.4"><img src="../Style/img/questionario/icon-recycle.png"class="img-miniatura-form"> Meio Ambiente;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.5"/>
				<label class="label-input100 input100" for="q2.5"><img src="../Style/img/questionario/icon-fashion.png"class="img-miniatura-form"> Moda;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.6"/>
				<label class="label-input100 input100" for="q2.6"><img src="../Style/img/questionario/icon-game.png"class="img-miniatura-form"> Tecnologia;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.7"/>
				<label class="label-input100 input100" for="q2.7"><img src="../Style/img/questionario/icon-dinner.png"class="img-miniatura-form"> Gastronomia;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q2" id="q2.8"/>
				<label class="label-input100 input100" for="q2.8"><img src="../Style/img/questionario/icon-money.png"class="img-miniatura-form"> Finanças;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q2" id="q2.9"/>
				<label class="label-input100 input100" for="q2.9"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não Sei.</label>
			</div><!--fim pergunta 02-->

			<!--===pergunta 03-->
			<div class="border-top-two margin-top-20"></div>

			<h4 class="contact100-form-text margin-top-20">QUESTÃO 03: Porque você quer um novo projeto de logo?</h4>
			<div class="radiobox validate-input">
				<input class="radiobox" type="radio" required="required" value="2" name="q3" id="q3.1"/>
				<label class="label-input100 input100" for="q3.1"><img src="../Style/img/questionario/icon-need.png"class="img-miniatura-form"> Necessidade de uma identidade visual;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q3" id="q3.2"/>
				<label class="label-input100 input100" for="q3.2"><img src="../Style/img/questionario/icon-relationship.png"class="img-miniatura-form"> Status para melhor relação com os clientes;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q3" id="q3.3"/>
				<label class="label-input100 input100" for="q3.3"><img src="../Style/img/questionario/icon-change.png"class="img-miniatura-form"> Preciso mudar uma que já tenho;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q3" id="q3.4"/>
				<label class="label-input100 input100" for="q3.4"><img src="../Style/img/questionario/icon-list.png"class="img-miniatura-form"> Outros;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q3" id="q3.5"/>
				<label class="label-input100 input100" for="q3.5"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não Sei.</label>
			</div><!--fim pergunta 03-->

			<div class="border-top-two margin-top-20"></div>

			<!--===pergunta 04-->
			<h4 class="contact100-form-text margin-top-20">QUESTÃO 04: Qual destes design melhor representa sua empresa e/ou negócio?</h4>
			<div class="radiobox validate-input">
				<input class="radiobox" type="radio" required="required" value="2" name="q4" id="q4.1"/>
				<label class="label-input100 input100" for="q4.1"><img src="../Style/img/questionario/q4-1.jpg"class="img-form"> Ana Bárbara Makeup™</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q4" id="q4.2"/>
				<label class="label-input100 input100" for="q4.2"><img src="../Style/img/questionario/q4-2.jpg"class="img-form"> Loja Exclusiva™</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q4" id="q4.3"/>
				<label class="label-input100 input100" for="q4.3"><img src="../Style/img/questionario/q4-3.jpg"class="img-form"> SH Consultoria Ambiental™</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q4" id="q4.4"/>
				<label class="label-input100 input100" for="q4.4"><img src="../Style/img/questionario/q4-4.jpg"class="img-form"> Luésia Medeiros Fotografias™</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q4" id="q4.5"/>
				<label class="label-input100 input100" for="q4.5"><img src="../Style/img/questionario/q4-5.jpg"class="img-form"> AZ Presentes™</label>
				
				<input class="radiobox" type="radio" required="required" value="3" name="q4" id="q4.6"/>
				<label class="label-input100 input100" for="q4.6"><img src="../Style/img/questionario/q4-6.jpg"class="img-form"> NN Flower Boutique™</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q4" id="q4.7"/>
				<label class="label-input100 input100" for="q4.7"><img src="../Style/img/questionario/icon-none.png"class="img-miniatura-form"> Nenhuma Alternativa</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q4" id="q4.8"/>
				<label class="label-input100 input100" for="q4.8"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não sei.</label>
			</div><!--fim pergunta 04-->

			<div class="border-top-two margin-top-20"></div>

			<!--===pergunta 05-->
			<h4 class="contact100-form-text margin-top-20">QUESTÃO 05: Qual destas cores melhor representa sua empresa e/ou negócio?</h4>
			<div class="radiobox validate-input">
				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.1"/>
				<label class="label-input100 input" for="q5.1"><img src="../Style/img/questionario/icon-cor1.jpg"class="img-miniatura-form"> Verde;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q5" id="q5.2"/>
				<label class="label-input100 input" for="q5.2"><img src="../Style/img/questionario/icon-cor2.jpg"class="img-miniatura-form"> Amarelo-esverdeado;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.3"/>
				<label class="label-input100 input" for="q5.3"><img src="../Style/img/questionario/icon-cor3.jpg"class="img-miniatura-form"> Amarelo;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q5" id="q5.4"/>
				<label class="label-input100 input" for="q5.4"><img src="../Style/img/questionario/icon-cor4.jpg"class="img-miniatura-form"> Amarelo-alaranjado;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.5"/>
				<label class="label-input100 input" for="q5.5"><img src="../Style/img/questionario/icon-cor5.jpg"class="img-miniatura-form"> Laranja;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q5" id="q5.6"/>
				<label class="label-input100 input" for="q5.6"><img src="../Style/img/questionario/icon-cor6.jpg"class="img-miniatura-form"> Vermelho-alaranjado;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.7"/>
				<label class="label-input100 input" for="q5.7"><img src="../Style/img/questionario/icon-cor7.jpg"class="img-miniatura-form"> Vermelho;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q5" id="q5.8"/>
				<label class="label-input100 input" for="q5.8"><img src="../Style/img/questionario/icon-cor8.jpg"class="img-miniatura-form"> Vermelho-arroxeado;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.9"/>
				<label class="label-input100 input" for="q5.9"><img src="../Style/img/questionario/icon-cor9.jpg"class="img-miniatura-form"> Violeta;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q5" id="q5.10"/>
				<label class="label-input100 input" for="q5.10"><img src="../Style/img/questionario/icon-cor10.jpg"class="img-miniatura-form"> Azul-arroxeado;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.11"/>
				<label class="label-input100 input" for="q5.11"><img src="../Style/img/questionario/icon-cor11.jpg"class="img-miniatura-form"> Azul;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q5" id="q5.12"/>
				<label class="label-input100 input" for="q5.12"><img src="../Style/img/questionario/icon-cor12.jpg"class="img-miniatura-form"> Azul-esverdeado;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.13"/>
				<label class="label-input100 input" for="q5.13"><img src="../Style/img/questionario/icon-cor13.jpg"class="img-miniatura-form"> Preto;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q5" id="q5.14"/>
				<label class="label-input100 input" for="q5.14"><img src="../Style/img/questionario/icon-cor14.jpg"class="img-miniatura-form"> Branco;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q5" id="q5.15"/>
				<label class="label-input100 input" for="q5.15"><img src="../Style/img/questionario/icon-list.png"class="img-miniatura-form"> Mais de Uma Alternativa;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q5" id="q5.16"/>
				<label class="label-input100 input" for="q5.16"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não Sei.</label>
			</div><!--fim pergunta 05-->

			<div class="border-top-two margin-top-20"></div>

			<!--===pergunta 06-->
			<h4 class="contact100-form-text margin-top-20">QUESTÃO 06: Qual destes estilos mais combina com sua empresa e/ou negócio?</h4>
			<div class="radiobox validate-input">
				<input class="radiobox" type="radio" required="required" value="1" name="q6" id="q6.1"/>
				<label class="label-input100 input" for="q6.1"><img src="../Style/img/questionario/q6-1.jpg"class="img-form"> Simples;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q6" id="q6.2"/>
				<label class="label-input100 input" for="q6.2"><img src="../Style/img/questionario/q6-2.jpg"class="img-form"> Memorável;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q6" id="q6.3"/>
				<label class="label-input100 input" for="q6.3"><img src="../Style/img/questionario/q6-3.jpg"class="img-form"> Duradoura;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q6" id="q6.4"/>
				<label class="label-input100 input" for="q6.4"><img src="../Style/img/questionario/q6-4.jpg"class="img-form"> Adaptavél;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q6" id="q6.5"/>
				<label class="label-input100 input" for="q6.5"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não sei.</label>
			</div><!--fim pergunta 06-->

			<div class="border-top-two margin-top-20"></div>

			<!--===pergunta 07-->
			<h4 class="contact100-form-text margin-top-20">QUESTÃO 07: Que ideia ou mensagem você gostaria de passar com o seu logo?</h4>
			<div class="radiobox validate-input">
				<input class="radiobox" type="radio" required="required" value="2" name="q7" id="q7.1"/>
				<label class="label-input100 input" for="q7.1"><img src="../Style/img/questionario/q7-1.jpg"class="img-form"> Retrô/Vintage;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q7" id="q7.2"/>
				<label class="label-input100 input" for="q7.2"><img src="../Style/img/questionario/q7-2.jpg"class="img-form"> Moderna;</label>

				<input class="radiobox" type="radio" required="required" value="1" name="q7" id="q7.3"/>
				<label class="label-input100 input" for="q7.3"><img src="../Style/img/questionario/q7-3.jpg"class="img-form"> Comum;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q7" id="q7.4"/>
				<label class="label-input100 input" for="q7.4"><img src="../Style/img/questionario/q7-4.jpg"class="img-form"> Sofisticada;</label>

				<input class="radiobox" type="radio" required="required" value="2" name="q7" id="q7.5"/>
				<label class="label-input100 input" for="q7.5"><img src="../Style/img/questionario/q7-5.jpg"class="img-form"> Formal;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q7" id="q7.6"/>
				<label class="label-input100 input" for="q7.6"><img src="../Style/img/questionario/icon-list.png"class="img-miniatura-form"> Mais de Uma Alternativa;</label>

				<input class="radiobox" type="radio" required="required" value="3" name="q7" id="q7.7"/>
				<label class="label-input100 input" for="q7.7"><img src="../Style/img/questionario/icon-interrogation.png"class="img-miniatura-form"> Não Sei.</label>
			</div><!--fim pergunta 07-->

			<div class="border-top-two margin-top-20"></div>

			<div class="container-contact100-form-btn">
				<button class="contact100-form-btn margin-top-20" type="submit" name="submit"><span>GERAR PLANO</span></button>
			</div>

		</form>



		<!--===============================================================================================-->
		<script src="../Style/js/vendor-contact/jquery/jquery-3.2.1.min.js"></script>
		<script src="../Style/js/vendor-contact/animsition/animsition.min.js"></script>
		<script src="../Style/js/vendor-contact/bootstrap/popper.js"></script>
		<script src="../Style/js/vendor-contact/bootstrap/bootstrap.min.js"></script>
		<script src="../Style/js/vendor-contact/select2/select2.min.js"></script>
		<script src="../Style/js/vendor-contact/daterangepicker/moment.min.js"></script>
		<script src="../Style/js/vendor-contact/daterangepicker/daterangepicker.js"></script>
		<script src="../Style/js/vendor-contact/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="../Style/js/main-contact.js"></script>

		<!--===============================================================================================-->	
		<!-- Scripts home -->
		<script src="../Style/js/jquery-1.11.1.min.js"></script>
		<script src="../Style/js/owl.carousel.min.js"></script>
		<script src="../Style/js/bootstrap.min.js"></script>
		<script src="../Style/js/wow.min.js"></script>
		<script src="../Style/js/typewriter.js"></script>
		<script src="../Style/js/jquery.onepagenav.js"></script>
		<script src="../Style/js/main.js"></script>
		<!--===============================================================================================-->


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
