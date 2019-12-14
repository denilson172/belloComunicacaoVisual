<?php
class LogoModel{
    private $id_logo;
	private $nomeMarca_logo;
    private $sloganMarca_logo;
    private $descricaoMarca_logo;


    public function getIdLogo() {
        return $this -> id;
    }

    public function setIdLogo($id_logo) {
        $this->id = $id_logo;
    }

    public function getNomeMarcaLogo() {
        return $this -> nomeMarca;
    }

    public function setNomeMarcaLogo($nomeMarca_logo) {
        $this->nomeMarca = $nomeMarca_logo;
    }

    public function getSloganMarcaLogo() {
        return $this -> sloganMarca;
    }

    public function setSloganMarcaLogo($sloganMarca_logo) {
        $this->sloganMarca = $sloganMarca_logo;
    }

    public function getDescricaoMarcaLogo() {
        return $this -> descricaoMarca;
    }

    public function setDescricaoMarcaLogo($descricaoMarca_logo) {
        $this->descricaoMarca = $descricaoMarca_logo;
    }

}
?>