<!doctype html>
<html>
<head>
	<title>Formulario PHP</title>
</head>

<body>
	<h1>Formulario</h1>
	
	<form action="inserta.php" method="POST">
		<label for="meta">Mi Meta:</label>
		<input type="text" name="meta" id="meta">
		<br>
		<label for="plazo">Plazo para realizarla:</label>
		<select name="plazo">
			<option value="1">1 Año</option>
			<option value="3">3 Años</option>
			<option value="5">5 Años</option>
		</select>
		<br>
		<input type="submit" value="Enviar">
	</form>
	
	<?php
	include('Meta.php');
	
	$meta = new Meta();
	$resultado = $meta->consulta();
	
    if(!is_null($resultado)){
       echo "<ol>";
	   foreach($resultado as $row){
	        echo "<li><ul> 
			<li>".$row["id"]."</li> 
			<li>".$row["meta"]."</li>  
			<li>".$row["plazo"]."</li> 
			</ul></li>";
		}	   //recorro con while las filas	 
       echo"</ol>";	   
	} 
    else{ 
       echo"No tienes ninguna fila pues el contador marca 0";	
	}	
	
	?>
	
</body>

</html>