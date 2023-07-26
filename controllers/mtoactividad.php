<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$nombre = $_POST['nombre'];
	$gradoMateria = $_POST['idGM'];
	$descrip = $_POST['descripcion'];
	$porcentaje = $_POST['porcentaje'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM actividad WHERE id_actividad = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		if(isset($nombre) && !empty($nombre))
		{
			$query = "INSERT INTO actividad(nombre_actividad,descripcion_actividad,ponderacion,id_grado_materia) VALUES('$nombre','$descrip','$porcentaje','$gradoMateria')";
			mysqli_query($conexion, $query);
		}
	}
?>