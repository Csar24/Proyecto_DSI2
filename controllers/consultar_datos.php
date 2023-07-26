<?php 
	
	function consultarTiposAcceso() {
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de la tabla "tipo_accesos"
	    $sql = "SELECT * FROM tipo_acceso ORDER BY id_tipo_acceso";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $tiposAcceso = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $tipoAcceso = array(
	                'id_tipo_acceso' => $row['id_tipo_acceso'],
	                'nombre_acceso' => $row['nombre_acceso']
	            );
	            $tiposAcceso[] = $tipoAcceso;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $tiposAcceso;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexio-n>close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarUsuarios() {
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de la tabla "usuario"
	    $sql = "SELECT id_usuario, nombre, apellidos, usuario, tp.nombre_acceso AS tp FROM usuario u, tipo_acceso tp WHERE u.id_tipo_acceso = tp.id_tipo_acceso ORDER BY id_usuario";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $usuarios = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $usuario = array(
	                'id_usuario' => $row['id_usuario'],
	                'nombre' => $row['nombre'],
	                'apellidos' => $row['apellidos'],
	                'usuario' => $row['usuario'],
	                'tp' => $row['tp']
	            );
	            $usuarios[] = $usuario;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $usuarios;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarGrado() {
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de la tabla "grado"
	    $sql = "SELECT * FROM grado ORDER BY id_grado";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $grados = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $grado = array(
	                'id_grado' => $row['id_grado'],
	                'nombre_grado' => $row['nombre_grado']
	            );
	            $grados[] = $grado;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $grados;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarMateria() {
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de la tabla "materia"
	    $sql = "SELECT * FROM materia ORDER BY id_materia";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $materias = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $materia = array(
	                'id_materia' => $row['id_materia'],
	                'nombre_materia' => $row['nombre_materia']
	            );
	            $materias[] = $materia;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $materias;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarGradoMateria() {
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de la tabla "materia"
	    $sql = "SELECT id_grado_materia, nombre_grado, nombre_materia FROM grado_materia gm, grado g, materia m WHERE gm.id_materia = m.id_materia AND gm.id_grado = g.id_grado ORDER BY id_grado_materia";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $materias = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $materia = array(
	                'id_grado_materia' => $row['id_grado_materia'],
	                'nombre_grado' => $row['nombre_grado'],
	                'nombre_materia' => $row['nombre_materia']
	            );
	            $materias[] = $materia;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $materias;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarAlumno(){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de los usuarios que son alumnos
	    $sql = "SELECT id_usuario, CONCAT(nombre,' ', apellidos) As nombreC FROM usuario u, tipo_acceso tp WHERE u.id_tipo_acceso = tp.id_tipo_acceso AND tp.id_tipo_acceso = 3";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $alumnos = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $alumno = array(
	                'id_usuario' => $row['id_usuario'],
	                'nombreC' => $row['nombreC']
	            );
	            $alumnos[] = $alumno;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $alumnos;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarAlumnoGrado(){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de los usuarios que son alumnos
	    $sql = "SELECT id_alumno, CONCAT(nombre,' ',apellidos) as nombreC, nombre_grado FROM alumno_grado ag, usuario u, grado g WHERE ag.id_grado = g.id_grado AND ag.id_usuario = u.id_usuario";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $alumnos = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $alumno = array(
	                'id_alumno' => $row['id_alumno'],
	                'nombreC' => $row['nombreC'],
	                'nombre_grado' => $row['nombre_grado']
	            );
	            $alumnos[] = $alumno;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $alumnos;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarProfesorGrado(){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    //MODIFICAR
	    $sql = "SELECT id_profesor_materia, pm.id_profesor as profesor, CONCAT(nombre,' ',apellidos) as nombreC, CONCAT(nombre_materia,' ',nombre_grado) AS mat FROM profesor_materia pm, usuario u, grado_materia gm, materia m, grado g WHERE pm.id_profesor = u.id_usuario AND pm.id_grado_materia = gm.id_grado_materia AND gm.id_materia = m.id_materia AND gm.id_grado = g.id_grado";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $alumnos = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $alumno = array(
	                'id_profesor_materia' => $row['id_profesor_materia'],
	                'mat' => $row['mat'],
	                'nombreC' => $row['nombreC']
	            );
	            $alumnos[] = $alumno;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $alumnos;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarProfesor(){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    // Consultar los registros de los usuarios que son alumnos
	    $sql = "SELECT id_usuario, CONCAT(nombre,' ',apellidos) as nombreC FROM usuario WHERE id_tipo_acceso = 2";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $alumnos = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $alumno = array(
	                'id_usuario' => $row['id_usuario'],
	                'nombreC' => $row['nombreC'],
	            );
	            $alumnos[] = $alumno;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $alumnos;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarProfesorMateria($idProfesor){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    
	    $sql = "SELECT nombre_materia, nombre_grado FROM profesor_materia pm, usuario u, grado_materia gm, materia m, grado g WHERE pm.id_profesor = u.id_usuario AND pm.id_grado_materia = gm.id_grado_materia AND gm.id_materia = m.id_materia AND gm.id_grado = g.id_grado AND pm.id_profesor = $idProfesor";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $alumnos = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $alumno = array(
	                'nombre_materia' => $row['nombre_materia'],
	                'nombre_grado' => $row['nombre_grado']
	            );
	            $alumnos[] = $alumno;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $alumnos;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarMateriaProfesor($idProfesor){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    
	    $sql = "SELECT gm.id_grado_materia AS id_grado_materia, nombre_materia, nombre_grado FROM profesor_materia pm, usuario u, grado_materia gm, materia m, grado g WHERE pm.id_profesor = u.id_usuario AND pm.id_grado_materia = gm.id_grado_materia AND gm.id_materia = m.id_materia AND gm.id_grado = g.id_grado AND pm.id_profesor = $idProfesor";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $alumnos = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $alumno = array(
	            	'id_grado_materia' => $row['id_grado_materia'],
	                'nombre_materia' => $row['nombre_materia'],
	                'nombre_grado' => $row['nombre_grado']
	            );
	            $alumnos[] = $alumno;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $alumnos;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarActividades($id){
		//Incluimos el archivo de la conexion
  		include("conexion.php");

	    
	    $sql = "SELECT a.id_actividad, a.nombre_actividad, a.descripcion_actividad, a.ponderacion, m.nombre_materia, g.nombre_grado FROM actividad a JOIN grado_materia gm ON a.id_grado_materia = gm.id_grado_materia JOIN grado g ON gm.id_grado = g.id_grado JOIN materia m ON gm.id_materia = m.id_materia JOIN profesor_materia pm ON gm.id_grado_materia = pm.id_grado_materia JOIN usuario u ON pm.id_profesor = u.id_usuario WHERE u.id_usuario = $id";
	    $result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $activ = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $res = array(
	            	'id_actividad' => $row['id_actividad'],
	                'nombre_actividad' => $row['nombre_actividad'],
	                'descripcion_actividad' => $row['descripcion_actividad'],
	                'ponderacion' => $row['ponderacion'],
	                'nombre_grado' => $row['nombre_grado'],
	                'nombre_materia' => $row['nombre_materia']
	            );
	            $activ[] = $res;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $activ;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}

	function consultarGradoMateriasAlumno($idAlumno){
		include("conexion.php");

		$sql = "SELECT id_grado_materia, nombre_grado, nombre_materia 
				FROM grado_materia gm, grado g, materia m, alumno_grado ag
				WHERE gm.id_materia = m.id_materia 
				AND gm.id_grado = g.id_grado
				AND ag.id_grado = g.id_grado
				AND ag.id_usuario = $idAlumno
				ORDER BY g.id_grado";
				
		$result = $conexion->query($sql);

	    // Verificar si se encontraron registros
	    if ($result->num_rows > 0) {
	        // Crear un arreglo para almacenar los datos
	        $mat = array();

	        // Recorrer los resultados y agregarlos al arreglo
	        while ($row = $result->fetch_assoc()) {
	            $res = array(
	            	'id_actividad' => $row['id_actividad'],
	                'nombre_actividad' => $row['nombre_actividad'],
	                'descripcion_actividad' => $row['descripcion_actividad'],
	                'ponderacion' => $row['ponderacion'],
	                'nombre_grado' => $row['nombre_grado'],
	                'nombre_materia' => $row['nombre_materia']
	            );
	            $mat[] = $res;
	        }

	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver el arreglo con los datos
	        return $activ;
	    } else {
	        // Cerrar la conexión a la base de datos
	        $conexion->close();

	        // Devolver un arreglo vacío si no se encontraron registros
	        return array();
	    }
	}
?>