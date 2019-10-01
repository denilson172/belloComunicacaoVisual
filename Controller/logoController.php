
<?php
require_once __DIR__ . "/../DAO/dao.php";
require_once __DIR__ . "/../Model/logoModel.php";
        
   

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class LogoController {
    private $logoModel;
    private $dao;

    public function __construct(){
        $this->logoModel = new LogoModel();
        $this->logoDao = new LogoDAO();
    }

    public function listarLogo(){
        $cli = $this->logoDao->listarLogo();
        $_SESSION['logo'] = $cli;

        

         //header('Location: http://localhost/ARQUIVOS/bellocv/Views/adm/projetos/projetos.php');
    }
}//FIM cliente

$logo_controller = new LogoController();
$logo_controller->listarLogo();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"




















		
        
?>