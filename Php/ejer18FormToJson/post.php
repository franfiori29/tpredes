<?php
sleep(3);
if ($_POST) {
    $objetoJSON = new stdclass;
    $objetoJSON->idUsuario = $_POST['idUsuario'];
    $objetoJSON->login = $_POST['login'];
    $objetoJSON->apellido = $_POST['apellido'];
    $objetoJSON->nombre = $_POST['nombre'];
    $objetoJSON->fechaNac = $_POST['fechaNac'];

    echo json_encode($objetoJSON);
}
