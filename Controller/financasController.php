
<?php
require_once __DIR__ ."/../DAO/financasDAO.php";
require_once __DIR__ ."/../DAO/dao.php";
require_once __DIR__ ."/../Model/financasModel.php";


//ENDERECO, CLIENTE, LOGO - recebendo dados================================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classe= $_POST['classe']."Controller";
        $metodoInserir = $_POST['metodo'];
        //ENDERECO - FORM
        $data = $_POST['data'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $tipoFinanca = $_POST['tipoFinanca'];
        
        $controller = new $classe();

        $controller->$metodoInserir($data, $categoria, $descricao, $valor, $tipoFinanca);
    }
}else{
    $classeEndereco ="FinancasController";
    $metodoInserir ="inserirFinancas";
}

//FINANCA - enviando para Model e DAO ================================================================================
class FinancasController {
    private $dataModel;
    private $categoriaModel;
    private $descricaoModel;
    private $valorModel;
    private $tipoFinancaModel;
    private $dao;

    public function __construct(){
        $this->financasModel = new FinancasModel();
        $this->financasDao = new FinancasDAO();
        
    }

    public function inserirFinancas($data, $categoria, $descricao, $valor, $tipoFinanca){
        //FINANCAS - SET
        $this->financasModel->setDataFinancas($data);
        $this->financasModel->setCategoriaFinancas($categoria);
        $this->financasModel->setDescricaoFinancas($descricao);           
        $this->financasModel->setValorFinancas($valor);
        $this->financasModel->setTipoFinancaFinancas($tipoFinanca);

        
        echo "<script> location.href= '../Views/adm/financas/financas.php' </script>";
        return $this->financasDao->inserirDados($this->financasModel);    
    }    
}//FIM financas




















		
        
?>