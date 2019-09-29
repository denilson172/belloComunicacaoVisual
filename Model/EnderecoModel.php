<?php
class EnderecoModel{
   // private $id_endereco;
	private $logradouro_endereco;
	private $numero_endereco;
    private $bairro_endereco;
    private $cidade_endereco;


   /* public function getIdEndereco() {
        return $this -> id;
    }

    public function setIdEndereco($id_endereco) {
        $this->id = $id_endereco;
    }*/

    public function getLogradouroEndereco() {
        return $this -> logradouro;
    }

    public function setLogradouroEndereco($logradouro_endereco) {
        $this->logradouro = $logradouro_endereco;
    }

    public function getNumeroEndereco() {
        return $this -> numero;
    }

    public function setNumeroEndereco($numero_endereco) {
        $this->numero = $numero_endereco;
    }

    public function getBairroEndereco() {
        return $this -> bairro;
    }

    public function setBairroEndereco($bairro_endereco) {
        $this->bairro = $bairro_endereco;
    }

    public function getCidadeEndereco() {
        return $this -> cidade;
    }

    public function setCidadeEndereco($cidade_endereco) {
        $this->cidade = $cidade_endereco;
    }

}
?>