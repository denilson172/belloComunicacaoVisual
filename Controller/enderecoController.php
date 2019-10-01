
<?php
require_once __DIR__ . "/../DAO/dao.php";
require_once __DIR__ . "/../Model/enderecoModel.php";
        
   

//ENDERECO, CLIENTE, LOGO - enviando para Model e DAO ================================================================================
class EnderecoController {
    private $enderecoModel;
    private $dao;

    public function __construct(){
        $this->enderecoModel = new EnderecoModel();
        $this->enderecoDao = new EnderecoDAO();
    }

    public function listarEndereco(){
        $cli = $this->enderecoDao->listarEndereco();
        $_SESSION['endereco'] = $cli;

        

         //header('Location: http://localhost/ARQUIVOS/bellocv/Views/adm/projetos/projetos.php');
    }
}//FIM cliente

$endereco_controller = new EnderecoController();
$endereco_controller->listarEndereco();

//echo "<script> location.href= '../Views/adm/projetos/projetos.php' </script>"




















		
        
?>