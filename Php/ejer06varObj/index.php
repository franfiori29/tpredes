<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej4</title>
    <link rel="stylesheet" href="style.css">

</head>


<body>
    <?php
    echo "<h1>Variables tipo objeto PHP. Objeto renglón de pedido</h1>";
    echo "<h1>\$objRenglonPedido</h1>";
    $objRenglonPedido = new stdclass;
    $objRenglonPedido->codigo = "1000";
    $objRenglonPedido->precio = 3000;

    $objRenglonPedido2 = new stdclass;
    $objRenglonPedido2->codigo = "1001";
    $objRenglonPedido2->precio = 4000;

    foreach ($objRenglonPedido as $key => $value) {
        echo $key . " : " . $value;
        echo "<br>";
    }

    echo "<h1>Tipo de <span>\$objRenglonPedido: </span>" . gettype($objRenglonPedido) . "</h1>";

    $renglonesPedido = [];
    echo "<h1 >\$renglonesPedido</h1>";
    echo "<h1> Tabula <span>\$renglonesPedido. </span>Recorrer el arreglo de renglones y tabularios con html:</h1>";

    array_push($renglonesPedido, $objRenglonPedido);
    array_push($renglonesPedido, $objRenglonPedido2);

    foreach ($renglonesPedido as $objRenglonPedido) {
        echo "Código: " . $objRenglonPedido->codigo . " | Precio: ";
        echo $objRenglonPedido->precio . "<br>";
    }
    echo "<h2>Cantidad de renglones: " . count($renglonesPedido) . "</h2>";
    $objRenglonesPedido = new stdClass();

    echo "<h1>Producción de un objeto <span>\$objRenglonesPedido</span> con dos atributos array renglonesPedido y cantidadDeRenglones</h1>";

    $objRenglonesPedido->renglonesPedido = $renglonesPedido;
    $objRenglonesPedido->cantidadDeRenglones = count($renglonesPedido);

    echo "<h2>Cantidad de renglones: " . $objRenglonesPedido->cantidadDeRenglones . "</h2>";

    echo "<h1>Producción de un JSON jsonRenglones: </h1>";

    $jsonRenglonesPedido = json_encode($objRenglonesPedido);

    echo $jsonRenglonesPedido;


    ?>
</body>

</html>