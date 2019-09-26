<?php
    class Cliente{
        private $id_cliente;
        private $nome_cliente;
        private $email_cliente;
        private $celular_cliente;


        public function getIdCliente() {
            return $this -> id;
        }

        public function setIdCliente($id_cliente) {
            $this->id = $id_cliente;
        }

        public function getNomeCliente() {
            return $this -> nome;
        }

        public function setNomeCliente($nome_cliente) {
            $this->nome = $nome_cliente;
        }

        public function getEmailCliente() {
            return $this -> email;
        }

        public function setEmailCliente($email_cliente) {
            $this->email = $email_cliente;
        }

        public function getCelularCliente() {
            return $this ->  celular;
        }

        public function setCelularCliente($celular_cliente) {
            $this->celular = $celular_cliente;
        }

    }
?>