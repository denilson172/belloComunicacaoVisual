<?php
require_once __DIR__ . '/../Model/financasModel.php';

class financasDAO{

    function inserirDados($financas){
        //FINANCAS - GET
        $dataFinancas = $financas->getDataFinancas();
        $categoriaFinancas = $financas->getCategoriaFinancas();
        $descricaoFinancas = $financas->getDescricaoFinancas();
        $valorFinancas = $financas->getValorFinancas();
        $tipoFinancaFinancas = $financas->gettipoFinancaFinancas();
        $armazenamentoFinancas = $financas->getArmazenamentoFinancas();
        //FINANCAS - array para insert no banco
        $financa_arr = array (
            'data_financeiro' => $dataFinancas,
            'valor_financeiro' => $valorFinancas,
            'descricao_financeiro' => $descricaoFinancas,
            'categoria_financeiro' => $categoriaFinancas,            
            'tipo_financeiro' => $tipoFinancaFinancas,
            'armazenamento_financeiro' => $armazenamentoFinancas
        );
        //inserindo no bd;
        $salvar = DBCreate('financeiro',$financa_arr);
    }

    //alterar financas
    function alterarFinancas($id, $data, $categoria, $descricao, $valor, $tipoFinanca, $armazenamento){
        //FINANCAS - array para insert no banco
        $financa_arr = array (
            'id_financeiro' => $id,
            'data_financeiro' => $data,
            'valor_financeiro' => $valor,
            'descricao_financeiro' => $descricao,
            'categoria_financeiro' => $categoria,
            'tipo_financeiro' => $tipoFinanca,
            'armazenamento_financeiro' => $armazenamento
        );
        //inserindo no bd;
        $alter = DBUpdate('financeiro',$financa_arr,'id_financeiro='.$id);
        

        return $alter;
    }
    
    //encontrar financas
    function encontrarFinancas($id){
        $financa = DBRead('financeiro',"WHERE id_financeiro = {$id}");//retorna um vetor com as linhas do BD

        $fin = [];
        for($i=0; $i < count($financa); $i++){
            $fin[$i] = new FinancasModel();

            $fin[$i]->setIdFinancas($financa[$i]['id_financeiro']);  
            $fin[$i]->setDataFinancas($financa[$i]['data_financeiro']);
            $fin[$i]->setCategoriaFinancas($financa[$i]['categoria_financeiro']);  
            $fin[$i]->setDescricaoFinancas($financa[$i]['descricao_financeiro']);  
            $fin[$i]->setValorFinancas($financa[$i]['valor_financeiro']); 
            $fin[$i]->setTipoFinancaFinancas($financa[$i]['tipo_financeiro']);  
            $fin[$i]->setArmazenamentoFinancas($financa[$i]['armazenamento_financeiro']);
        }
        return $fin;
    }
    //metodo para listar financa pendente
    function listarFinancasEntrada(){
        $financa = DBRead('financeiro',"WHERE tipo_financeiro = 1");//valor 1 representa entrada

        $fin = [];
        for($i=0; $i < count($financa); $i++){
            $fin[$i] = new FinancasModel();

            $fin[$i]->setIdFinancas($financa[$i]['id_financeiro']);  
            $fin[$i]->setDataFinancas($financa[$i]['data_financeiro']);
            $fin[$i]->setCategoriaFinancas($financa[$i]['categoria_financeiro']);  
            $fin[$i]->setDescricaoFinancas($financa[$i]['descricao_financeiro']);  
            $fin[$i]->setValorFinancas($financa[$i]['valor_financeiro']); 
            $fin[$i]->setTipoFinancaFinancas($financa[$i]['tipo_financeiro']);  
            $fin[$i]->setArmazenamentoFinancas($financa[$i]['armazenamento_financeiro']);
        }
        return $fin;
    }

    //metodo para listar financa pendente
    function listarFinancasPendente(){
        $financa = DBRead('financeiro',"WHERE tipo_financeiro = 2");//retorna um vetor com as linhas do BD
        $fin = [];
        
        for($i=0; $i < count($financa); $i++){
            $fin[$i] = new FinancasModel();

            $fin[$i]->setIdFinancas($financa[$i]['id_financeiro']);  
            $fin[$i]->setDataFinancas($financa[$i]['data_financeiro']);
            $fin[$i]->setValorFinancas($financa[$i]['valor_financeiro']);
            $fin[$i]->setDescricaoFinancas($financa[$i]['descricao_financeiro']);  
            $fin[$i]->setCategoriaFinancas($financa[$i]['categoria_financeiro']);  
            $fin[$i]->setTipoFinancaFinancas($financa[$i]['tipo_financeiro']);
            $fin[$i]->setArmazenamentoFinancas($financa[$i]['armazenamento_financeiro']);
        }
        return $fin;
    }

