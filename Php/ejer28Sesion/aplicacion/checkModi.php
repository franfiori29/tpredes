<?php
include("../manejoSesion.inc");
?>
<?php

require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_GET['idEmpleado'];

$sql = "select * from empleados where idEmpleado = " . $idEmpleado;

if (!($resultado = $mysqli->query($sql))) {

    die();
}

if ($resultado->num_rows == 0) {
    $mysqli->close();
    echo 0;
} else {
    echo 1;
}
