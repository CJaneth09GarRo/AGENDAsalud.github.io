<?php
include 'db.php';

$id = $_GET['id'];
$pag = $_GET['pag'];
$db = new Database();

if ($db->deleteCita($id)) {
    if($pag==3){
        header("Location: ../pacientes/citas.php");
    }elseif($pag==2){
        header("Location: ../doctores/citas.php");
    }elseif($pag==1){
        header("Location: ../administradores/citas.php");
    }

} else {
    echo "Error al eliminar la cita.";
}
?>