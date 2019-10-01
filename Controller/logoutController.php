<?php 
require_once ("../DAO/dao.php");
	
	class LoginController{
		private $loginModel;
		private $loginDao;

		public function __construct(){
			$this->loginModel = new LoginModel();
			$this->loginDao = new LoginDAO();
		}

		public function validar($email,$senha){
			$this->loginModel->setEmailLogin($email);
			$this->loginModel->setSenhaLogin($senha);

			return $this->loginDao->validarLogin($this->loginModel);
		}
	}

?>