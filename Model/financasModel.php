<?php
    class FinancasModel{
        private $id_financas;
        private $data_financas;
        private $categoria_financas;
        private $descricao_financas;
        private $valor_financas;
        private $tipoFinanca_financas;

        public function getIdFinancas() {
            return $this -> id;
        }

        public function setIdFinancas($id_financas) {
            $this->id = $id_financas;
        }

        public function getDataFinancas() {
            return $this -> data;
        }

        public function setDataFinancas($data_financas) {
            $this->data = $data_financas;
        }

        public function getCategoriaFinancas() {
            return $this -> categoria;
        }

        public function setCategoriaFinancas($categoria_financas) {
            $this->categoria = $categoria_financas;
        }

        public function getDescricaoFinancas() {
            return $this -> descricao;
        }

        public function setDescricaoFinancas($descricao_financas) {
            $this->descricao = $descricao_financas;
        }

        public function getValorFinancas() {
            return $this -> valor;
        }

        public function setValorFinancas($valor_financas) {
            $this->valor = $valor_financas;
        }

        public function getTipoFinancaFinancas() {
            return $this -> tipoFinanca;
        }

        public function setTipoFinancaFinancas($tipoFinanca_financas) {
            $this->tipoFinanca = $tipoFinanca_financas;
        }

    }
?>