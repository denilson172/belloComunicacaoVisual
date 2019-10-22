<?php

require_once __DIR__ . '/../Model/enderecoModel.php';


class EnderecoDAO{
    function listarEnderecoPendente(){
        $endereco = DBRead('endereco');//retorna um vetor com as linhas do BD
        $pro = [];
        for($i=0; $i < count($endereco); $i++){
            $pro[$i] = new EnderecoModel();

            $pro[$i]->setIdEndereco($endereco[$i]['id_endereco']);
            $pro[$i]->setLogradouroEndereco($endereco[$i]['logradouro_endereco']);
            $pro[$i]->setNumeroEndereco($endereco[$i]['numero_endereco']);
            $pro[$i]->setBairroEndereco($endereco[$i]['bairro_endereco']); 
            $pro[$i]->setCidadeEndereco($endereco[$i]['cidade_endereco']); 
        }
        return $pro;
    }

    function encontrarEndereco($id){
        $cliente = DBRead('cliente',"WHERE id_cliente = {$id}");
            $pro = [];
            for($i=0; $i < count($cliente); $i++){
                $fkEndereco = $cliente[$i]['id_endereco'];
            }
        $endereco = DBRead('endereco',"WHERE id_endereco = {$fkEndereco}");
        $pro = [];
        for($i=0; $i < count($endereco); $i++){
            $pro[$i] = new EnderecoModel();
            $pro[$i]->setIdEndereco($endereco[$i]['id_endereco']);
            $pro[$i]->setLogradouroEndereco($endereco[$i]['logradouro_endereco']);
            $pro[$i]->setNumeroEndereco($endereco[$i]['numero_endereco']);
            $pro[$i]->setBairroEndereco($endereco[$i]['bairro_endereco']); 
            $pro[$i]->setCidadeEndereco($endereco[$i]['cidade_endereco']); 
         }
        return $pro;
    }
}
?>