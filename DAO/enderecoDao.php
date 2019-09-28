<?php
require 'config.php';
require 'conexao.php';
require 'database.php';
require_once '../Model/enderecoModel.php';

class EnderecoDAO{
    function inserirEndereco($endereco){
        $logradouroEndereco = $endereco->getLogradouroEndereco();
        $numeroEndereco = $endereco->getNumeroEndereco();
        $bairroEndereco = $endereco->getBairroEndereco();
        $cidadeEndereco = $endereco->getCidadeEndereco();

        //array para insert no banco
        $endereco_arr = array (
            'logradouro_endereco' => $logradouroEndereco,
            'numero_endereco' => $numeroEndereco,
            'bairro_endereco' => $bairroEndereco,
            'cidade_endereco' => $cidadeEndereco
        );
        //inserindo no bd;
        $salvar = DBCreate('endereco', $endereco_arr);
    }  
}


//função de listar
//$endereco = DBRead('endereco'null);
        
    
?>