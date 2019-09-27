<?php
Require_Once("./Model/Cliente.class.php");

class ClienteDAO{
    function inserirCliente($cliente) {

        $nomeCliente = $cliente->getNomeCliente();
        $emailCliente = $cliente->getEmailCliente();
        $celularCliente = $cliente->getCelularCliente();

        $con = Database::conexao();

        $query = "INSERT INTO cliente (nome_cliente,email_cliente,celular_cliente) VALUES (?,?,?,?)";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1,$nomeCliente);
        $stmt->bindParam(2,$emailCliente);
        $stmt->bindParam(3,$celularCliente);
        $ok = $stmt->execute();/**/

    
    //mysqli_query($conexao->conexao(), $query);
    }

}