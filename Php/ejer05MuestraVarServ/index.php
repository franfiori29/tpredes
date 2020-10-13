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
            <td>
                <?php
                echo "\$_SERVER['SERVER_PORT']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['SERVER_PORT'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['SERVER_NAME']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['SERVER_NAME'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['DOCUMENT_ROOT']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['DOCUMENT_ROOT'];
                ?>
            </td>
        </tr>
    </table>

    <h1>Variables del cliente</h1>

    <table>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['REMOTE_ADDR']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['REMOTE_ADDR'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['REMOTE_PORT']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['REMOTE_PORT'];
                ?>
            </td>
        </tr>
    </table>


    <h1>Variables de requerimiento</h1>

    <table>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['SCRIPT_NAME']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['SCRIPT_NAME'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo "\$_SERVER['REQUEST_METHOD']";
                ?>
            </td>
            <td>
                <?php
                echo $_SERVER['REQUEST_METHOD'];
                ?>
            </td>
        </tr>
    </table>

    <h1>TODAS</h1>

    <?php
    foreach ($_SERVER as $key => $value) {
        echo "<h4> $key" . " ==> " . "$value </h4>";
    }
    ?>

</body>

</html>