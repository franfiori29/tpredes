<?php

require("./aplicacion/constantesBase.php");


$mysqli = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sentencia = $mysqli->prepare("select * from usuarios where usuario=? and contrasenia=?");

$sentencia->bind_param('ss', $username, $password);

$sentencia->execute();

if ($sentencia->get_result()->num_rows) {
    session_start();
    $_SESSION["idDeSesion"] = session_id();
    header("location:index.php");
} else {
    header("location:formularioLogin.html");
}


$mysqli->close();
