<?php

require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

if (isset($_GET['orden'])) {
    $orden = $_GET['orden'];
}

$filtroIdEmpleado = isset($_GET['filtroIdEmpleado']) ? $_GET['filtroIdEmpleado'] : "";
$filtroTelefono = isset($_GET['filtroTelefono']) ? $_GET['filtroTelefono'] : "";
$filtroApellido = isset($_GET['filtroApellido']) ? $_GET['filtroApellido'] : "";
$filtroArea = isset($_GET['filtroArea']) ? $_GET['filtroArea'] : "";
$filtroNombre = isset($_GET['filtroNombre']) ? $_GET['filtroNombre'] : "";
$filtroFechaAlta = isset($_GET['filtroFechaAlta']) ? $_GET['filtroFechaAlta'] : "";

$sql = "select * from empleados where ";
$sql = $sql . "idEmpleado like '%" . $filtroIdEmpleado . "%' and ";
$sql = $sql . "telefono like '%" . $filtroTelefono . "%' and ";
$sql = $sql . "apellido like '%" . $filtroApellido . "%' and ";
$sql = $sql . "area like '%" . $filtroArea . "%' and ";
$sql = $sql . "nombre like '%" . $filtroNombre . "%' and ";
$sql = $sql . "fechaAlta like '%" . $filtroFechaAlta . "%'";

$sql = $sql . " order by " . $orden;

if (!($resultado = $mysqli->query($sql))) {

    die();
}

$resultadoCuentaRegistros = $resultado->num_rows;

$empleados = [];

while ($fila = $resultado->fetch_assoc()) {
    $objEmpleado = new stdClass();
    $objEmpleado->idEmpleado = $fila['idEmpleado'];
    $objEmpleado->apellido = $fila['apellido'];
    $objEmpleado->telefono = $fila['telefono'];
    $objEmpleado->area = $fila['area'];
    $objEmpleado->nombre = $fila['nombre'];
    $objEmpleado->fechaAlta = $fila['fechaAlta'];
    $objEmpleado->pdf = base64_encode($fila['pdf']);

    array_push($empleados, $objEmpleado);
}

$objEmpleados = new stdClass();
$objEmpleados->empleados = $empleados;
$objEmpleados->cuenta = $resultadoCuentaRegistros;

$salidaJson = json_encode($objEmpleados);
$mysqli->close();
echo $salidaJson;
