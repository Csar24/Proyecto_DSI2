<?php
require('fpdf.php');

// Crear una clase extendida de FPDF para personalizar el formato del PDF
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo o título
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Informe de Notas', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Número de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Tabla con los resultados de la consulta
    function TablaConsulta($header, $data)
    {
        // Cabecera
        foreach ($header as $col) {
            $this->Cell(40, 7, $col, 1);
        }
        $this->Ln();

        // Datos
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(40, 6, $col, 1);
            }
            $this->Ln();
        }
    }
}

$idGdMt = empty($_POST['gradoMateria']) ? $_POST['notasR'] : $_POST['gradoMateria'];


// Conexión a la base de datos (Ejemplo: utilizando PDO)
$dsn = 'mysql:host=localhost;dbname=sis_notas';
$username = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
    exit();
}

// Consulta SQL
$sql = "SELECT u.nombre, u.apellidos, AVG(dn.nota) AS promedio FROM alumno_grado ag JOIN usuario u ON ag.id_usuario = u.id_usuario JOIN detalle_nota dn ON ag.id_alumno = dn.id_alumno JOIN nota n ON dn.id_nota = n.id_nota JOIN actividad a ON n.id_actividad = a.id_actividad JOIN grado_materia gm ON a.id_grado_materia = gm.id_grado_materia WHERE gm.id_grado_materia = $idGdMt GROUP BY ag.id_alumno";

try {
    // Ejecutar la consulta y obtener los resultados
    $stmt = $conn->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crear un nuevo PDF
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // Cabecera de la tabla
    $header = array('Nombre', 'Apellidos', 'Promedio Nota');

    // Contenido de la tabla
    $pdf->TablaConsulta($header, $results);

    // Generar el archivo PDF
    $pdf->Output();
} catch (PDOException $e) {
    echo 'Error al ejecutar la consulta: ' . $e->getMessage();
    exit();
}
?>