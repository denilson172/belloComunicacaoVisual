<?php
Require_Once("Model/EnderecoModel.php");

class EnderecoDAO{
	function inserirEndereco($endereco){
        
        $logradouroEndereco = $endereco->getLogradouroEndereco();
        $numeroEndereco = $endereco->getNumeroEndereco();
        $bairroEndereco = $endereco->getBairroEndereco();
        $cidadeEndereco = $endereco->getCidadeEndereco();

        $con = Database::conexao();

        $query = "INSERT INTO endereco (logradouro_endereco,numero_endereco,bairro_endereco,cidade_endereco) VALUES (?,?,?,?)";  
        $stmt = $con->prepare($query);
        $stmt->bindParam(1,$nomeCliente);
        $stmt->bindParam(2,$emailCliente);
        $stmt->bindParam(3,$celularCliente);
        $ok = $stmt->execute();/**/
    }
    
}