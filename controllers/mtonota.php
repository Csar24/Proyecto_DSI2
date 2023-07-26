<?php
	include("conexion.php");
	$id = $_POST['id'];
	$actividades = array();
	$datos = explode("/", $id);
	$idMateria = $datos[0];


	$sql = "SELECT a.id_actividad, a.nombre_actividad ";
	$sql .= "FROM actividad a JOIN grado_materia gm ";
	$sql .= "ON a.id_grado_materia = gm.id_grado_materia WHERE gm.id_grado_materia = $idMateria";
	$result = $conexion->query($sql);

	if ($result->num_rows > 0) {
	    // Recorrer los resultados y agregarlos al arreglo
	    while ($row = $result->fetch_assoc()) {
	        $actividad = array(
	            'id_actividad' => $row['id_actividad'],
	            'nombre_actividad' => $row['nombre_actividad']
	        );
	        $actividades[] = $actividad;
	    }
	}

	// Cerrar la conexión a la base de datos
	$conexion->close();

	// Devolver los datos de los alumnos en formato JSON
	echo json_encode($actividades);
?>