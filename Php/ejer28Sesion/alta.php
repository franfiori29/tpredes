<?php

require("./constantesBase.php");


$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_POST['altaID'];
$telefono = $_POST['altaTelefono'];
$apellido = $_POST['altaApellido'];
$area = $_POST['altaArea'];
$nombre = $_POST['altaNombre'];
$fechaAlta = $_POST['altaFechaAlta'];
$pdf = $_FILES['altaPdf'] ? file_get_contents($_FILES['altaPdf']['tmp_name']) : "";

$sentencia = $mysqli->prepare("insert into empleados values(?,?,?,?,?,?,?)");

$sentencia->bind_param('iisssss', $idEmpleado, $telefono, $apellido, $area, $nombre, $fechaAlta, $pdf);

$sentencia->execute();

$mysqli->close();
