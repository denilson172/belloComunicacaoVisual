<?php
Require_Once("../Model/clienteModel.php");
Require_Once("../Model/enderecoModel.php");

class ClienteDAO{
    function inserirCliente($cliente) {
        $nomeCliente = $cliente->getNomeCliente();
        $emailCliente = $cliente->getEmailCliente();
        $celularCliente = $cliente->getCelularCliente();
        //obtendo id_endereco;
        $idEndereco = DBRead('endereco',null,'id_endereco');        
        $id_fk = $idEndereco['0']['id_endereco'];

        
        
        
        //array para insert no banco
        $cliente_arr = array (
            'email_cliente' => $emailCliente,
            'nome_cliente' => $nomeCliente,
            'celular_cliente' => $celularCliente,
            'id_endereco' =>  $id_fk
        );

        //insertnoBD
       $salvar = DBCreate('cliente',$cliente_arr);
    }

}