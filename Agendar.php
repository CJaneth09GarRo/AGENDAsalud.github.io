<?php 

session_start();
include '../bd/db.php';
$db = new Database();


$paciente = $db->getPaciente($_SESSION['Usuario']);

$doctores = $db->getDoctores();
$especialidades = $db->getEspecialidades();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor = $_POST['doctor'];
    $especialidad = $_POST['especialidad'];
    $sala = $_POST['sala'];
    $notas = $_POST['notas'];
    $fecha = $_POST['fecha'];

    if ($db->createCita($paciente['idpacientes'], $doctor, $especialidad, $sala, $fecha, $notas)) {
        header("Location: citas.php");
    } else {
        echo "Error al registrar la cita.";
    }
}

?>

<?php include '../includes/header.php'; ?>
<br>
<br>
<br>

<div class="container">
    <h1 class="mt-4">Agendar cita nueva</h1>
    <form action="Agendar.php" method="post">
        <div class="mb-3">
            <h5><label class="form-label">Nombre:</label></h5>
            <h3><label class="form-label"><?= $paciente['nombre']?> <?= $paciente['ap_paterno']?> <?= $paciente['ap_materno']?></label></h3>
        </div>
        <div class="mb-3">
            <label for="especialidad">Doctor:</label>

            <select name="doctor" id="doctor" class="form-select">
                <?php foreach ($doctores as $doctor) : ?>
                    <option value="<?= $doctor['id'] ?>"><?= $doctor['nombre']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="especialidad">Especialidad:</label>

            <select name="especialidad" id="especialidad" class="form-select">
                <?php foreach ($especialidades as $especialidad) : ?>
                    <option value="<?= $especialidad['idespecialidad'] ?>"><?= $especialidad['nombre']?></option>
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
    </form><br>
    
</div>


<?php include '../includes/footer.php'; ?>