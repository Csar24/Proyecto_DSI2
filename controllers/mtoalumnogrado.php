<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$grado = $_POST['idGrado'];
	$alumno = $_POST['idAlumno'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM alumno_grado WHERE id_alumno = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		$query = "INSERT INTO alumno_grado(id_grado,id_usuario) VALUES('$grado','$alumno')";
		mysqli_query($conexion, $query);
	}
?>