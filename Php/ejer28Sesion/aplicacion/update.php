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

$today = (new DateTime('America/New_York'))->format('d/m/y/ h:i:s');
$sesion = $_SESSION["idDeSesion"];
echo json_encode("<h1>Modificación exitosa!</h1><br/>
    <div>Hora(en el servidor) de la modificación: $today</div><br/>
    <div>Id sesión: $sesion<div><br/>
    <div>Id: $idEmpleado</div><br/>
    <div>Tel: $telefono</div><br/>
    <div>Apellido: $apellido</div><br/>
    <div>Area: $area</div><br/>
    <div>Nombre: $nombre</div><br/>
    <div>Fecha de Alta: $fechaAlta</div>");
