<?php
include("../manejoSesion.inc");
require("./constantesBase.php");

$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$idEmpleado = $_GET['idEmpleado'];

$sql = "delete from empleados where idEmpleado = " . $idEmpleado;

$mysqli->query($sql);
$mysqli->close();

$today = (new DateTime('America/New_York'))->format('d/m/y/ h:i:s');
$sesion = $_SESSION["idDeSesion"];
echo json_encode("<h1>Borrado exitoso!</h1><br/>
    <div>Hora(en el servidor) de la eliminación: $today</div><br/>
    <div>Id sesión: $sesion<div><br/>
    <div>Id: $idEmpleado</div><br/>");
