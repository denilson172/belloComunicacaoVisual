<?php
// require 'config.php';
// require 'conexao.php';
// require 'database.php';
require_once __DIR__ . '/../Model/financasModel.php';

class financasDAO{
    function inserirDados($financas){
        //FINANCAS - GET
        $dataFinancas = $financas->getDataFinancas();
        $categoriaFinancas = $financas->getCategoriaFinancas();
        $descricaoFinancas = $financas->getDescricaoFinancas();
        $valorFinancas = $financas->getValorFinancas();
        $tipoFinancaFinancas = $financas->gettipoFinancaFinancas();

        //FINANCAS - array para insert no banco
        $financa_arr = array (
            'data_financeiro' => $dataFinancas,
            'categoria_financeiro' => $categoriaFinancas,
            'descricao_financeiro' => $descricaoFinancas,
            'valor_financeiro' => $valorFinancas,
            'tipo_financeiro' => $tipoFinancaFinancas,

        );

        //inserindo no bd;
        $salvar = DBCreate('financas',$financa_arr);

    }  
}
?>