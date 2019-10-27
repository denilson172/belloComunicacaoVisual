
<?php
require_once __DIR__ ."/../DAO/financasDAO.php";
require_once __DIR__ ."/../DAO/dao.php";
require_once __DIR__ ."/../Model/financasModel.php";


//ENDERECO,$finENTE, LOGO - recebendo dados================================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
        $classe= $_POST['classe']."Controller";
        $metodo = $_POST['metodo'];
        $id = $_POST['id'];
        $data = $_POST['data'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $valor = str_replace(',', '.', $valor); //transformando , em .
        $tipoFinanca = $_POST['tipo'];
        $armazenamentoFinanca = $_POST['armazenamento'];
        // //NÃO TA FUNCIONANDO
        // if ($armazenamentoFinanca = '1'){
        //     $armazenamentoFinanca == "Conta Bancária";
        // }elseif($armazenamentoFinanca = '2'){
        //     $armazenamentoFinanca == "Conta Maquineta";
        // }elseif($armazenamentoFinanca = '3'){
        //     $armazenamentoFinanca == "Físico";
        // }else{
        //     $armazenamentoFinanca == "erro";
        // }
        
        $controller = new $classe();

       $controller->$metodo($data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamentoFinanca);

        // $controller->$somarEntradasFinancas();
        // $controller->$somarPendenciasFinancas();
        // $controller->$somarSaidasFinancas();
        // $controller->$totalFinancas();
        
    }
    elseif(isset($_POST['submitEdit'])){
        $classe= $_POST['classe']."Controller";
        $metodo = $_POST['metodo'];
        $id = $_POST['id'];
        $data = $_POST['data'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $valor = str_replace(',', '.', $valor); //transformando , em .
        $tipoFinanca = $_POST['tipo'];
        $armazenamentoFinanca = $_POST['armazenamento'];

        $controller = new $classe();
        $controller->$metodo($id, $data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamentoFinanca);
    } 
}
// else{
//     $classeEndereco ="FinancasController";
//     $metodoInserir ="inserirFinancas";
// }

//FINANCA - enviando para Model e DAO ================================================================================
class FinancasController {
    private $dataModel;
    private $categoriaModel;
    private $descricaoModel;
    private $valorModel;
    private $tipoFinancaModel;
    private $armazenamentoFinancaModel;
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
        echo "entrou no insert";
        echo "<script> location.href= '../Views/adm/financas/financas.php' </script>";
        return $this->financasDao->inserirDados($this->financasModel);    
    }

    //sessões de  listar==========================================================================
    public function encontrarFinanca($idf){
        $fin = $this->financasDao->encontrarFinancas($idf);
        $_SESSION['financaEncontrada'] = $fin;
    }

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
    //alterar financas=================================================================================
    public function alterarFinancas($id, $data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamentoFinanca){
        $fin = $this->financasDao->alterarFinancas($id, $data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamentoFinanca);
        echo "<script> location.href= '../Views/adm/financas/financas.php' </script>";
    }
}//FIM financas




















		
        
?>