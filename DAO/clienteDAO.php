<?php

require_once __DIR__ . '/../Model/clienteModel.php';

class ClienteDAO{
    function listarClientePendente(){
        $cliente = DBRead('cliente');//retorna um vetor com as linhas do BD
        $pro = [];
        for($i=0; $i < count($cliente); $i++){
            $pro[$i] = new ClienteModel();

            $pro[$i]->setIdCliente($cliente[$i]['id_cliente']);
            $pro[$i]->setNomeCliente($cliente[$i]['nome_cliente']);
            $pro[$i]->setEmailCliente($cliente[$i]['email_cliente']);
            $pro[$i]->setCelularCliente($cliente[$i]['celular_cliente']); 
            $pro[$i]->setIdEndereco($cliente[$i]['id_endereco']); 
        }
        return $pro;
    }

    // function listarClienteEmProducao(){
    //     $cliente = DBRead('cliente');//retorna um vetor com as linhas do BD
    //     $pro = [];
    //     for($i=0; $i < count($cliente); $i++){
    //         $pro[$i] = new ClienteModel();

    //         $pro[$i]->setIdCliente($cliente[$i]['id_cliente']);
    //         $pro[$i]->setNomeCliente($cliente[$i]['nome_cliente']);
    //         $pro[$i]->setEmailCliente($cliente[$i]['email_cliente']);
    //         $pro[$i]->setCelularCliente($cliente[$i]['celular_cliente']); 
    //         $pro[$i]->setIdEndereco($cliente[$i]['id_endereco']); 
    //     }
    //     return $pro;
    // }
}
?>