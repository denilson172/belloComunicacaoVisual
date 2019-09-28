<?php
Require_Once("../Model/logoModel.php");
Require_Once("../Model/logoModel.php");
//por terminar===================================================================
class LogoDAO{
    function inserirLogo($logo) {
        $nomeMarcaLogo = $logo->getNomeMarcaLogo();
        $sloganMarcaLogo = $logo->getSloganMarcaLogo();
        $descricaoMarcaLogo = $logo->getDescricaoMarcaLogo();
      
        //array para insert no banco
        $logo_arr = array (
            'nome_marca_logo' => $nomeMarcaLogo,
            'slogan_marca_logo' => $sloganMarcaLogo,
            'descricao_marca_logo' => $descricaoMarcaLogo
        );

        //insertnoBD
       $salvar = DBCreate('logo',$logo_arr);
    }

}