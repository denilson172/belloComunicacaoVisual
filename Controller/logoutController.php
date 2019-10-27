<?php 

require_once ('../DAO/dao.php');
require_once __DIR__ . '/../Model/loginModel.php';


class logoutController {
public function __construct(){
	$this->loginModel = new FinancasModel();
	$this->financasDao = new FinancasDAO();
	
}


if(!empty($_SESSION['logado'])){
	echo "sou lindo";
}else
echo "não tem sessão";
//session_start();
	//unset($_SESSION['logado']);
	//$_SESSION['logado'] = session_destroy();
	//echo "<script> location.href= '../index.php' </script>";
	exit();
	


	

?>