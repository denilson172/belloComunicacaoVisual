
<?php

/*require_once("../Model/Cliente.class.php");
require_once("../DAO/clienteDao.php");*/

require_once("Model/EnderecoModel.php");
require_once("DAO/enderecoDao.php");

class EnderecoController {
    private $endereco;
    private $enderecoDao;

    public function __construct(){
        $this->endereco = new Endereco();
        $this->endereco = new EnderecoDao();
    }

    public function inserir() {
           echo  $this->endereco->setLogradouroEndereco ($_POST['logradouro']);
            $this->endereco->setNumeroEndereco ($_POST['numero']);
            $this->endereco->setBairroEndereco ($_POST['bairro']);
            $this->endereco->setCidadeEndereco ($_POST['cidade']);

            $this->enderecoDao->inserirEndereco($this->endereco);

            
    }

}

class ClienteController{
    private $cliente;
    private $clienteDAO;

    public function __construct(){
        $this->cliente = new Cliente();
        $this->clienteDao = new ClienteDao();
       // $this->conexao = new Database();
    }

    public function inserir() { 
        $this->cliente->setNomeCliente($_POST["nome"]);
        $this->cliente->setEmailCliente($_POST["email"]);
        $this->cliente->setCelularCliente($_POST["phone"]); 
    
        $this->clienteDao->inserirCliente($this->cliente);

        header('Location: http://localhost/ARQUIVOS/bellocv/Views/index.php');
           
        
    }

}




















		
        
?>