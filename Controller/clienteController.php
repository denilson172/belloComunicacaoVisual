<?php
require_Once("../model/clienteModel.php");
require_Once("../DAO/clienteDao.php");
		
class ClienteController {

    public function insere() {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['phone'];
        $conexao = new Database();
        $cliente = new cliente();
        $cliente->setNome($nome);
        $cliente->setDescricao($email);
        $cliente->setDescricao($telefone);
        $clienteDao = new ClienteDao();
        $clienteDao->adiciona($conexao, $cliente);
    }

}


















		//Dados cliente
        //if (isset($_POST["submit"])){
        	//$qu1 = $_POST["nome"];
           // $qu2 = $_POST["cpf"];
            //$qu3 = $_POST["email"];
           // $qu4 = $_POST["phone"];
           // $qu5 = $_POST["cidade"];
            //$qu6 = $_POST["logradouro"];
            //$qu7 = $_POST["numero"];
            //$qu8 = $_POST["bairro"];
        //}
        
        //$inf  = array ($qu1, $qu2, $qu3, $qu4, $qu5, $qu6, $qu7,$qu8);
        //var_dump($inf);

        
        //Dados Projeto

        //if (isset($_POST["submit"])){
        	//$que1 = $_POST["plano"];
            //$que2 = $_POST["nomeMarca"];
            //$que3 = $_POST["sloganMarca"];
            //$que4 = $_POST["descricaoMarca"];
            //var_dump($que1);
       // }
        
        //$info  = array ($que2, $que3, $que4);
        //var_dump($info);
        
?>