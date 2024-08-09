<?php

include '../bd/db.php';

$id = $_GET['id'];
$db = new Database();
$cita = $db->getCita($id);
$doctores = $db->getDoctores();
$especialidades = $db->getEspecialidades();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor = $_POST['doctor'];
    $especialidad = $_POST['especialidad'];
    $sala = $_POST['sala'];
    $notas = $_POST['notas'];
    $fecha = $_POST['fecha'];

    if ($db->updateCita($id, $doctor, $especialidad, $sala, $notas, $fecha)) {
        header("Location: citas.php");
    } else {
        echo "Error al actualizar la cita.";
    }
}

?>

<?php include '../includes/headerAdmini.php'; ?>

<br>
<br>
<br>

<div class="container">
    <h1 class="mt-4">Editar Cita</h1>
    <form action="editar.php?id=<?= $id ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label><br>
            <label class="form-label"><?= $cita['Paciente'] ?></label>
        </div>
        <div class="mb-3">
            <label for="especialidad">Doctor:</label>

            <select name="doctor" id="doctor">
                <?php foreach ($doctores as $doctor) : ?>
                    <option value="<?= $doctor['id'] ?>"><?= $doctor['nombre']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="especialidad">Especialidad:</label>

            <select name="especialidad" id="especialidad">
                <?php foreach ($especialidades as $especialidad) : ?>
                    <option value="<?= $especialidad['idespecialidad'] ?>"><?= $especialidad['nombre']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="sala" class="form-label">Sala</label>
            <input type="text" class="form-control" id="sala" name="sala" value="<?= $cita['Sala'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="notas" class="form-label">Notas</label>
            <textarea type="text" class="form-control" id="notas" name="notas"><?= $cita['Notas'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="datetime-local" class="form-control" id="fecha" name="fecha" value="<?= $cita['fecha'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>


    <?php include '../includes/footer.php'; ?>
</div>


