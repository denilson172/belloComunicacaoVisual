
<?php
require_once __DIR__ ."/../DAO/financasDAO.php";
require_once __DIR__ ."/../DAO/dao.php";
require_once __DIR__ ."/../Model/financasModel.php";


//ENDERECO,$finENTE, LOGO - recebendo dados================================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classe= $_POST['classe']."Controller";
        $metodoInserir = $_POST['metodo'];
        //ENDERECO - FORM
        //$id = $_POST['id']
        $data = $_POST['data'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $valor = str_replace(',', '.', $valor); //transformando , em .
        $tipoFinanca = $_POST['tipoFinanca'];
        echo $tipoFinanca;
        $armazenamentoFinanca = $_POST['armazenamento'];
        
        $controller = new $classe();

        $controller->$metodoInserir($data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamentoFinanca);
        $controller->$somarEntradasFinancas();
        $controller->$somarPendenciasFinancas();
        $controller->$somarSaidasFinancas();
        $controller->$totalFinancas();
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
    //parei aqui BOTAR O ATRIBUTO ARMAZENAMENTO
    public function inserirFinancas($data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamentoFinanca){
        //FINANCAS - SET
        $this->financasModel->setDataFinancas($data);
        $this->financasModel->setCategoriaFinancas($categoria);
        $this->financasModel->setDescricaoFinancas($descricao);           
        $this->financasModel->setValorFinancas($valor);
        $this->financasModel->setTipoFinancaFinancas($tipoFinanca);
        $this->financasModel->setArmazenamentoFinancas($armazenamentoFinanca);

        echo "<script> location.href= '../Views/adm/financas/financas.php' </script>";
        return $this->financasDao->inserirDados($this->financasModel);    
    }

    //sessões de  listar==========================================================================
    public function listarFinancasEntrada(){
        $fin = $this->financasDao->listarFinancasEntrada();
        $_SESSION['financasEntrada'] = $fin;
    }

    public function listarFinancasPendente(){
        $fin = $this->financasDao->listarFinancasPendente();
        $_SESSION['financasPendente'] = $fin;
    }

    public function listarFinancasSaida(){
        $fin = $this->financasDao->listarFinancasSaida();
        $_SESSION['financasSaida'] = $fin;
    }
    //sessões de soma==========================================================================
    public function somarEntradasFinancas(){
        $fin = $this->financasDao->somarEntradasFinancas();
        $_SESSION['somarEntradaFinanca'] = $fin;        
    }

    public function somarPendenciasFinancas(){
        $fin = $this->financasDao->somarPendenciasFinancas();
        $_SESSION['somarPendenciaFinanca'] = $fin;
    }

    public function somarSaidasFinancas(){
        $fin = $this->financasDao->somarSaidasFinancas();
        $_SESSION['somarSaidaFinanca'] = $fin;
    }
    //sessão do total==========================================================================
    public function totalFinancas(){
        $fin = $this->financasDao->totalFinancas();
        $_SESSION['totalFinancas'] = $fin;
    }
}//FIM financas




















		
        
?>