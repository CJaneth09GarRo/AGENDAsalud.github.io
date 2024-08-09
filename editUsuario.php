<?php

include '../bd/db.php';

$id = $_GET['id'];
$db = new Database();
$usuario = $db->getUsuario($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $app = $_POST['APpa'];
    $apm = $_POST['APma'];
    $fecha = $_POST['Fecha'];
    $mail = $_POST['Mail'];
    $rol = $_POST['Rol'];

    $ValiCorreo = $db->validarCorreo($mail);


    if ($db->updateUsuario($id, $name, $app, $apm, $mail, $rol, $fecha)) {
        $getUsu = $db->getIdUsuario($mail);
        if ($rol == 2) {
            $db->insertarDoctor($getUsu['id']);
        } elseif ($rol == 3) {
            $db->insertarPaciente($getUsu['id']);
        }
        header("Location: usuarios.php");
    } else {
        echo "Error al editar usuario";
    }
}

?>

<?php include '../includes/headerAdmin.php'; ?>

<br>
<br>
<br>

<div class="container">
    <h1 class="mt-4">Editar Usuario</h1>
    <form action="editUsuario.php?id=<?= $id ?>" method="post">
        <div class="row mb-3">
            <div class="col-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?= $usuario['nombre'] ?>">
            </div>
            <div class="col-4">
                <label for="APpa" class="form-label">Apellido paterno</label>
                <input type="text" class="form-control" id="APpa" name="APpa" required value="<?= $usuario['ap_paterno'] ?>">
            </div>
            <div class="col-4">
                <label for="APma" class="form-label">Apellido materno</label>
                <input type="text" class="form-control" id="APma" name="APma" required value="<?= $usuario['ap_materno'] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-3">
                <label for="Fecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" required value="<?= $usuario['fecha_nacimiento'] ?>">
            </div>
            <div class="col-1"></div>
            <div class="col-3">
                <label for="Rol" class="form-label">Tipo de usuario</label><br>
                <select name="Rol" id="Rol" class="form-select form-select-sm" require>
                    <option value="3">Paciente</option>';
                    <option value="1">Administrador</option>';
                    <option value="2">Doctor</option>';
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="Mail" class="form-label">Correo electronico</label>
            <input type="email" class="form-control" id="Mail" name="Mail" required value="<?= $usuario['email'] ?>">
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <button class="btn btn-primary w-100 shadow" type="submit">Actualizar</button><br><br>
            </div>
            <div class="col-4"></div>
        </div>
    </form>
</div>


<?php include '../includes/footer.php'; ?>