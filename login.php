<?php session_start(); ?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de notas</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">

    
                        
                            <div class="card col-lg-3 ">
                                <div class="p-5" style="width: 100%;">
                                    <div class="d-flex justify-content-center ">
                                        <img src="img/logo_Escolar.png" alt="logo" style="width:60%;margin:1rem;">
                                    </div>
                                    
                                    <?php include("controllers/login.php"); ?>
                                    <form class="user" method="POST" id="login-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="usuario" name="usuario" placeholder="Usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="contra" name="contra" placeholder="Contraseña" required>
                                        </div>
                                        <input type="submit" value="Iniciar sesión" name="btnLogin" class="btn btn-block btn-primary">
                                    </form>
                                </div>
                            </div>
                   



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>