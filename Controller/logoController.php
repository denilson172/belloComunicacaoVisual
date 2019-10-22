
<?php
require_once __DIR__ . "/../DAO/logoDAO.php";
require_once __DIR__ . "/../Model/logoModel.php";
        
   

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class LogoController {
    private $logoModel;
    private $dao;

    public function __construct(){
        $this->logoModel = new LogoModel();
        $this->logoDao = new LogoDAO();
    }

    public function listarLogoPendente(){
        $cli = $this->logoDao->listarLogoPendente();
        $_SESSION['logoPendente'] = $cli;
    }
    
    public function encontrarLogo($idl){
        $cli = $this->logoDao->encontrarLogo($idl);
        $_SESSION['logoPendente'] = $cli;
    }

}//FIM cliente

$logo_controller = new LogoController();
$logo_controller->listarLogoPendente();




















		
        
?>