<?php
require __DIR__.'/../DAO/dao.php';
require_once __DIR__ . '/../Model/loginModel.php';
    
class LoginDAO{        
    function validarLogin($login){
        $emailLogin = $login->getEmailLogin();
        $senhaLogin = $login->getSenhaLogin();
        //$senhaLogin - md5($senhaLogin);

        $validar = DBLogin('login',$emailLogin,$senhaLogin);

        return $validar;
    }
}

class LogoutDAO{
    public function __construct(){
        $this->loginDao = new LoginDAO();
    }

    function logoutDAO(){
        $login = $this->validarLogin();//ERRO AQUI
        $_SESSION['logado'] = $login;
        session_destroy();
        echo $login;
    }
}
?>