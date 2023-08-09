<?php 
    session_start();
    include("../controllers/consultar_datos.php");
    $profmate = consultarProfesorGrado();
    $profesores = consultarProfesor();
    $gradmat = consultarGradoMateria();
    $sesionU = $_SESSION['sesionU'];
    $nivel = $_SESSION['nivelAcc'];
    //Consultamos si el dato que proviene no esta vacio o no creado
    if($nivel==null){
        //En caso de estar vacio o no creado
        //redirigimos al login
        header("location: ../login.php");
    }
    if($nivel==2)
        header("location: ../teacher/menu_t.php");
    if($nivel==3 || $nivel==5)
        header("location: ../student/menu_s.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panel Administrativo | Sistema de Notas</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/jsProfesorMat.js"></script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="menu_a.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INICIO</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                OPCIONES
            </div>
            <li class="nav-item">
                <a class="nav-link" href="accesos.php">
                    <i class="fas fa-duotone fa-key"></i>
                    <span>Accesos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                    <i class="fas fa-light fa-users"></i>
                    <span>Usuarios</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="grados.php">
                    <i class="fas fa-solid fa-graduation-cap"></i>
                    <span>Grados</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="alumno_grado.php">
                    <i class="fas fa-light fa-users"></i>-
                    <i class="fas fa-solid fa-graduation-cap"></i>
                    <span>Alumno-Grado</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="materias.php">
                    <i class="fas fa-regular fa-chalkboard"></i>
                    <span>Materias</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="grado_materia.php">
                    <i class="fas fa-solid fa-graduation-cap"></i>-
                    <i class="fas fa-regular fa-chalkboard"></i>
                    <span>Grado-Materia</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="profesor_materia.php">
                    <i class="fas fa-light fa-users"></i>-
                    <i class="fas fa-regular fa-chalkboard"></i>
                    <span>Profesor-Materia</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reportes.php">
                    <i class="fas fa-solid fa-chart-line"></i>
                    <span>Reportes</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex mb-4"></div>
                    <!-- Content Row -->
                    <div class="row">
                        <h3 style="width: 100%;text-align:center">Materias impartidas por Profesores</h3>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <!--TABLA DE REGISTROS-->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Grado Materia</th>
                                            <th scope="col">Profesor</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                        <?php foreach ($profmate as $pm) { $id = $pm['id_profesor_materia']; $mat = $pm['mat']; $prof = $pm['nombreC']; ?>
                                            <tr>
                                                <td scope="row"><?php echo $id; ?></td>
                                                <td><?php echo $mat; ?></td>
                                                <td><?php echo $prof; ?></td>
                                                <td>
                                                    <button class='btn btn-danger eliminar' data-id='<?php echo $id; ?>'>Eliminar</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!---->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <!--FORMULARIO PARA GUARDAR-->
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Profesor:</label>
                                            <div class="col-sm-8">
                                                <select class="form-select form-control" id="idProfe">
                                                     <?php foreach ($profesores as $f) {
                                                        $id = $f['id_usuario'];
                                                        $nombre = $f['nombreC'];?>
                                                        <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Grado y Materia:</label>
                                            <div class="col-sm-8">
                                                <select class="form-select form-control" id="idGradMat">
                                                    <?php foreach ($gradmat as $gm) {
                                                        $id = $gm['id_grado_materia'];
                                                        $nombre = $gm['nombre_grado']." ".$gm['nombre_materia'];?>
                                                        <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button id="guardarGM" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; UES 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="confirmarEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" id="cancelar" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancelar" id="cancelar" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="eliminarRegistro">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Realmente quiere salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>