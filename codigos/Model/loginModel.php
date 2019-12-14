<?php
class LoginModel{
    private $id_login;
	private $email_login;
    private $senha_login;

    public function getIdLogin() {
        return $this -> id;
    }

    public function setIdLogin($id_login) {
        $this->id = $id_login;
    }

    public function getEmailLogin() {
        return $this -> email;
    }

    public function setEmailLogin($email_login) {
        $this->email = $email_login;
    }

    public function getSenhaLogin() {
        return $this -> senha;
    }

    public function setSenhaLogin($senha_login) {
        $this->senha = $senha_login;
    }
    
}
?>