<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$nombre = $_POST['nombre'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM materia WHERE id_materia = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		$query = "INSERT INTO materia(nombre_materia) VALUES('$nombre')";
		mysqli_query($conexion, $query);
	}
?>