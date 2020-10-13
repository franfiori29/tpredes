<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Todo lo escrito fuera de las marcas es entregado sin pasar por el procesador php</h2>
    <hr>
    <?php
    echo "<h2>Todo texto y/o HTML <span style='color:blue'>entregado por el proc php</span> usando la sentencia echo</h2>";
    echo "<hr />";
    $mivariable = "valor1";
    echo "<h2>Sin usar concatenador <span>\$mivariable=</span> $mivariable</h2>";
    echo "<h2>Con concatenador <span>\$mivariable= </span>" . $mivariable . "</h2>";
    echo "<hr />";
    $mivariable = true;
    echo "<h2>Variable de tipo boolean(verdadero) <span>\$mivariable=</span> $mivariable </h2>";
    $mivariable = false;
    echo "<h2>Variable de tipo boolean(falso) <span>\$mivariable=</span> $mivariable </h2>";
    echo "<hr />";
    define("MICONSTANTE", "valorConstante");
    echo "<h2><span>MICONSTANTE: </span>" . MICONSTANTE . "</h2>";
    echo "<hr />";
    $palabraIdiomas = ["chau", "bye"];
    echo "<h2><span>\$palabraIdiomas[0]= </span>" . $palabraIdiomas[0] . "</h2>";
    echo "<h2><span>\$palabraIdiomas[1]= </span>" . $palabraIdiomas[1] . "</h2>";
    echo "<h2>Tipo de <span>\$palabraIdiomas= </span>" . gettype($palabraIdiomas) . "</h2>";
    echo "<h2>Por programa se agregan dos elementos nuevos</h2>";

    array_push($palabraIdiomas, "ciao");
    array_push($palabraIdiomas, "Sayōnara");

    echo "<h2>Todos los elementos originales y agregados:</h2>";
    ?>

    <ul>
        <?php
        foreach ($palabraIdiomas as $palabra) {
            echo "<li>$palabra</li>";
        }
        ?>
    </ul>

    <?php
    echo "<h2>Arreglo de dos dimensiones (dicc)</h2>";
    $array1 = ["hola", "hey", "ciao", "bonjour"];
    $array2 = ["chau", "bye", "arrivederci", "au revoir"];
    $array3 = ["casa", "home", "casa", "maison"];
    $aDiccionarioBasico[0] = $array1;
    $aDiccionarioBasico[1] = $array2;
    $aDiccionarioBasico[2] = $array3;
    ?>
    <table>
        <tr>
            <th>Español</th>
            <th>Inglés</th>
            <th>Italiano</th>
            <th>Francés</th>
        </tr>
        <?php

        foreach ($aDiccionarioBasico as $diccionarioHijo) {
            echo "<tr>";
            foreach ($diccionarioHijo as $palabra) {
                echo "<td>$palabra</td>";
            }
            echo "</tr>";
        }


        ?>
    </table>
    <?php
    echo "<h2>También así se puede expresar el valor de \$aDiccionarioBasico[1][3]: " . $aDiccionarioBasico[1][3] . "</h2>";
    echo "<h2>cantidad de elementos del diccionario: " . sizeof($aDiccionarioBasico) . "</h2>";
    ?>
    <h1>Variables tipo arreglo asociativo</h1>
    <?php
    $articulo = ["codigo" => 0001, "descripcion" => "iPhone 10", "precio" => 1000, "cantidad" => 2];
    echo "Código de articulo: " . $articulo["codigo"] . "<br>";
    echo "Descr de articulo: " . $articulo["descripcion"] . "<br>";
    echo "Precio de articulo: " . $articulo["precio"] . "<br>";
    echo "Cantidad de articulo: " . $articulo["cantidad"] . "<br><br>";
    echo "Cantidad de elementos: " . sizeof($articulo) . "<br>";
    echo "Tipo de array: " . gettype($articulo) . "<br>";
    ?>
    <hr>
    <h2>Expresiones aritméticas</h2>
    <?php
    $x = 3;
    $y = 4;
    $z = $x + $y;
        
    echo "<h2>Valor de \$x: " . $x  . "</h2>";
    echo "<h2>Valor de \$y: " . $y  . "</h2>";
    echo "<h2>Tipo de \$x: " . gettype($x)  . "</h2>";
    echo "<h2>Tipo de \$y: " . gettype($y)  . "</h2>";

    echo "<h2>Suma de \$x y \$y: " . ($y + $x)  . "</h2>";
    echo "<h2>Multiplicación de \$x y \$y: " . ($y * $x)  . "</h2>";
    echo "<h2>División de \$x y \$y: " . ($x / $y)  . "</h2>";


    ?>
</body>

</html>