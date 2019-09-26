
<?php
require_once("../DAO/conexao.php");

require_once("../Model/clienteModel.php");
require_once("../DAO/clienteDao.php");

require_once("../Model/enderecoModel.php");
require_once("../DAO/enderecoDao.php");


    $nomeCliente = $_POST["nome"];
    $emailCliente = $_POST["email"];
    $celularCliente = $_POST["phone"]; 

	
class ClienteController{
    $cliente = new Cliente();
    $clienteDao = new ClienteDao();


    public function insere() {
     
        //$this->nomeCliente = $nomeCliente;

        var_dump($nomeCliente);
            /*$emailCliente = 
            $celularCliente =*/

        $conexao = new Database();
        

        $cliente->setNomeCliente($nomeCliente);
        $cliente->setEmailCliente($emailCliente);
        $cliente->setCelularCliente($celularCliente);

        
        $clienteDao->adiciona($conexao, $cliente);
    }

}

class EnderecoController {

    public function insere() {
            $logradouroEndereco = $_POST['logradouro'];
            $numeroEndereco = $_POST['numero'];
            $bairroEndereco = $_POST['bairro'];
            $cidadeEndereco = $_POST['cidade'];

            $conexao = new Database();
            $endereco = new Endereco();

            $endereco->setLogradouroEndereco($logradouro_endereco);
            $endereco->setNumeroEndereco($numero_endereco);
            $endereco->setBairroEndereco($bairro_endereco);
            $endereco->setCidadeEndereco($cidade_endereco);

            
            $enderecoDao = new EnderecoDao();
            $enderecoDao->adiciona($conexao, $endereco);
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