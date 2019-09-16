<?php

class Meta
{
	protected $conn;
	
	public function __construct()
	{
		$this->conexion();
	}
	
	public function conexion()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "db_metas";

		try {
			$this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
			// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
			}
		catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
	}
	
	public function inserta()
	{
		if(count($_POST) > 0) {			
			$meta = $_POST['meta'];
			$plazo = $_POST['plazo'];
			
			$sql = "INSERT INTO mis_metas (meta, plazo) VALUES ('$meta', $plazo)";
			$this->conn->exec($sql);
		}

		header('Location: formulario.php');
	}
	
	public function consulta()
	{
		$sql2 = "SELECT * FROM mis_metas";   //llamo a select par amostrar todo, creo que la base se llamaba db 
		$resultado = $this->conn->query($sql2);  //llamo a la conexion a la base de datos(localhost,root,etc)  
		$numRows = $this->conn->query('SELECT COUNT(*) FROM mis_metas') 
		
		if($numRows > 0){//accedo al campo num_rows(creo que lo escribi bien) y si es mayor a cero entoces hay datos en mi tabla y la muestro 
		   return $this->conn->query($sql2);
		} 
		else{ 
		   return null;
		}	
	}
}
?>