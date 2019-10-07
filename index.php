<?php

	/*include "Controller/clienteController.php";	

    if(isset($_GET['classe']) && isset($_GET['metodo'])){
		$classe = $_GET['classe'].'Controller';
		$metodo = $_GET['metodo'];
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
		else if(isset($_GET['logradouro'])){
			$logradouro = $_GET['logradouro'];
		}
		else if(isset($_GET['numero'])){
			$numero = $_GET['numero'];
		}
		else if(isset($_GET['bairro'])){
			$bairro = $_GET['bairro'];
		}
		else if(isset($_GET['cidade'])){
			$cidade = $_GET['cidade'];
		}
		
	}


	else if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$classe= $_POST['classe'].'Controller';
		$metodo= $_POST['metodo'];

		if (isset($_POST["submit"])){
			$id = $_POST['id'];
			$logradouro = $_POST['logradouro'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
		}
	}
	else{
		$classe ="enderecoController";
		$metodo ="inserir";
	}

	$controller = new $classe();

	/*if(!$id){
		$controller->$metodo();
	}	
	else  {
		$controller->$metodo($id);
	}*/

	header('Location: http://localhost/xampp-arquivos/bellocv/Views/index.php');


?>