<?php 
  //Incluimos el archivo de la conexion
  include("conexion.php");

  //Consultamos si proviene informacion del boton ingresar
  if (!empty($_POST["btnLogin"])) {

    //Consultamos si estan vacios los campos
    if (empty($_POST["usuario"]) and empty($_POST["contra"])) {

      //Mostramos un mensaje de error
      echo '<div class="alert alert-danger">Los campos estan vacios</div>';
    } else { //Si no estan vacios

      //Iniciamos sesion
      session_start();

      $usuario = $_POST["usuario"]; //Asignamos el dato del input usuarios a una variable
      $contra = $_POST["contra"]; //Asignamos el dato del input contraseña a una variable

      //Sentencia sql a ejecutar
      $consulta = "SELECT ta.id_tipo_acceso, u.id_usuario FROM tipo_acceso ta, usuario u WHERE ta.id_tipo_acceso = u.id_tipo_acceso AND u.usuario = '$usuario' AND u.contra = '$contra'";

      //Asignamos a una variable la consulta
      $sql = mysqli_query($conexion,$consulta);

      $tipo_acceso = mysqli_fetch_array($sql);

      //Asignamos un valor a la variable de sesion
      $_SESSION['nivelAcc'] = $tipo_acceso[0];
      $_SESSION['sesionU'] = $tipo_acceso[1];

      //Consultamos el nivel de acceso (tipo usuario) del sistema
      if($tipo_acceso[0]==1 || $tipo_acceso[0]==4){
        //Lo redirigimos al menu principal
        header("location: admin/menu_a.php");
      }
      else if($tipo_acceso[0]==2){
        header("location: teacher/menu_t.php");
      }
      else if($tipo_acceso[0]==3 || $tipo_acceso[0]==5){
        header("location: student/menu_s.php");
      }
      else if($tipo_acceso[0]>=6){
        echo '<div class="alert alert-danger">No tiene acceso al sistema</div>';
        session_unset();
        session_destroy();
      }
      else{
        echo '<div class="alert alert-danger">Usuario o contraseña invalidos</div>';
      }     
    }
    
  }
?>