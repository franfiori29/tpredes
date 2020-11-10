<?php
include("../manejoSesion.inc");
?>
<?php

require("./constantesBase.php");
error_reporting(0);

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_POST['altaID'];
$telefono = $_POST['altaTelefono'];
$apellido = $_POST['altaApellido'];
$area = $_POST['altaArea'];
$nombre = $_POST['altaNombre'];
$fechaAlta = $_POST['altaFechaAlta'];
$pdf = $_FILES['altaPdf'] ? file_get_contents($_FILES['altaPdf']['tmp_name']) : "";

$sentencia = $mysqli->prepare("insert into empleados values(?,?,?,?,?,?,?)");

$sentencia->bind_param("iisssss", $idEmpleado, $telefono, $apellido, $area, $nombre, $fechaAlta, $pdf);

$sentencia->execute();

$today = (new DateTime('America/New_York'))->format('d/m/y/ h:i:s');
$sesion = $_SESSION["idDeSesion"];
echo json_encode("<h1>Alta exitosa!</h1><br/>
    <div>Hora(en el servidor) del alta: $today</div><br/>
    <div>Id sesión: $sesion<div><br/>
    <div>Id: $idEmpleado</div><br/>
    <div>Tel: $telefono</div><br/>
    <div>Apellido: $apellido</div><br/>
    <div>Area: $area</div><br/>
    <div>Nombre: $nombre</div><br/>
    <div>Fecha de Alta: $fechaAlta</div>");

$mysqli->close();
