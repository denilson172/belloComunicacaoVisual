
<?php
require_once __DIR__ . "/../DAO/projetoDAO.php";
require_once __DIR__ . "/../Model/projetoModel.php";
        
   

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class ProjetoController {
    private $projetoModel;
    private $dao;

    public function __construct(){
        $this->projetoModel = new ProjetoModel();
        $this->projetoDao = new ProjetoDAO();
    }

    public function listarProjetoPendente(){
        $cli = $this->projetoDao->listarProjetoPendente();
        $_SESSION['projeto'] = $cli;

        

        // header('Location:  "__DIR__ ./../../Views/adm/projetos/projetos.php"');
    }
}//FIM cliente

$projeto_controller = new ProjetoController();
$projeto_controller->listarProjetoPendente();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"
//echo '<meta http-equiv="refresh" content="2;URL=../Views/adm/projetos/projetos.php" />';




















		
        
?>