    //metodo para listar financa saida
    function listarFinancasSaida(){
        $financa = DBRead('financeiro',"WHERE tipo_financeiro = 3");//retorna um vetor com as linhas do BD
        $fin = [];
        for($i=0; $i < count($financa); $i++){
            $fin[$i] = new FinancasModel();

            $fin[$i]->setIdFinancas($financa[$i]['id_financeiro']);  
            $fin[$i]->setDataFinancas($financa[$i]['data_financeiro']);
            $fin[$i]->setCategoriaFinancas($financa[$i]['categoria_financeiro']);  
            $fin[$i]->setDescricaoFinancas($financa[$i]['descricao_financeiro']);  
            $fin[$i]->setValorFinancas($financa[$i]['valor_financeiro']); 
            $fin[$i]->setTipoFinancaFinancas($financa[$i]['tipo_financeiro']);
            $fin[$i]->setArmazenamentoFinancas($financa[$i]['armazenamento_financeiro']);
        }
        return $fin;
    }

    function somarEntradasFinancas(){
        $financa = DBRead('financeiro',"WHERE tipo_financeiro = 1");//valor 1 representa entrada
        if(!empty($financa)){
            $sum = 0.0;
            foreach ($financa as $key => $value){
                $sum += $value['valor_financeiro'];
                $sum_2 = str_replace('.', ',', $sum);
                $data[] = $sum_2;    
            }
            return $data;
        }
    }

    function somarPendenciasFinancas(){
        $financa = DBRead('financeiro',"WHERE tipo_financeiro = 2");//valor 2 representa pendencia
        if(!empty($financa)){
            $sum = 0.0;
            foreach ($financa as $key => $value){
                $sum += $value['valor_financeiro'];
                $sum_2 = str_replace('.', ',', $sum);
                $data[] = $sum_2;    
            }
            return $data;
        }
    }

    function somarSaidasFinancas(){
        $financa = DBRead('financeiro',"WHERE tipo_financeiro = 3");//valor 3 representa saida
        if(!empty($financa)){
            $sum = 0.0;
            foreach ($financa as $key => $value){
                $sum += $value['valor_financeiro'];
                $sum_2 = str_replace('.', ',', $sum);
                $data[] = $sum_2;
            }
            return $data;
        }
    }

    function totalFinancas(){

        //obtendo os valores
        $financaEntrada = $this->somarEntradasFinancas();
        $financaPendente = $this->somarPendenciasFinancas();
        $financaSaida = $this->somarSaidasFinancas();

        //verificando se tem registros no array
        if($financaEntrada == NULL){
            $financaEntrada = 0.0;
        }else{
            $financaEntrada = str_replace(',', '.', $financaEntrada);
            $financaEntrada = array_pop($financaEntrada); //retorna o último valor do array
        }
        if($financaPendente == NULL){
            $financaPendente = 0.0;
        }else{
            $financaPendente = str_replace(',', '.', $financaPendente);
            $financaPendente = array_pop($financaPendente); //retorna o último valor do array
        }
        if($financaSaida == NULL){
            $financaSaida = 0.0;
        }else{
            $financaSaida = str_replace(',', '.', $financaSaida);
            $financaSaida = array_pop($financaSaida); //retorna o último valor do array
        }
        
        $result = ($financaEntrada - ($financaPendente + $financaSaida));

        //GERANDO MENSAGEM DO SALDO
        if ($result < 0){
            $msgSaldo = "</br> <h5 class='red bold'> SALDO NEGATIVO 😭</h5>";
        }
        elseif($result > 0){
            $msgSaldo = "</br> <h5 class='green-dark bold'> SALDO POSITIVO 🥰</h5>";
        }else{
            $msgSaldo = "</br> <h5 class='black bold'> SALDO ZERADO 😑</h5>";
        }

        //TROCANDO . POR , E BOTANDO EM UM VETOR
        $result = str_replace('.', ',', $result.$msgSaldo);
        $data[] = $result;

        return $data;
    }

    function alterarTipoFinancas($id,$tipo){        
        $alterarTipo = array ('tipo_financeiro'=> $tipo);
        $alter = DBUpdate('financeiro',$alterarTipo,'id_financeiro='.$id);

        return $alter;
    }

}
?>