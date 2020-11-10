<?php
include("../manejoSesion.inc");
?>
<?php

require("./constantesBase.php");
error_reporting(0);

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_GET['idEmpleado'];

$sql = "select * from empleados where idEmpleado = " . $idEmpleado;

if (!($resultado = $mysqli->query($sql))) {

    die();
}

if (($resultado->num_rows == 0)) {

    $mysqli->close();
    echo json_encode("allowed");
} else {
    while ($fila = $resultado->fetch_assoc()) {
        $idRepetido = $fila['idEmpleado'];
        $telefono = $fila['telefono'];
        $apellido = $fila['apellido'];
        $area = $fila['area'];
        $nombre = $fila['nombre'];
        $fechaAlta = $fila['fechaAlta'];
    }
    $today = (new DateTime('America/New_York'))->format('d/m/y/ h:i:s');
    $sesion = $_SESSION["idDeSesion"];
    echo json_encode("<h1>EL USUARIO CON ESE ID YA EXISTE</h1><br/>
    <div>Hora(en el servidor): $today</div><br/>
    <div>Id sesión: $sesion<div><br/>
    <div>Usuario repetido: </div><br/>
    <div>Id: $idRepetido</div><br/>
    <div>Tel: $telefono</div><br/>
    <div>Apellido: $apellido</div><br/>
    <div>Area: $area</div><br/>
    <div>Nombre: $nombre</div><br/>
    <div>Fecha de Alta: $fechaAlta</div>");

    $mysqli->close();
};
