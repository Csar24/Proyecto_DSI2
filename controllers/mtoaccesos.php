<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$nombre = $_POST['nombre'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM tipo_acceso WHERE id_tipo_acceso = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		if(isset($nombre) && !empty($nombre))
		{
			$query = "INSERT INTO tipo_acceso(nombre_acceso) VALUES('$nombre')";
			mysqli_query($conexion, $query);
		}
	}
?>