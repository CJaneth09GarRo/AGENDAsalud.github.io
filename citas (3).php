<?php
session_start();
include '../bd/db.php';

$db = new DAtabase();

$citas = $db->getAllCitas();

?>

<?php include '../includes/headerAdmin.php'; ?>


<!--Container Main start-->
<div class="height-100 bg-light">
    <br>
    <br>
    <br>
    <div class="container">
        <h1 class="mt-4">Citas agendadas vista administrador</h1>
        <br>
        <table class="table table-bordered" id="Mitabla">
            <thead>
                <tr style="text-align: center;">
                    <th>Cita</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Especialidad</th>
                    <th>Sala</th>
                    <th>Notas</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $cita) : ?>
                    <tr>
                        <td class="col-1"><?= $cita['N_Cita'] ?></td>
                        <td class="col-2"><?= $cita['Paciente'] ?></td>
                        <td class="col-2"><?= $cita['Doctor'] ?></td>
                        <td class="col-1"><?= $cita['Especialidad'] ?></td>
                        <td class="col-1"><?= $cita['Sala'] ?></td>
                        <td class="col-2"><?= $cita['Notas'] ?></td>
                        <td class="col-2"><?= $cita['fecha'] ?></td>
                        <td class="col-1">
                            <a href="editar.php?id=<?= $cita['N_Cita'] ?>" class="btn btn-warning">
                                <img src="../img/editar.png" alt="Icono Editar">
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $cita['N_Cita'] ?>">
                                <a>
                                    <img src="../img/borrar.png" alt="Icono Eliminar">
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <?php include '../includes/footer.php'; ?>
</div>
<!--Container Main end-->


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea Eliminar esta cita?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="#" id="Delete" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>


<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var Id = button.getAttribute('data-id')
        var confirmDelete = document.getElementById('Delete')
        confirmDelete.href = '../bd/eliminar.php?id=' + Id +'&pag=1'
    })
</script>
</script>