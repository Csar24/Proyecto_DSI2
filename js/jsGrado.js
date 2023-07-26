$(document).ready(function() {
  
//--  ELIMINAR ---- // 
  // Función para mostrar el modal de confirmación de eliminación
  $(".eliminar").click(function() {
    var id = $(this).data('id');
    $("#confirmarEliminar").data('id', id);
    $("#confirmarEliminar").modal('show');
  });

  //Funcion para esconder el modal
  $("#cancelar").click(function(){
    $("#confirmarEliminar").modal('hide');
  });

  // Función para eliminar el registro
  $("#eliminarRegistro").click(function() {
    var id = $("#confirmarEliminar").data('id');
    $.ajax({
      url: "../controllers/mtogrado.php",
      type: "POST",
      data: { id: id , fx : "eliminar"},//Mandamos el id y el tipo de funcion
      success: function(response) {
        // Actualizar la tabla después de eliminar el registro
        location.reload();location.reload();
      }
  });
                        
  // Cerrar el modal de confirmación y actualizar la tabla
  $("#guardar").modal('hide');
    alert("Datos eliminados con exito");
    // Aquí puedes actualizar la tabla, por ejemplo, recargar la página
    location.reload();
  });

  //--     GUARDAR         ---//
  //Guardar datos
  $("#guardarGrad").click(function() {
    var nombre = $("#nombreGG").val(); //

    $.ajax({
      url: "../controllers/mtogrado.php",
      type: "POST",
      data: { nombre: nombre, fx: "guardar" },
      success: function(response) {
        alert("Datos ingresados con exito");
        location.reload();location.reload();
      },
      error: function(xhr, status, error) {
        alert("Hubo un error en la solicitud AJAX. Por favor, inténtalo de nuevo.");
      }
    });
  });
});