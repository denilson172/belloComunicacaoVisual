<?php 
require_once ("../DAO/dao.php");
require_once ("../Model/loginModel.php");

if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST['submit'])){
		$classe= $_POST['classe']."Controller";
		$metodo = $_POST['metodo'];
				
		$login = $_POST['email']; 
		$senha = $_POST['password'];
		
		//$logoutValue = $_POST['sair'];
		//$descrypt = md5($senha);

		$controller = new $classe();

		$controller->$metodo($login,$senha);
		$controller->logout($logout);
	}else{
		$classeEndereco ="LoginController";
		$metodoInserir ="validar";
		
	}
}
	
	class LoginController{
		private $loginModel;
		private $loginDao;
		private $logout;

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