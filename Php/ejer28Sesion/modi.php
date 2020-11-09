<?php

require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_GET['idEmpleado'];

$sql = "select * from empleados where idEmpleado = " . $idEmpleado;

if (!($resultado = $mysqli->query($sql))) {

    die();
}

$empleado = [];

while ($fila = $resultado->fetch_assoc()) {
    $objEmpleado = new stdClass();
    $objEmpleado->idEmpleado = $fila['idEmpleado'];
    $objEmpleado->telefono = $fila['telefono'];
    $objEmpleado->apellido = $fila['apellido'];
    $objEmpleado->area = $fila['area'];
    $objEmpleado->nombre = $fila['nombre'];
    $objEmpleado->fechaAlta = $fila['fechaAlta'];
    $objEmpleado->pdf = base64_encode($fila['pdf']);

    array_push($empleado, $objEmpleado);
}
$mysqli->close();
$salidaJson = json_encode($objEmpleado);

echo $salidaJson;
