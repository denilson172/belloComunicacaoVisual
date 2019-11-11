<?php
require 'dao.php';
require_once __DIR__ . '/../Model/projetoModel.php';
require_once __DIR__ . '/../Controller/projetoController.php';

class ProjetoDAO{
    function listarProjetoPendente(){
        $projeto = DBRead('projetos',"WHERE status_projeto = 1");//retorna um vetor com as linhas do BD
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
        $projeto = DBRead('projetos',"WHERE status_projeto = 2");//retorna um vetor com as linhas do BD
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
        $projeto = DBRead('projetos',"WHERE status_projeto = 3");//retorna um vetor com as linhas do BD
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
        $projeto = DBRead('projetos',"WHERE id_projeto = {$id}");//retorna um vetor com as linhas do BD

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
        $alter = DBUpdate('projetos',$alterarStatus,'id_projeto='.$id);

        return $alter;
    }

    //deletar projeto com toda as informações
    function deletarProjeto($id, $nome, $plano, $fkLogo, $fkCliente, $motivoExclusao, $dataExclusao){

        //pegando endereco
        $cliente = DBRead('cliente',"WHERE id_cliente = {$fkCliente}");
        $pro = [];
        for($i=0; $i < count($cliente); $i++){
            $fkEndereco = $cliente[$i]['id_endereco'];
        }

        //inserindo log
        $projeto_arr = array (
            'motivo_pro_del' => $motivoExclusao,
            'data_exclusao_pro_del' => $dataExclusao,
            'nome_pro_del' => $nome,
            'plano_pro_del' => $plano,            
            'idProjeto_pro_del' => $id
        );
        DBCreate('projetos_delete',$projeto_arr);

        $projeto = DBDelete('projetos', "id_projeto = {$id}");
        $projeto = DBDelete('cliente', "id_cliente = {$fkCliente}");
        $projeto = DBDelete('logo', "id_logo = {$fkLogo}");
        $projeto = DBDelete('endereco', "id_endereco = {$fkEndereco}");

        return $projeto;
    }

    //listando projetos excluidos
    function listarProjetosExclusoes(){
        $projetosExcluidos = DBRead('projetos_delete',null);
        $pro = [];
        for($i=0; $i < count($projetosExcluidos); $i++){
            $pro[$i] = new ProjetoModel();

            $pro[$i]->setIdProjeto($projetosExcluidos[$i]['id_pro_del']);
            $pro[$i]->setPlanoProjeto($projetosExcluidos[$i]['plano_pro_del']);
            $pro[$i]->setNomeProjeto($projetosExcluidos[$i]['nome_pro_del']);  
            $pro[$i]->setDataExclusao($projetosExcluidos[$i]['data_exclusao_pro_del']);   
            $pro[$i]->setMotivoExclusao($projetosExcluidos[$i]['motivo_pro_del']);   
        }
        return $pro;
    }

}


?>