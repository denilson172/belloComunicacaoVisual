<?php
require 'config.php';
require 'conexao.php';
require 'database.php';
require_once '../Model/enderecoModel.php';
require_once '../Model/clienteModel.php';


class DAO{
    function inserirDados($endereco, $cliente){
        //ENDERECO - GET
        $logradouroEndereco = $endereco->getLogradouroEndereco();
        $numeroEndereco = $endereco->getNumeroEndereco();
        $bairroEndereco = $endereco->getBairroEndereco();
        $cidadeEndereco = $endereco->getCidadeEndereco();

        //CLIENTE - GET
        $nomeCliente = $cliente->getNomeCliente();
        $emailCliente = $cliente->getEmailCliente();
        $celularCliente = $cliente->getCelularCliente();
        $idEndereco = $cliente->getIdEndereco();


        //ENDERECO - array para insert no banco
        $endereco_arr = array (
            //'id_endereco' => $idEndereco,
            'logradouro_endereco' => $logradouroEndereco,
            'numero_endereco' => $numeroEndereco,
            'bairro_endereco' => $bairroEndereco,
            'cidade_endereco' => $cidadeEndereco
        );

        //CLIENTE - array para insert no banco
        $cliente_arr = array (
            'email_cliente' => $emailCliente,
            'nome_cliente' => $nomeCliente,
            'celular_cliente' => $celularCliente,
            'id_endereco' =>  $idEndereco
        );

        //inserindo no bd;
        $salvar = DBCreateFK('endereco', 'cliente', $endereco_arr, $cliente_arr);
    }  
}


//função de listar
//$endereco = DBRead('endereco'null);
        
    
?>