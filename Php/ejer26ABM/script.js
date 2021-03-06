
$("#load").click(hacerTabla);
$("#altaEmpleado").click(abrirAlta);
$("#botonCerrarModal").click(cerrarAlta);
$("#formAlta").change(validAlta);
$("#altaValidar").click(Alta);
$("#botonCerrarModif").click(cerrarModif);
$("#modiValidar").click(hacerUpdate);

$("#thIdEmpleado").click(function () {
    $("#orden").val("idEmpleado");
    hacerTabla();
});
$("#thEmplApe").click(function () {
    $("#orden").val("apellido");
    hacerTabla();
});
$("#thEmplTel").click(function () {
    $("#orden").val("telefono");
    hacerTabla();
});
$("#thEmplArea").click(function () {
    $("#orden").val("area");
    hacerTabla();
});
$("#thEmplNombre").click(function () {
    $("#orden").val("nombre");
    hacerTabla();
});
$("#thEmplFA").click(function () {
    $("#orden").val("fechaAlta");
    hacerTabla();
});

function hacerTabla() {
    $("#contenidoTabla").empty();
    $("#contenidoTabla").html("<p>Aguardando respuesta del servidor....></p>")
    var objAjax = $.ajax({
        type: "get",
        url: "datosConexion.php",
        data: {
            orden: $("#orden").val(),
            filtroIdEmpleado: $("#filtroIdEmpleado").val(),
            filtroApellido: $("#filtroApellido").val(),
            filtroTelefono: $("#filtroTelefono").val(),
            filtroArea: $("#filtroArea").val(),
            filtroNombre: $("#filtroNombre").val(),
            filtroFechaAlta: $("#filtroFechaAlta").val()
        },
        success: function (respuesta, estado) {
            $("#contenidoTabla").empty();
            var objEmp = JSON.parse(respuesta);

            var tablaDatos = $("#contenidoTabla");
            objEmp.empleados.forEach(function (value, index) {

                var tableRow = document.createElement("tr");
                tableRow.setAttribute("class", "data");

                var tdIdEmpleado = document.createElement("td");
                tdIdEmpleado.innerHTML = value.idEmpleado;

                var tdApellido = document.createElement("td");
                tdApellido.innerHTML = value.apellido;

                var tdTelefono = document.createElement("td");
                tdTelefono.setAttribute("class", "celu");
                tdTelefono.innerHTML = value.telefono;

                var tdArea = document.createElement("td");
                tdArea.setAttribute("class", "tablet");
                tdArea.innerHTML = value.area;

                var tdNombre = document.createElement("td");
                tdNombre.setAttribute("class", "celu");
                tdNombre.innerHTML = value.nombre;

                var tdFechaAlta = document.createElement("td");
                tdFechaAlta.setAttribute("class", "tablet");
                tdFechaAlta.innerHTML = value.fechaAlta;

                var tdPDF = document.createElement("td");
                tdPDF.setAttribute("class", "tablet");
                tdPDF.innerHTML = "<button>Pdf</button>";

                var tdMod = document.createElement("td");
                tdMod.innerHTML = `<button id='modi' class='${value.idEmpleado}'onclick='abrirModif()'>MODIFICAR</button>`;

                var tdBaja = document.createElement("td");
                tdBaja.innerHTML = `<button id='baja' class='${value.idEmpleado}'onclick='hacerBorrado()'>BORRAR</button>`;



                tableRow.append(tdIdEmpleado, tdApellido, tdNombre, tdTelefono, tdArea, tdFechaAlta, tdPDF, tdMod, tdBaja);
                tablaDatos.append(tableRow);
            });
            $("#contenidoTabla").append(tablaDatos);
            $("footer").html(`Nro de empleados: ${objEmp.empleados.length}`);
        }

    });
};

function validAlta() {
    if ($("#altaID").isValid() &&
        $("#altaApellido").isValid() &&
        $("#altaTelefono").isValid() &&
        $("#altaArea").isValid() &&
        $("#altaNombre").isValid() &&
        $("#altaFechaAlta").isValid()) {

        $("#altaValidar").attr("disabled", false);
    } else {
        $("#altaValidar").attr("disabled", true);
    }
};

function Alta() {
    if (confirm("Esta Seguro que quiere dar de alta?")) {
        $objAjax = $.ajax({
            type: "post",
            url: "./alta.php",
            data: {
                idEmpleado: $("#altaID").val(),
                telefono: $("#altaTelefono").val(),
                apellido: $("#altaApellido").val(),
                area: $("#altaArea").val(),
                nombre: $("#altaNombre").val(),
                fechaAlta: $("#altaFechaAlta").val()
            },
            success: function () {
                hacerTabla();
                cerrarAlta();

            }
        })
    } else {
        alert("Se ha cancelado el alta");
    }
};

function borrar(idEmpleado) {
    if (confirm("Esta seguro que quiere eliminar el empelado?")) {
        var objAjax = $.ajax({
            type: "get",
            url: "./delete.php",
            data: {
                idEmpleado: idEmpleado
            },
            success: function () {
                hacerTabla();
            }
        })
    } else {
        alert("Su acción fue cancelada");
    }
}

function hacerBorrado() {
    var i = this.document.activeElement.getAttribute("class");
    borrar(i);
}

function actualizarEmpleado(idEmpleado) {
    if (confirm("Estas seguro de cambiar estos datos?")) {
        $objAjax = $.ajax({
            type: "POST",
            url: "./update.php",
            data: {
                idEmpleado: idEmpleado,
                apellido: $("#modiApellido").val(),
                telefono: $("#modiTelefono").val(),
                area: $("#modiArea").val(),
                nombre: $("#modiNombre").val(),
                fechaAlta: $("#modiFechaAlta").val()
            },
            success: function () {
                hacerTabla();
                cerrarModif();
            }
        })
    } else {
        alert("Has cancelado la operación");
    }
};

function hacerUpdate() {
    actualizarEmpleado(valorACambiar);
};

function abrirAlta() {
    $("#formAlta").css("display", "block");
    $("#doc").addClass("modalDesactivado");
};

function cerrarAlta() {
    $("#formAlta").css("display", "none");
    $("#doc").removeClass("modalDesactivado");
};

function cerrarModif() {
    $("#formModi").css("display", "none");
    $("#doc").removeClass("modalDesactivado");
};

var valorACambiar;

function abrirModif() {
    $("#formModi").css("display", "block");
    var i = this.document.activeElement.getAttribute("class");
    valorACambiar = i;
    envioModificacion(i);
    $("#doc").addClass("modalDesactivado");
};

function envioModificacion(idEmpleado) {
    $("#formModi").val(idEmpleado);
    var objAjax = $.ajax({
        type: "get",
        url: "./modi.php",
        data: { idEmpleado: idEmpleado },
        success: function (respuesta, estado) {
            objetoEmpl = JSON.parse(respuesta);

            $("#modiID").val(objetoEmpl.idEmpleado);
            $("#modiApellido").val(objetoEmpl.apellido);
            $("#modiTelefono").val(objetoEmpl.telefono);
            $("#modiArea").val(objetoEmpl.area);
            $("#modiNombre").val(objetoEmpl.nombre);
            $("#modiFechaAlta").val(objetoEmpl.fechaAlta);
        }
    });
};

$("#delete").click(function () {
    $("#contenidoTabla").empty();
});

$.fn.isValid = function () {
    return this[0].checkValidity()
}





