<?php

session_start();
include '../bd/db.php';
$db = new Database();


$pacientes = $db->getAllPacientes();

$doctores = $db->getDoctores();
$especialidades = $db->getEspecialidades();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['paciente'];
    $doctor = $_POST['doctor'];
    $especialidad = $_POST['especialidad'];
    $sala = $_POST['sala'];
    $notas = $_POST['notas'];
    $fecha = $_POST['fecha'];

    if ($db->createCita($id, $doctor, $especialidad, $sala, $fecha, $notas)) {
        header("Location: citas.php");
    } else {
        echo "Error al registrar la cita.";
    }
}

?>

<?php include '../includes/headerAdmin.php'; ?>


<br>
<br>
<br>

<div class="container">
    <h1 class="mt-4">Agendar cita nueva</h1>
    <form action="Agendar.php" method="post">
        <div class="mb-3">
            <label class="paciente">Paciente</label><br>
            <!-- <input type="text" id="colors" name="colors" list="colors-list" accesskey="c" tabindex="1">
            <datalist id="colors-list" class="custom-colors" title="List of available colors">
               <?php foreach ($pacientes as $paciente) : ?>
                    <option value="<?= $paciente['id'] ?>, <?= $paciente['nombre'] ?>">
                    <?php endforeach; ?>
            </datalist> -->

            <select class="col-7" id="paciente" name="paciente">
                <?php foreach ($pacientes as $paciente) : ?>
                    <option value="<?= $paciente['paciente']; ?>"><?= $paciente['nombre'] ?>, ID: <?= $paciente['paciente'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="especialidad">Doctor:</label>

            <select name="doctor" id="doctor">
                <?php foreach ($doctores as $doctor) : ?>
                    <option value="<?= $doctor['id'] ?>"><?= $doctor['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="especialidad">Especialidad:</label>

            <select name="especialidad" id="especialidad">
                <?php foreach ($especialidades as $especialidad) : ?>
                    <option value="<?= $especialidad['idespecialidad'] ?>"><?= $especialidad['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="sala" class="form-label">Sala</label>
            <input type="text" class="form-control" id="sala" name="sala" required>
        </div>
        <div class="mb-3">
            <label for="notas" class="form-label">Notas</label>
            <textarea type="text" class="form-control" id="notas" name="notas"></textarea>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Fecha</label>
            <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="inicio.php"><input type="button" class="btn btn-secondary" value="Cancelar"></a>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#paciente').select2();
    });
</script>

<?php include '../includes/footer.php'; ?>