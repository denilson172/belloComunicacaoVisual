<?php
require 'config.php';
require 'conexao.php';
require 'database.php';
require_once __DIR__ . '/../Model/enderecoModel.php';
require_once __DIR__ . '/../Model/clienteModel.php';
require_once __DIR__ . '/../Model/logoModel.php';
require_once __DIR__ . '/../Model/projetoModel.php';
require_once __DIR__ . '/../Model/loginModel.php';

class DAO{
    function inserirDados(
        $endereco,
        $cliente,
        $logo,
        $projeto
        ){
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
        //LOGO - GET
        $nomeMarcaLogo = $logo->getNomeMarcaLogo();
        $sloganMarcaLogo = $logo->getSloganMarcaLogo();
        $descricaoMarcaLogo = $logo->getDescricaoMarcaLogo();
        //PROJETO - GET
        $planoProjeto = $projeto->getPlanoProjeto();
        $statusProjeto = $projeto->getstatusProjeto();
        $nomeProjeto = $projeto->getNomeProjeto();
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
        //LOGO - array para insert no banco
        $logo_arr = array (
            'nome_marca_logo' => $nomeMarcaLogo,
            'slogan_marca_logo' => $sloganMarcaLogo,
            'descricao_marca_logo' => $descricaoMarcaLogo
        );
        //PROJETO - array para insert no banco
        $projeto_arr = array (
            'plano_projeto' => $planoProjeto,
            'status_projeto' => $statusProjeto,
            'nome_projeto' => $nomeProjeto,
        );

        //inserindo no bd;
        $salvar = DBCreateFK(
            'endereco',
            'cliente',
            'logo',
            'projeto',
            $endereco_arr,
            $cliente_arr,
            $logo_arr,
            $projeto_arr
        );
    }  
}

class LoginDAO{        
    function validarLogin($login){
        $emailLogin = $login->getEmailLogin();
        $senhaLogin = $login->getSenhaLogin();

        $validar = DBLogin('login',$emailLogin,$senhaLogin);
    }
}
?>