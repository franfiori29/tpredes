<?php

require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_POST['idEmpleado'];
$telefono = $_POST['telefono'];
$apellido = $_POST['apellido'];
$area = $_POST['area'];
$nombre = $_POST['nombre'];
$fechaAlta = $_POST['fechaAlta'];

$sentencia = $mysqli->prepare("update empleados set telefono=?,apellido=?,area=?,nombre=?,fechaAlta=? where idEmpleado=?;");

$sentencia->bind_param('issssi', $telefono, $apellido, $area, $nombre, $fechaAlta, $idEmpleado);

$sentencia->execute();
$mysqli->close();
