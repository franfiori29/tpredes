<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej4</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Variables del servidor</h1>

    <table>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['SERVER_ADDR']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['SERVER_ADDR'];
                ?>
            </td>
        </tr>
        <tr>

        </tr>
    </table>
    <?php
    echo "\$_SERVER['SERVER_ADDR']";
    ?>
    $_SERVER['SERVER_PORT'];
    $_SERVER['SERVER_NAME'];
    $_SERVER['SERVER_ROOT'];


    <h1>Variables del cliente</h1>

    <h1>Variables de requerimiento</h1>

    <h1>TODAS</h1>


</body>

</html>