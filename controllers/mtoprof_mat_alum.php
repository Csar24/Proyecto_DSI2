<?php
	include("conexion.php");
	$id = $_POST['id'];
	$alumnos = array();

	$datos = explode("/", $id);

	// $datos ahora es un array con los datos separados
	$idMateria = $datos[0]; //
	$idProfesor = $datos[1]; //

	$sql = "SELECT ag.id_alumno, u.nombre, u.apellidos FROM alumno_grado ag INNER JOIN usuario u ON ag.id_usuario = u.id_usuario INNER JOIN grado_materia gm ON ag.id_grado = gm.id_grado INNER JOIN profesor_materia pm ON gm.id_grado_materia = pm.id_grado_materia WHERE pm.id_profesor = $idProfesor AND pm.id_grado_materia = $idMateria";
	$result = $conexion->query($sql);

	if ($result->num_rows > 0) {
	    // Recorrer los resultados y agregarlos al arreglo
	    while ($row = $result->fetch_assoc()) {
	        $alumno = array(
	            'id_alumno' => $row['id_alumno'],
	            'nombreA' => $row['nombre'],
	            'apellidosA' => $row['apellidos']
	        );
	        $alumnos[] = $alumno;
	    }
	}

	// Cerrar la conexión a la base de datos
	$conexion->close();

	// Devolver los datos de los alumnos en formato JSON
	echo json_encode($alumnos);
?>
