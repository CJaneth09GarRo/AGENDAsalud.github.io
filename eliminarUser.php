<?php
include 'db.php';

$id = $_GET['id'];
$db = new Database();

if ($db->deleteUsuario($id)) {
    header("Location: ../citas.php");
} else {
    echo "Error al eliminar el producto.";
}
?>