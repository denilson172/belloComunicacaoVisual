
<?php

require_once("../Model/clienteModel.php");
require_once("../DAO/clienteDao.php");

require_once "../Model/enderecoModel.php";
require_once "../DAO/enderecoDao.php";


//recebendo o endereço=============================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classeEndereco= $_POST['classeEndereco']."Controller";
        $metodoInserir = $_POST['metodoInserir'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        
        $controller = new $classeEndereco();

        $controller->$metodoInserir($logradouro,$numero,$bairro,$cidade);
    }
}else{
    $classeEndereco ="EnderecoController";
    $metodoInserir ="inserir";
}

//enviando para Model e DAO====================================================================================
class EnderecoController {
    private $enderecoModel;
    private $enderecoDao;

    public function __construct(){
        $this->enderecoModel = new EnderecoModel();
        $this->enderecoDao = new EnderecoDao();
    }

    public function inserir($logradouro,$numero,$bairro,$cidade) {
            $this->enderecoModel->setLogradouroEndereco($logradouro);
            $this->enderecoModel->setNumeroEndereco($numero);
            $this->enderecoModel->setBairroEndereco($bairro);
            $this->enderecoModel->setCidadeEndereco($cidade);

            return $this->enderecoDao->inserirEndereco($this->enderecoModel);

           // header('Location: http://localhost/ARQUIVOS/bellocv/index.php');
    }
}

//recebendo o cliente===============================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classeCliente= $_POST['classeCliente']."Controller";
        $metodoInserir = $_POST['metodoInserir'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['phone'];
        
        $controller = new $classeCliente();

        $controller->$metodoInserir($nome,$email,$celular);
    }
}else{
    $classeCliente ="ClienteController";
    $metodoInserir ="inserir";
}
//enviando para Model e DAO====================================================================================
class ClienteController {
    private $clienteModel;
    private $clienteDAO;

    public function __construct(){
        $this->clienteModel = new ClienteModel();
        $this->clienteDao = new ClienteDao();
    }

    public function inserir($nome,$email,$celular) { 
        $this->clienteModel->setNomeCliente($nome);
        $this->clienteModel->setEmailCliente($email);
        $this->clienteModel->setCelularCliente($celular); 
    
        return $this->clienteDao->inserirCliente($this->clienteModel);

        //header('Location: http://localhost/ARQUIVOS/bellocv/Views/index.php');
           
        
    }

}




















		
        
?>