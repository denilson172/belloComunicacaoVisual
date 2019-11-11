
<?php
require_once __DIR__ . "/../DAO/projetoDAO.php";
require_once __DIR__ . "/../Model/projetoModel.php";

if(!empty($_GET['status'])){
    $projeto_controller = new ProjetoController();
    $projeto_controller->alterarStatusProjeto($_GET['projeto'], $_GET['status']);
    if( $_GET['status'] == 2){
        echo '<meta http-equiv="refresh" content="0.1;URL=../Views/adm/projetos/projetos.php?tipo=producao" />';
    }elseif( $_GET['status'] == 1){
        echo '<meta http-equiv="refresh" content="0.1;URL=../Views/adm/projetos/projetos.php?tipo=pendente" />';
    }if( $_GET['status'] == 3){
        echo '<meta http-equiv="refresh" content="0.1;URL=../Views/adm/projetos/projetos.php?tipo=finalizado" />';
    }
    
}
elseif(isset($_POST['submitConfirmExclusao'])){
    $classe= $_POST['classe']."Controller";
    $metodo = $_POST['metodo'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $plano = $_POST['plano'];
    $fkLogo = $_POST['fkLogo'];
    $fkCliente = $_POST['fkCliente'];
    
    $motivoExclusao = $_POST['motivoExclusao'];
    $dataExclusao = $_POST['dataExclusao'];

    $controller = new $classe();
    $controller->$metodo($id, $nome, $plano, $fkLogo, $fkCliente, $motivoExclusao, $dataExclusao);
    echo '<meta http-equiv="refresh" content="0.1;URL=../Views/adm/projetos/projetos.php?tipo=finalizado" />';
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
    public function deletarProjeto($id, $nome, $plano, $fkLogo, $fkCliente, $motivoExclusao, $dataExclusao){
        $cli = $this->projetoDao->deletarProjeto($id, $nome, $plano, $fkLogo, $fkCliente, $motivoExclusao, $dataExclusao);
    }

    public function listarProjetosExclusoes(){
        $fin = $this->projetoDao->listarProjetosExclusoes();
            $_SESSION['projetosDelete'] = $fin;
    }

}//FIM cliente





















		
        
?>