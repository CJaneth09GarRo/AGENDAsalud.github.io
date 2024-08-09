<?php
session_start();
include '../bd/db.php';

$db = new DAtabase();

$usuarios = $db->getAllUsuarios();

?>

<?php include '../includes/headerAdmin.php'; ?>


<!--Container Main start-->
<div class="height-100 bg-light">
    <br>
    <br>
    <br>
    <div class="container">
        <h1 class="mt-4">Usuarios vista administrador</h1>
        <br>
        <button class="btn btn-success">
            <a href="newUser.php" style="text-decoration: none; color: inherit;" class="p-2">
                <img src="../img/agregar.png" alt="Icono agregar">
                Crear usuario
            </a>
        </button><br><br>
        <table class="table table-bordered" id="Mitabla">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Email</th>
                    <th>Fecha de nacimiento</th>
                    <th>Rol de usuario</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td class="col-1"><?= $usuario['id'] ?></td>
                        <td class="col-2"><?= $usuario['nombre'] ?></td>
                        <td class="col-2"><?= $usuario['ap_paterno'] ?></td>
                        <td class="col-2"><?= $usuario['ap_materno'] ?></td>
                        <td class="col-1"><?= $usuario['email'] ?></td>
                        <td class="col-1"><?= $usuario['fecha_nacimiento'] ?></td>
                        <td class="col-1"><?= $usuario['rolname'] ?></td>
                        <td class="col-1">
                            <a href="editUsuario.php?id=<?= $usuario['id'] ?>" class="btn btn-warning">
                                <img src="../img/editar.png" alt="Icono Editar">
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $usuario['id'] ?>">
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
                <a href="#" id="confirmDelete" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>

</div>


<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var Id = button.getAttribute('data-id')
        var confirmDelete = document.getElementById('confirmDelete')
        confirmDelete.href = '../bd/eliminar.php?id=' + Id + '&pag=1'
    })
</script>