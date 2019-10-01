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

class ProjetoDAO{
    function listarProjeto(){
    $projeto = DBRead('projeto',"WHERE status_projeto = 1");//retorna um vetor com as linhas do BD
        $pro = [];
        for($i=0; $i < count($projeto); $i++){
            $pro[$i] = new ProjetoModel();

            $pro[$i]->setIdProjeto($projeto[$i]['id_projeto']);
            $pro[$i]->setPlanoProjeto($projeto[$i]['plano_projeto']);
            $pro[$i]->setStatusProjeto($projeto[$i]['status_projeto']);
            $pro[$i]->setNomeProjeto($projeto[$i]['nome_projeto']);
            $pro[$i]->setIdLogo($projeto[$i]['id_logo']);
            $pro[$i]->setIdCliente($projeto[$i]['id_cliente']);   
        }
        return $pro;
    }
}

class LogoDAO{
    function listarLogo(){
        $logo = DBRead('logo');//retorna um vetor com as linhas do BD
        $pro = [];
        for($i=0; $i < count($logo); $i++){
            $pro[$i] = new LogoModel();

            $pro[$i]->setIdLogo($logo[$i]['id_logo']);
            $pro[$i]->setNomeMarcaLogo($logo[$i]['nome_marca_logo']);
            $pro[$i]->setSloganMarcaLogo($logo[$i]['slogan_marca_logo']);
            $pro[$i]->setDescricaoMarcaLogo($logo[$i]['descricao_marca_logo']); 
        }
        return $pro;
    }
}

class EnderecoDAO{
    function listarEndereco(){
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
}

class ClienteDAO{
    function listarCliente(){
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
}
?>