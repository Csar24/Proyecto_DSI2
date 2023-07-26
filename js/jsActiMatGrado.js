$(document).ready(function() {
  // Cuando se seleccione un grado y materia
  $('#idGradoMateria').on('change', function() {
    var gradoMateria = $(this).val();

    // Realizar una petición AJAX para obtener las actividades relacionadas
    $.ajax({
      url: '../controllers/obtener_datos.php',
      type: 'POST',
      data: { gradoMateria : gradoMateria },
      success: function(response) {
        // Actualizar el segundo select con las actividades obtenidas
        $('#idPerfil').html(response);
        
        if(response==""){
          document.getElementById('selecPM').disabled = true;
          var tablaDiv = document.getElementById("tablaAlumnos");

          // Obtener la tabla dentro del div
          var tabla = tablaDiv.querySelector("table");

          // Verificar si se encontró la tabla
          if (tabla) {
            // Eliminar la tabla del div
            tablaDiv.removeChild(tabla);
          }
          // Obtener el elemento con el identificador 'idGM' y eliminarlo
          var inputIdGM = document.querySelector("input[name='idGM']");
          // Obtener el elemento con la clase 'btn btn-primary me-md-2' y eliminarlo
          var inputGuardar = document.querySelector("input[name='btnGuardar']");

          if(inputIdGM){ inputIdGM.parentNode.remove(); }
          if(inputGuardar){ inputGuardar.parentNode.remove(inputGuardar); }
        }else{
          document.getElementById('selecPM').disabled = false;
        }
      }
    });
  });

  
});