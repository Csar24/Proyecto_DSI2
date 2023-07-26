<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$grado = $_POST['idGrado'];
	$materia = $_POST['idMateria'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM grado_materia WHERE id_grado_materia = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		$query = "INSERT INTO grado_materia(id_grado,id_materia) VALUES('$grado','$materia')";
		mysqli_query($conexion, $query);
	}
?>