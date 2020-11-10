<?php
include("../manejoSesion.inc");
?>
<?php

require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_POST['modiID'];
$telefono = $_POST['modiTelefono'];
$apellido = $_POST['modiApellido'];
$area = $_POST['modiArea'];
$nombre = $_POST['modiNombre'];
$fechaAlta = $_POST['modiFechaAlta'];
$pdf = $_FILES['modiPdf']['tmp_name'] != "" ? file_get_contents($_FILES['modiPdf']['tmp_name']) : "";

echo $idEmpleado . $telefono . $apellido . $area . $nombre . $fechaAlta;

if ($pdf == "") {
    $sentencia = $mysqli->prepare("update empleados set telefono=?,apellido=?,area=?,nombre=?,fechaAlta=? where idEmpleado=?;");

    $sentencia->bind_param('issssi', $telefono, $apellido, $area, $nombre, $fechaAlta, $idEmpleado);

    $sentencia->execute();
    $mysqli->close();
} else {
    $sentencia = $mysqli->prepare("update empleados set telefono=?,apellido=?,area=?,nombre=?,fechaAlta=?,pdf=? where idEmpleado=?;");

    $sentencia->bind_param('isssssi', $telefono, $apellido, $area, $nombre, $fechaAlta, $pdf, $idEmpleado);

    $sentencia->execute();
    $mysqli->close();
}
