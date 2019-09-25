<?php
		$servername = "http://localhost/";
		$database = "bello";
		$username = "root";
        $password = "";

		// Create connection
		public function conecta() 
        {
            $conexao = new mysqli($this->servername, $this->database, $this->username, $this->password);
            return $conexao;        
        }

		//$conn = mysqli_connect($servername, $username, $password, $database);

		// Check connection

		if (!$conexao
		) {

		    die("Connection failed: " . mysqli_connect_error());

		}
		echo "Connected successfully";
		mysqli_close($conexao);
	?>