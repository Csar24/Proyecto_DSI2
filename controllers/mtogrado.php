<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$nombre = $_POST['nombre'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM grado WHERE id_grado = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		if(isset($nombre) && !empty($nombre))
		{
			$query = "INSERT INTO grado(nombre_grado) VALUES('$nombre')";
			mysqli_query($conexion, $query);
		}
	}
?>