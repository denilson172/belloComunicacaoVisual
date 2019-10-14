
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
        $_SESSION['projetoPendente'] = $cli;
    }

    public function listarProjetoEmProducao(){
        $cli = $this->projetoDao->listarProjetoEmProducao();
        $_SESSION['projetoEmProducao'] = $cli;
    }

    public function listarProjetoFinalizado(){
        $cli = $this->projetoDao->listarProjetoFinalizado();
        $_SESSION['projetoFinalizado'] = $cli;
    }

    public function encontrarProjeto($idp){
        $cli = $this->projetoDao->encontrarProjeto($idp);
        $_SESSION['projetoPendente'] = $cli;
    }

    public function alterarStatusProjeto($idp, $status){
        $cli = $this->projetoDao->alterarStatusEmProducao($idp,$status);
        $_SESSION['projetoEmProducao'] = $cli;
    }


}//FIM cliente

$projeto_controller = new ProjetoController();
$projeto_controller->listarProjetoPendente();
$projeto_controller->listarProjetoEmProducao();
$projeto_controller->listarProjetoFinalizado();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"





















		
        
?>