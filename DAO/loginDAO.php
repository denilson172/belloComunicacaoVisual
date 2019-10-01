<?php
//require 'config.php';
//require 'conexao.php';
require 'database.php';
require_once __DIR__ . '/../Model/loginModel.php';



class LoginDAO{        
    function validarLogin($login){
        $emailLogin = $login->getEmailLogin();
        $senhaLogin = $login->getSenhaLogin();

        $validar = DBLogin('login',$emailLogin,$senhaLogin);
    }
}
?>