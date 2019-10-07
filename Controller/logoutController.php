<?php 
session_start();
require_once ("../DAO/dao.php");

	unset($_SESSION['logado']);
	session_destroy();
	echo "<script> location.href= '../index.php' </script>";
	//header("location: ../index.php");
	exit();
	


	

?>