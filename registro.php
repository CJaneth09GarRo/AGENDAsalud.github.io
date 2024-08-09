<?php

include_once 'bd/db.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $app = $_POST['APpa'];
    $apm = $_POST['APma'];
    $fecha = $_POST['Fecha'];
    $mail = $_POST['Mail'];
    $pass = $_POST['Pass'];
    $pass2 = $_POST['Pass2'];

    $ValiCorreo = $db->validarCorreo($mail);

    if ($ValiCorreo == 0) {
        if ($pass == $pass2) {
            if ($db->insertarUsuarioPaciente($name, $app, $apm, $mail, md5($pass), $fecha)) {
                $getUsu = $db->getIdUsuario($mail);
                $db->insertarPaciente($getUsu['id']);
                header("Location: login.php");
            } else {
                echo "Error al ingresar usuario";
            }
        } else {
            echo "Las contraseñas no coinciden";
        }
    } else {
        echo "Ese correo ya esta registrado";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Registrate</title>
</head>

<body style="background-color: aliceblue;">



    <div class="container">

        <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">

                <div class="d-flex justify-content-center py-3 align-items-center">
                        <img src="img/logo.png" width="170">
                        <p style="font-weight: bold; text-align:center; font-size: 20px;">¡Registrate con nosotros!</p>
                    </div>


                    <form action="registro.php" method="post" class="p-4 col-8 border shadow" style="border-radius: 15px; background-color: rgb(255, 255, 255)">
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-4">
                                <label for="APpa" class="form-label">Apellido paterno</label>
                                <input type="text" class="form-control" id="APpa" name="APpa" required>
                            </div>
                            <div class="col-4">
                                <label for="APma" class="form-label">Apellido materno</label>
                                <input type="text" class="form-control" id="APma" name="APma" required>
                            </div>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="Fecha" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="Fecha" name="Fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="Mail" class="form-label">Correo electronico</label>
                            <input type="email" class="form-control" id="Mail" name="Mail" required>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="Pass" class="form-label">Contraseña</label>
                                <input type="password" class="form-control text-center" id="Pass" name="Pass" required minlength="8">
                            </div>
                            <div class="col-6">
                                <label for="Pass2" class="form-label">Confirmar contraseña</label>
                                <input type="password" class="form-control text-center" id="Pass2" name="Pass2" required>
                            </div>

                        </div>
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="Acept" name="Acept" required>
                            <label for="Acept" class="form-label">Acepto los terminos y condiciones</label>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button class="btn btn-primary w-100 shadow" type="submit">Registrar</button><br><br>
                                <p class="small mb-0">¿Ya tienes un cuenta?<a href="login.php"> Inicia sesion</a></p>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>