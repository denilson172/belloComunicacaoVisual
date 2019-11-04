<?php 
//require_once ("../DAO/dao.php");
require_once ("../DAO/loginDAO.php");
require_once ("../Model/loginModel.php");
//require_once ("../Model/logoutModel.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit'])){
		$classe= $_POST['classe']."Controller";
		$metodo = $_POST['metodo'];
		$login = $_POST['email']; 
		$senha = $_POST['password'];
		$senha = md5($senha);

		$controller = new $classe();

		$controller->$metodo($login,$senha);
	}
	else{
		$classeEndereco ="LoginController";
		$metodoInserir ="validar";
		
	}
}
elseif(isset($_GET['logout'])){
	echo "entrou no logout";
	$controller = new LoginController();
	$controller->logout();
}

	
	
	class LoginController{
		private $loginModel;
		private $loginDao;

		public function __construct(){
			$this->loginModel = new LoginModel();
			$this->loginDao = new LoginDAO();
			$this->logoutDao = new LogoutDAO();
			
		}

		public function validar($email,$senha){
			$this->loginModel->setEmailLogin($email);
			$this->loginModel->setSenhaLogin($senha);

			return $this->loginDao->validarLogin($this->loginModel);
			
		}

		public function logout(){
			$this->logoutDao->logoutDAO();
		}
	}

?>