<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../includes/styles.css">
    <link rel="stylesheet" type="text/css" href="../includes/stylesReg.css">

    <!-- sidebar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- fin Sidebar -->

    <title>Agenda Medica</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"><img src="../img/user.png" alt=""></div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="inicio.php" class="nav_logo"> <i class='bx bx-plus-medical nav_logo-icon'></i> <span class="nav_logo-name">Clínica Sevilla</span> </a>
                <div class="nav_list">
                    <a href="inicio.php" class="nav_link"> <i class='bx bx-home-alt nav_icon'></i><span class="nav_name">Inicio</span></a>
                    <a href="citas.php" class="nav_link"> <i class='bx bx-calendar nav_icon'></i><span class="nav_name">Calendario</span></a>
                    <a href="Agendar.php" class="nav_link"> <i class='bx bx-comment-add nav_icon'></i><span class="nav_name">Nueva cita</span></a>
                </div>
            </div>
            <a href="../bd/cerrarSesion.php" class="nav_link" data-bs-toggle="modal" data-bs-target="#cerrarModal"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesion</span> </a>
        </nav>
    </div>


    <div class="modal fade" id="cerrarModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Cerrar sesion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea cerrar sesion?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="../bd/cerrarSesion.php" id="confirmDelete" class="btn btn-info">Salir</a>
                </div>
            </div>
        </div>
    </div>




    <!--Container Main start-->