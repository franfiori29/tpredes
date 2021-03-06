<?php
include("./manejoSesion.inc");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM</title>
    <link rel="stylesheet" href="./aplicacion/style.css">
</head>

<body>
    <header class="top">
        <div class="divEmpleados">
            <div>Empleados</div>
        </div>

        <div class="filtro">
            <label for="" id="order">Orden:</label><br>
            <input type="text" id="orden" name="orden" placeholder="idEmpleado" readonly value="idEmpleado">
        </div>

        <div class="divBotones">
            <button id="load">Cargar</button>
            <button id="delete">Vaciar</button>
            <button id="btCierraSesion">LogOut</button>
            <button id="altaEmpleado">Alta</button>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="categoria" id="thIdEmpleado"><a href="#"> Id Empleado</a></th>
                    <th class="categoria" id="thEmplApe"><a href="#">Apellido</a></th>
                    <th class="categoria celu" id="thEmplNombre"><a href=" #">Nombre</a></th>
                    <th class="categoria celu" id="thEmplTel"><a href="#">Telefono</a></th>
                    <th class="categoria tablet" id="thEmplArea"><a href="#">Área</a></th>
                    <th class="categoria tablet" id="thEmplFA"><a href="#">Fecha de Alta</a></th>
                    <th class="categoria tablet" id="thPdf">PDF</th>
                    <th class="categoria" id="thModis">Modificar</th>
                    <th class="categoria" id="thBajas">Borrar</th>
                </tr>

                <tr id="inputsFiltro">
                    <th>
                        <input id="filtroIdEmpleado" type="text">
                    </th>
                    <th>
                        <input id="filtroApellido" type="text">
                    </th>
                    <th class="celu">
                        <input id="filtroNombre" type="text">
                    </th>
                    <th class="celu">
                        <input id="filtroTelefono" type="text">
                    </th>
                    <th class="tablet">
                        <select name="filtroArea" id="filtroArea">
                            <option value="" selected></option>
                            <option value="RRHH">RRHH</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Limpieza">Limpieza</option>
                            <option value="Seguridad">Seguridad</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Atención">Atención</option>
                        </select>
                    </th>
                    <th class="tablet">
                        <input id="filtroFechaAlta" type="text">
                    </th>
                    <th class="tablet"></th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>

            <tbody id="contenidoTabla"></tbody>

            <tfoot>
                <tr>
                    <td><b>Id Empleado</b></td>
                    <td><b>Apellido</b></td>
                    <td class="celu"><b>Nombre</b></td>
                    <td class="celu"><b>Telefono</b></td>
                    <td class="tablet"><b>Área</b></td>
                    <td class="tablet"><b>Fecha de Alta</b></td>
                    <td class="tablet"><b>PDF</b></td>
                    <td><b>Modificar</b></td>
                    <td><b>Borrar</b></td>
                </tr>
            </tfoot>
        </table>

        <div class="divFormularioAlta">
            <div class="encabezadoModal">
                <div>Encabezado Formulario de Alta</div>
                <button id="botonCerrarAlta">X</button>
            </div>
            <form class="formularioAlta" id="formAlta" method="post" enctype="multipart/form-data">
                <label for="altaID">Id Empleado</label>
                <br>
                <input type="number" name="altaID" required id="altaID" min="1">
                <br>
                <label for="altaApellido">Apellido</label>
                <br>
                <input type="text" name="altaApellido" requiered id="altaApellido">
                <br>
                <label for="altaTelefono">Telefono</label>
                <br>
                <input type="number" name="altaTelefono" required id="altaTelefono" min="40000000">
                <br>
                <label for="alteArea">Area: </label>
                <br>
                <select name="altaArea">
                    <option value="RRHH">RRHH</option>
                    <option value="Ventas" selected>Ventas</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Seguridad">Seguridad</option>
                    <option value="Atención">Atención</option>
                </select>
                <br>
                <label for="altaNombre">Nombre</label>
                <br>
                <input type="text" name="altaNombre" required id="altaNombre">
                <br>
                <label for="altaFechaAlta">Fecha de alta</label>
                <br>
                <input type="date" required name="altaFechaAlta" id="altaFechaAlta">
                <br>
                <label for="altaPdf">PDF: </label>
                <br>
                <input type="file" name="altaPdf" id="altaPdf">
                <br>
                <input type="submit" value="ALTA USUARIO" id="altaValidar" disabled>
            </form>
        </div>
        <div class="divFormularioModi">
            <div class="encabezadoModal">
                <div>Encabezado Formulario de Modificación</div>
                <button id="botonCerrarModif">X</button>
            </div>
            <form class="formularioAlta" id="formModi">
                <label for="modiID">ID Empleado</label>
                <br>
                <input type="number" name="modiID" required disabled id="modiID">
                <br>
                <label for="modiApellido">Apellido</label>
                <br>
                <input type="text" name="modiApellido" requiered id="modiApellido">
                <br>
                <label for="modiTelefono">Teléfono</label>
                <br>
                <input type="number" name="modiTelefono" required id="modiTelefono" min="40000000">
                <br>
                <label for="modiArea">Area</label>
                <br>
                <select name="modiArea" id="modiArea">
                    <option value="RRHH">RRHH</option>
                    <option value="Ventas">Ventas</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Seguridad">Seguridad</option>
                    <option value="Atención">Atención</option>
                </select>
                <br>
                <label for="modiNombre">Nombre</label>
                <br>
                <input type="text" name="modiNombre" id="modiNombre">
                <br>
                <label for="modiFechaAta">Fecha de Alta</label>
                <br>
                <input type="datetime" name="modiFechaAlta" id="modiFechaAlta">
                <br>
                <label for="modiPdf">PDF: </label>
                <br>
                <input type="file" name="modiPdf" id="modiPdf">
                <br>
                <input type="submit" id="modiValidar" disabled>
            </form>
        </div>

        <div id="ventanaModalPdf">
            <div class="encabezadoModal">
                <div>Encabezado ventana modal</div>
                <button id="botonCerrarPdf"><a>X</a></button>
            </div>
            <div id="contenidoModalPDF"></div>
        </div>
    </main>
    <footer>
        <div id="piePagina">Pie de página</div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="./aplicacion/script.js"></script>
</body>

</html>