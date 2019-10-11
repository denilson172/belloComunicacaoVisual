
<?php
require_once __DIR__ ."/../DAO/dao.php";
require_once __DIR__ ."/../DAO/clienteDAO.php";
require_once __DIR__ ."/../Model/clienteModel.php";
require_once __DIR__ ."/../Model/enderecoModel.php";
require_once __DIR__ ."/../Model/logoModel.php";
require_once __DIR__ ."/../Model/projetoModel.php";

//ENDERECO, CLIENTE, LOGO - recebendo dados================================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classe= $_POST['classe']."Controller";
        $metodoInserir = $_POST['metodoInserir'];
        //ENDERECO - FORM
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        //CLIENTE - FORM
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['phone'];    
        //LOGO - FORM
        $nomeMarca = $_POST['nomeMarca']; //usado também como nomeProjeto
        $sloganMarca = $_POST['sloganMarca'];
        $descricaoMarca = $_POST['descricaoMarca'];
        //PROJETO - FORM
        $plano = $_POST['planos'];
        $status = $_POST['status'];
        $nomeProjeto = $_POST['nomeMarca'];
        
        $controller = new $classe();

        $controller->$metodoInserir(
            $logradouro,$numero,$bairro,$cidade,
            $nome,$email,$celular,
            $nomeMarca,$sloganMarca,$descricaoMarca,
            $plano,$status,$nomeProjeto
        );
    }
}else{
    $classeEndereco ="ClienteController";
    $metodoInserir ="inserir";
}

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class ClienteController {
    private $enderecoModel;
    private $clienteModel;
    private $logoModel;
    private $projetoModel;
    private $dao;

    public function __construct(){
        $this->enderecoModel = new EnderecoModel();
        $this->clienteModel = new ClienteModel();
        $this->logoModel = new LogoModel();
        $this->projetoModel = new ProjetoModel();
        $this->clienteDao = new ClienteDAO();
        $this->dao = new DAO();
    }

    public function inserir(
        $logradouro,$numero,$bairro,$cidade,
        $nome,$email,$celular,
        $nomeMarca,$sloganMarca,$descricaoMarca,
        $plano,$status,$nomeProjeto
        ){
        //ENDERECO - SET
        $this->enderecoModel->setLogradouroEndereco($logradouro);
        $this->enderecoModel->setNumeroEndereco($numero);
        $this->enderecoModel->setBairroEndereco($bairro);           
        $this->enderecoModel->setCidadeEndereco($cidade);
        //CLIENTE - SET
        $this->clienteModel->setNomeCliente($nome);
        $this->clienteModel->setEmailCliente($email);
        $this->clienteModel->setCelularCliente($celular);
        //LOGO - SET
        $this->logoModel->setNomeMarcaLogo($nomeMarca);
        $this->logoModel->setSloganMarcaLogo($sloganMarca); 
        $this->logoModel->setDescricaoMarcaLogo($descricaoMarca); 
        //PROJETO - SET
        $this->projetoModel->setPlanoProjeto($plano);
        $this->projetoModel->setStatusProjeto($status); 
        $this->projetoModel->setNomeProjeto($nomeProjeto);

        
        header('Location: http://localhost/ARQUIVOS/bellocv/index.php');
        return $this->dao->inserirDados(
            $this->enderecoModel,
            $this->clienteModel,
            $this->logoModel,
            $this->projetoModel
        );    
    }

    public function listarClientePendente(){
        $cli = $this->clienteDao->listarClientePendente();
        $_SESSION['clientePendente'] = $cli;
    }

    public function encontrarCliente($idc){
        $cli = $this->clienteDao->encontrarCliente($idc);
        $_SESSION['clientePendente'] = $cli;
    }
    public function encontrarEndereco($idc){
        $cli = $this->enderecoDao->encontrarEndereco($idc);
        $_SESSION['enderecoPendente'] = $cli;
    }

    
}//FIM cliente
$cliente_controller = new ClienteController();
$cliente_controller->listarClientePendente();




















		
        
?>