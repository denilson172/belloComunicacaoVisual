
<?php
require_once("../DAO/dao.php");
require_once("../Model/clienteModel.php");
require_once "../Model/enderecoModel.php";

require_once "../Model/logoModel.php";
require_once "../DAO/logoDao.php";

//ENDERECO - recebendo dados================================================================================
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
        
        $controller = new $classe();

        $controller->$metodoInserir($logradouro,$numero,$bairro,$cidade,$nome,$email,$celular);
    }
}else{
    $classeEndereco ="ClienteController";
    $metodoInserir ="inserir";
}

//ENDERECO - enviando para Model e DAO ================================================================================
class ClienteController {
    private $enderecoModel;
    private $clienteModel;
    private $dao;

    public function __construct(){
        $this->enderecoModel = new EnderecoModel();
        $this->clienteModel = new ClienteModel();
        $this->dao = new DAO();
    }

    public function inserir($logradouro,$numero,$bairro,$cidade,$nome,$email,$celular) {
        //ENDERECO - SET
      //  $this->enderecoModel->setIdEndereco($idEndereco);
        $this->enderecoModel->setLogradouroEndereco($logradouro);
        $this->enderecoModel->setNumeroEndereco($numero);
        $this->enderecoModel->setBairroEndereco($bairro);           
        $this->enderecoModel->setCidadeEndereco($cidade);
        //CLIENTE - SET
        $this->clienteModel->setNomeCliente($nome);
        $this->clienteModel->setEmailCliente($email);
        $this->clienteModel->setCelularCliente($celular);

        return $this->dao->inserirDados($this->enderecoModel, $this->clienteModel);

           // header('Location: http://localhost/ARQUIVOS/bellocv/index.php');
    }
}//FIM cliente


    //INICIO LOGO==================================================================================
    //recebendo dados
    if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if(isset($_POST['submit'])){
            $classeLogo= $_POST['classeLogo']."Controller";
            $metodoInserir = $_POST['metodoInserir'];
            $nomeMarca = $_POST['nomeMarca'];
            $sloganMarca = $_POST['sloganMarca'];
            $descricaoMarca = $_POST['descricaoMarca'];

            
            $controller = new $classeLogo();

            $controller->$metodoInserir($nomeMarca,$sloganMarca,$descricaoMarca);
        }
    }else{
        $classeLogo ="LogoController";
        $metodoInserir ="inserir";
    }

    //enviando para Model e DAO====================================================================================
    class LogoController {
        private $logoModel;
        private $logoDAO;

        public function __construct(){
            $this->logoModel = new LogoModel();
            $this->logoDao = new LogoDao();
        }

        public function inserir($nomeMarca,$sloganMarca,$descricaoMarca) { 
            $this->logoModel->setNomeMarcaLogo($nomeMarca);
            $this->logoModel->setSloganMarcaLogo($sloganMarca); 
            $this->logoModel->setDescricaoMarcaLogo($descricaoMarca); 
        
            return $this->logoDao->inserirLogo($this->logoModel);

            //header('Location: http://localhost/ARQUIVOS/bellocv/Views/index.php');
        }//FIM LOGO


    //INICIO PROJETO==================================================================================
//recebendo dados - POR TERMINAR
   /* if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if(isset($_POST['submit'])){
            $classeCliente= $_POST['classeProjeto']."Controller";
            $metodoInserir = $_POST['metodoInserir'];
            $plano = $_POST['plano'];
            $nomeMarca = $_POST['nomeMarca'];
            $sloganMarca = $_POST['sloganMarca'];
            $descricaoMarca = $_POST['descricaoMarca'];

            
            $controller = new $classeProjeto();

            $controller->$metodoInserir($plano,$nomeMarca,$sloganMarca,$descricaoMarca);
        }
    }else{
        $classeCliente ="ProjetoController";
        $metodoInserir ="inserir";
    }

    //enviando para Model e DAO====================================================================================
    class ProjetoController {
        private $projetoModel;
        private $projetoDAO;

        public function __construct(){
            $this->projetoModel = new ProjetoModel();
            $this->projetoDao = new ProjetoDao();
        }

        public function inserir($plano,$nomeMarca,$sloganMarca,$descricaoMarca) { 
            $this->projetoModel->setPlanoProjeto($plano);
            $this->projetoModel->setNomeMarcaProjeto($nomeMarca);
            $this->projetoModel->setSloganMarcaProjeto($sloganMarca); 
            $this->projetoModel->setSloganDescricaoProjeto($descricaoMarca); 
        
            return $this->projetoDao->inserirProjeto($this->projetoModel);

            //header('Location: http://localhost/ARQUIVOS/bellocv/Views/index.php');
        }//FIM PROJETO
*/
}




















		
        
?>