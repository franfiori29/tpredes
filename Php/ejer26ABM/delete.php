<?php

require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_GET['idEmpleado'];

$sql = "delete from empleados where idEmpleado = " . $idEmpleado;

$mysqli->query($sql);
$mysqli->close();
