
<?php

/*require_once("./Model/Cliente.class.php");
require_once("./DAO/clienteDao.php");*/

require_once "../Model/enderecoModel.php";
require_once "../DAO/enderecoDao.php";


if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classe= $_POST['classe']."Controller";
        $metodo= $_POST['metodoEndereco'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        
        $controller = new $classe();

        $controller->$metodo($logradouro,$numero,$bairro,$cidade);
    }
}else{
    $classe ="EnderecoController";
    $metodo ="inserir";
}

class EnderecoController {
    private $enderecoModel;
    private $enderecoDao;

    public function __construct(){
        $this->enderecoModel = new EnderecoModel();
        $this->enderecoDao = new EnderecoDao();
    }

    public function inserir($logradouro,$numero,$bairro,$cidade) {
           // $this->enderecoModel->setIdEndereco($id);
            $this->enderecoModel->setLogradouroEndereco($logradouro);
            $this->enderecoModel->setNumeroEndereco($numero);
            $this->enderecoModel->setBairroEndereco($bairro);
            $this->enderecoModel->setCidadeEndereco($cidade);

            return $this->enderecoDao->inserirEndereco($this->enderecoModel);

           // header('Location: http://localhost/ARQUIVOS/bellocv/index.php');
    }
}

/*class ClienteController{
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

}*/




















		
        
?>