
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
        $_SESSION['logo'] = $cli;

        

         //header('Location: http://localhost/ARQUIVOS/bellocv/Views/adm/projetos/projetos.php');
    }
}//FIM cliente

$logo_controller = new LogoController();
$logo_controller->listarLogoPendente();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"




















		
        
?>