<?php

include_once '../bd/db.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $app = $_POST['APpa'];
    $apm = $_POST['APma'];
    $fecha = $_POST['Fecha'];
    $mail = $_POST['Mail'];
    $pass = $_POST['Pass'];
    $pass2 = $_POST['Pass2'];
    $rol = $_POST['Rol'];

    $ValiCorreo = $db->validarCorreo($mail);

    if ($ValiCorreo == 0) {
        if ($pass == $pass2) {
            if ($db->insertarUsuario($name, $app, $apm, $mail, md5($pass), $fecha, $rol)) {
                $getUsu = $db->getIdUsuario($mail);
                if($rol == 2){
                    $db->insertarDoctor($getUsu['id']);
                }elseif($rol == 3){
                    $db->insertarPaciente($getUsu['id']);
                }
                
                header("Location: usuarios.php");
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

<?php include '../includes/headerAdmin.php'; ?>

<br>
<br>
<br>

<div class="container">
    <h1 class="mt-4">Registrar nuevo Usuario</h1>
    <form action="newUser.php" method="post">
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
        <div class="mb-3 row">
            <div class="col-3">
                <label for="Fecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" required>
            </div>
            <div class="col-1"></div>
            <div class="col-3">
                <label for="Rol" class="form-label">Tipo de usuario</label><br>
                <select name="Rol" id="Rol" class="form-select form-select-sm">
                    <option value="1">Administrador</option>
                    <option value="2">Doctor</option>
                    <option value="3">Paciente</option>
                </select>
            </div>
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
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <button class="btn btn-primary w-100 shadow" type="submit">Registrar</button><br><br>
            </div>
            <div class="col-4"></div>
        </div>
    </form>
</div>


<?php include '../includes/footer.php'; ?>