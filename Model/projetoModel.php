<?php
    class ProjetoModel{
        private $id_projeto;
        private $plano_projeto;
        private $status_projeto;
        private $nome_projeto;
        private $id_logo; //fk
        private $id_cliente; //fk
        private $dataExclusao; //fk
        private $motivoExclusao; //fk


        public function getIdProjeto() {
            return $this -> id;
        }

        public function setIdProjeto($id_projeto) {
            $this->id = $id_projeto;
        }

        public function getPlanoProjeto() {
            return $this -> plano;
        }

        public function setPlanoProjeto($plano_projeto) {
            $this->plano = $plano_projeto;
        }

        public function getStatusProjeto() {
            return $this -> status;
        }

        public function setStatusProjeto($status_projeto) {
            $this->status = $status_projeto;
        }

        public function getNomeProjeto() {
            return $this -> nomeProjeto;
        }

        public function setNomeProjeto($nome_projeto) {
            $this->nomeProjeto = $nome_projeto;
        }
        //LOGO - FK
        public function getIdLogo() {
            return $this -> id_logo;
        }

        public function setIdLogo($id_logo) {
            $this->id_logo = $id_logo;
        }
        //CLIENTE - FK
        public function getIdCliente() {
            return $this -> id_cliente;
        }

        public function setIdCliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }
        //DATA EXCLUSÃO
        public function getDataExclusao() {
            return $this -> dataExclusao;
        }

        public function setDataExclusao($dataExclusao) {
            $this->dataExclusao = $dataExclusao;
        }
        //MOTIVO EXCLUSÃO
        public function getMotivoExclusao() {
            return $this -> motivoExclusao;
        }

        public function setMotivoExclusao($motivoExclusao) {
            $this->motivoExclusao = $motivoExclusao;
        }
    }
?>