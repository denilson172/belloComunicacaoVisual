<?php
	class Database{
		protected static $db;
		public function __construct(){
			$db_host = 'localhost';
			$db_nome = 'bello';
			$db_usuario = 'root';
			$db_senha = '';
			$db_driver = 'mysql';
			$sistema_titulo = 'bello';

			//Quando o atributo é estático usa self em vez de this
			try{
				self::$db = new PDO("$db_driver:host=$db_host;dbname=$db_nome",$db_usuario,$db_senha);
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$db->exec("SET NAMES utf8");
			}
			catch (PDOException $e){
				echo "PDOException em $sistema_titulo", $e->getMessage();
				die("Connection Error:".$e->getMessage());
			}
		}

		//Método estático
		public static function conexao(){
			if(!self::$db){
				new Database();
			}
			return self::$db;
		}
	}
		

		
		
		
		
		
		
			// Create connection
		/*function conecta() 
		{
			$conexao = new mysqli($this->servername, $this->database, $this->username, $this->password);
			return $conexao; 
			
			// Check connection
		if (!$conexao) {
			die("Connection failed: " . mysqli_connect_error());
		}
			echo "Connected successfully";
			mysqli_close($conexao);

		}

	}*/
	?>