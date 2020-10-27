<?php
require("./datosConexionBase.php");

$conn = new mysqli(SERVER, USUARIO, PASS, BASE, PORT);




if (isset($_GET["string"])) {
    $string = $_GET["string"];

    $sql = "select * from Articulos order by " . $string;
    $resultado = $conn->query($sql);

    $articulos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $objArticulo = new stdClass();
        $objArticulo->id = $fila['Id'];
        $objArticulo->descripcion = $fila['Descripcion'];
        $objArticulo->stock = $fila['Stock'];
        $objArticulo->tipo = $fila['Tipo'];
        $objArticulo->fechaAlta = $fila['FechaAlta'];
        $objArticulo->perecedero = $fila['Perecedero'];
        array_push($articulos, $objArticulo);
    }
    echo json_encode($articulos);
} else {
    echo "not found";
}
