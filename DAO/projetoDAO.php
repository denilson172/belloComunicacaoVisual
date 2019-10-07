<?php
require 'dao.php';
require_once __DIR__ . '/../Model/projetoModel.php';

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

    // function alterarStatusEmProducao($projeto){
    //     $idProjeto = $projeto->getIdProjeto();
    //     $a = array ('status_projeto'=> 2);
    //     return  $alter = DBUpdate('projeto',$a, 'id_projeto=$idProjeto');
    // }
    
}
    $a = array ('status_projeto'=> 1);
    $alter = DBUpdate('projeto',$a, 'id_projeto=56');



?>