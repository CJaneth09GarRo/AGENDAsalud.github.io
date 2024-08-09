<?php

session_start();
include_once 'bd/db.php';

$db = new Database();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['Mail'];
    $pass = $_POST['Pass'];

    $resultado = $db->validarUsuario($usuario, md5($pass));

    if ($resultado == 1) {
        $getUsu = $db->getIdUsuario($usuario);
        $_SESSION['Usuario'] = $getUsu['id'];
        $_SESSION['Rol'] = $db->validarRol($usuario, md5($pass));
        $rol = $_SESSION['Rol'];

        if ($rol == 1) {
            header("Location: administradores/inicio.php");
        } elseif ($rol == 2) {
            header("Location: doctores/inicio.php");
        } elseif ($rol == 3) {
            header("Location: pacientes/inicio.php");
        }
    } else {
        echo "Error al ingresar";
        echo "Credenciales no validas";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Inicio de sesion</title>
</head>

<body style="background-color: aliceblue;">



    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">

                    <!-- <div class="d-flex justify-content-center py-4">
                        <a>
                            <img  src="img/logo.png" alt="">
                        </a>
                    </div> -->
                    <div class="d-flex justify-content-center py-3 align-items-center">
                        <img src="img/logo.png" width="170">
                        <p style="font-weight: bold; text-align:center; font-size: 20px;">¡Que gusto verte otra vez!<br>Inicia ahora tu sesión</p>
                    </div>


                    <form action="login.php" method="post" class="p-5 col-4 border shadow" style="border-radius: 15px; background-color: rgb(255, 255, 255)">
                    <div class="mb-3">
                            <label for="Mail" class="form-label">Correo electronico</label>
                            <input type="email" class="form-control" id="Mail" name="Mail" placeholder="Ej. ricardo.lara@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="Pass" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="Pass" name="Pass" placeholder="Ingresa tu contraseña"required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Acceder</button>
                        </div>
                        <div class="col-12 py-2">
                            <p class="small">¿No tienes una cuenta? <a href="registro.php">Crea una cuenta</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>