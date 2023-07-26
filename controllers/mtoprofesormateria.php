<?php 
	include("conexion.php");
	// Obtener el ID del registro a eliminar
	$id = $_POST['id'];
	$fx = $_POST['fx'];
	$profe = $_POST['idProfe'];
	$materia = $_POST['idGradMat'];

	if($fx == "eliminar"){
		// Consulta para eliminar el registro
		$query = "DELETE FROM profesor_materia WHERE id_profesor_materia = $id";
		mysqli_query($conexion, $query);
	}
	else if($fx == "guardar") {
		$query = "INSERT INTO profesor_materia(id_profesor,id_grado_materia) VALUES('$profe','$materia')";
		mysqli_query($conexion, $query);
		echo $query;
	}
?>