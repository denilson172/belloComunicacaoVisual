
<?php
require_once __DIR__ . "/../DAO/projetoDAO.php";
require_once __DIR__ . "/../Model/projetoModel.php";

if(!empty($_GET['status'])){
    $projeto_controller = new ProjetoController();
    $projeto_controller->alterarStatusProjeto($_GET['projeto'], $_GET['status']);
    echo '<meta http-equiv="refresh" content="0.1;URL=../Views/adm/projetos/projetos.php" />';
}
elseif(!empty($_GET['delete'])){
    $projeto_controller = new ProjetoController();
    $projeto_controller->deletarProjeto($_GET['projeto'], $_GET['cliente'], $_GET['logo']);
    echo '<meta http-equiv="refresh" content="0.1;URL=../Views/adm/projetos/projetos.php" />';
}

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
        $cli = $this->projetoDao->alterarStatusProjeto($idp,$status);
        if($status == 1){
            $_SESSION['projetoPendente'] = $cli;
        }
        elseif($status == 2){
            $_SESSION['projetoEmProducao'] = $cli;
        }
        elseif($status == 3){
            $_SESSION['projetoFinalizado'] = $cli;
        }
    }
    public function deletarProjeto($idProjeto, $fkCliente, $fklogo){
        $cli = $this->projetoDao->deletarProjeto($idProjeto, $fkCliente, $fklogo);
        
    }

}//FIM cliente





















		
        
?>