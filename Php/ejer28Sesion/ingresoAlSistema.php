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
    $cantidad  =  (int)file_get_contents('contadorsesion.txt');
    if (!isset($_SESSION["idDeSesion"])) {
        $_SESSION["idDeSesion"] = session_id();
        $cantidad  =  $cantidad + 1;
        $contador = fopen("contadorsesion.txt", "w+") or die("no se pudo abrir");
        file_put_contents('contadorsesion.txt', $cantidad);
        fclose($contador);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ingresado</title>
    </head>

    <body>
        <h1>Acceso permitido</h1>
        <h3>Sus parámetros: </h3>
        <h1>Información de sesión: </h1>
        <h3>identification de sesión: <?php echo $_SESSION["idDeSesion"] ?></h3>
        <h3>Login de usuario: <?php echo $username  ?> </h3>
        <h3>Contador de sesión <?php echo $cantidad ?></h3>
        <button><a href="./index.php">Ingresar</a></button>
        <button><a href="./destruirsesion.php">Cerrar Sesión</a></button>
    </body>

    </html>
<?php
} else {
    header("location:formularioLogin.html");
}


$mysqli->close();
