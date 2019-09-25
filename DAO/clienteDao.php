<?php
Require_Once("../model/clienteModel.php");

class Cliente{
	function adiciona(Database $bello,  $cliente) {

			function adiciona(Database $conexao, Cliente $cliente) {
            $query = "INSERT INTO cliente (nome_cliente, email_cliente, celular_cliente) VALUES ('{$cliente->getNome()}', '{$cliente->getEmail()}''{$cliente->getTelefone()}')";  
            mysqli_query($conexão->conecta(), $query);
        }

    }
}