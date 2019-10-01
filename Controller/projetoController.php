
<?php
require_once __DIR__ . "/../DAO/dao.php";
require_once __DIR__ . "/../Model/projetoModel.php";
        
   

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class ProjetoController {
    private $projetoModel;
    private $dao;

    public function __construct(){
        $this->projetoModel = new ProjetoModel();
        $this->projetoDao = new ProjetoDAO();
    }

    public function listarProjeto(){
        $cli = $this->projetoDao->listarProjeto();
        $_SESSION['projeto'] = $cli;

        

         //header('Location: http://localhost/ARQUIVOS/bellocv/Views/adm/projetos/projetos.php');
    }
}//FIM cliente

$projeto_controller = new ProjetoController();
$projeto_controller->listarProjeto();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"




















		
        
?>