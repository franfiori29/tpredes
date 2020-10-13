<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>función Include() no llamada</h1>
    <h1>Las variables son: </h1>
    <?php
    echo $arreglo1;
    echo $arreglo1;
    echo $arreglo1;
    echo $arreglo2;
    echo $arreglo2;
    echo $arreglo2;

    require "./aIncluir.inc";

    echo "<h2>Aquí ya se ejecutó la include()</h2>";
    echo "<h2>Las 2 variables de array asociativo son: </h2>";

    ?>
    <table>
        <tr>
            <?php
            foreach ($arreglo1 as $clave => $valor) {
                echo "<td>" . $valor . "</td>";
            };
            ?>
        </tr>
        <tr>
            <?php
            foreach ($arreglo2 as $clave => $valor) {
                echo "<td>" . $valor . "</td>";
            };
            ?>
        </tr>
    </table>
    <?php
    echo "<h2>Longitud de array: " . sizeof($arreglo1) . "</h2>"
    ?>


</body>

</html>