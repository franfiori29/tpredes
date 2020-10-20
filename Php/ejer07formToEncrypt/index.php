<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ej 7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link href="styles.css" rel="stylesheet">

</head>

<body>

    <?php
    if (isset($_POST["string"])) {
        $raw = $_POST["string"];
        $md5 = md5($raw);
        $sha1 = sha1($raw);

        echo '
                <section>
                <strong>Clave:</strong> ' . $raw . '<br><br>
                <strong>Clave encriptada en md5 (128 bits o 16 pares hexadecimales):</strong><br> ' . $md5 . '<br><br>
                <strong>Clave:</strong> ' . $raw . '<br><br>
                <strong>Clave encriptada en sha1 (160 bits o 20 pares hexadecimales):</strong><br> ' . $sha1 . '
                </section>
                ';
    } else {
    ?>

        <section>
            <form action="index.php" method="POST">
                Ingrese la clave a encriptar: <input type="text" name="string"><br><br>
                <input type="submit" value="Obtener encriptación" id="boton">
            </form>
        </section>

    <?php
    } ?>

</body>

</html>