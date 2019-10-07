
<?php
require_once __DIR__ . "/../DAO/enderecoDAO.php";
require_once __DIR__ . "/../Model/enderecoModel.php";
        
   

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class EnderecoController {
    private $enderecoModel;
    private $dao;

    public function __construct(){
        $this->enderecoModel = new EnderecoModel();
        $this->enderecoDao = new EnderecoDAO();
    }

    public function listarEnderecoPendente(){
        $cli = $this->enderecoDao->listarEnderecoPendente();
        $_SESSION['enderecoPendente'] = $cli;
    }
    // public function listarEnderecoEmProducao(){
    //     $cli = $this->enderecoDao->listarEnderecoEmProducao();
    //     $_SESSION['enderecoEmProducao'] = $cli;
    // }
}//FIM cliente

$endereco_controller = new EnderecoController();
$endereco_controller->listarEnderecoPendente();
// $endereco_controller->listarEnderecoEmProducao();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"




















		
        
?>