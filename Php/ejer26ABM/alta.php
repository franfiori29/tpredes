<?php

require("./constantesBase.php");


$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_POST['idEmpleado'];
$telefono = $_POST['telefono'];
$apellido = $_POST['apellido'];
$area = $_POST['area'];
$nombre = $_POST['nombre'];
$fechaAlta = $_POST['fechaAlta'];


$sentencia = $mysqli->prepare("insert into empleados values(?,?,?,?,?,?)");

$sentencia->bind_param('iissss', $idEmpleado, $telefono, $apellido, $area, $nombre, $fechaAlta);

$sentencia->execute();





$mysqli->close();
