<?php
require 'dao.php';
require_once __DIR__ . '/../Model/projetoModel.php';
require_once __DIR__ . '/../Controller/projetoController.php';

class ProjetoDAO{
    function listarProjetoPendente(){
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

    function listarProjetoEmProducao(){
        $projeto = DBRead('projeto',"WHERE status_projeto = 2");//retorna um vetor com as linhas do BD
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

    function listarProjetoFinalizado(){
        $projeto = DBRead('projeto',"WHERE status_projeto = 3");//retorna um vetor com as linhas do BD
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

    function encontrarProjeto($id){
        $projeto = DBRead('projeto',"WHERE id_projeto = {$id}");//retorna um vetor com as linhas do BD

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

    function alterarStatusProjeto($id,$status){        
        $alterarStatus = array ('status_projeto'=> $status);  
        $alter = DBUpdate('projeto',$alterarStatus,'id_projeto='.$id);

        return $alter;
    }

    //deletar projeto com toda as informações
    function deletarProjeto($idProjeto, $fkCliente, $fklogo){

        //pegando endereco
        $cliente = DBRead('cliente',"WHERE id_cliente = {$fkCliente}");
        $pro = [];
        for($i=0; $i < count($cliente); $i++){
            $fkEndereco = $cliente[$i]['id_endereco'];
        }

        $projeto = DBDelete('projeto', "id_projeto = {$idProjeto}");
        $projeto = DBDelete('cliente', "id_cliente = {$fkCliente}");
        $projeto = DBDelete('logo', "id_logo = {$fklogo}");
        $projeto = DBDelete('endereco', "id_endereco = {$fkEndereco}");

        return $projeto;
    }

}


?>