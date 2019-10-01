<?php

require_once __DIR__ . '/../Model/logoModel.php';

class LogoDAO{
    function listarLogoPendente(){
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
?>