


$("#load").click(hacerTabla);
$("#altaEmpleado").click(abrirAlta);
$("#botonCerrarAlta").click(cerrarAlta);
$("#formAlta").change(validAlta);
// $("#altaValidar").click(Alta);
$("#botonCerrarModif").click(cerrarModif);
$("#botonCerrarPdf").click(cerrarPdf)
$("#modiValidar").click(hacerUpdate);

$(function () {
    $("#formAlta").on("submit", function (e) {
        if (confirm("Esta Seguro que quiere dar de alta?")) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("formAlta"));
            $.ajax({
                url: "alta.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function () {
                    hacerTabla();
                    cerrarAlta();
                }
            })
        }
        else {
            alert("Se ha cancelado el alta");
        };
    })
});

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
    $("#contenidoTabla").html("<p>Aguardando respuesta del servidor....></p>");
    $.ajax({
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
                tdPDF.innerHTML = `<button pdfValue="${value.pdf}" onclick='verPdf()'>Pdf</button>`;

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

function verPdf() {
    var i = this.document.activeElement.getAttribute("pdfValue");
    if (i == "") {
        alert("Este usuario no cuenta con PDF")
    } else {
        $("#ventanaModalPdf").css("display", "block");
        $("#contenidoModalPDF").empty();
        $("#contenidoModalPDF").html("<iframe width='100%' height='600px' src='data:application/pdf;base64," + i + "'></iframe>");
    }
}

function cerrarPdf() {
    $("#ventanaModalPdf").css("display", "none");
}

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


function borrar(idEmpleado) {
    if (confirm("Esta seguro que quiere eliminar el empelado?")) {
        $.ajax({
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


$(function () {
    $("#formModi").on("submit", function (e) {
        if (confirm("Esta Seguro que quiere modificar este usuario?")) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("formModi"));
            $.ajax({
                url: "update.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function () {
                    hacerTabla();
                    cerrarAlta();
                }
            })
        }
        else {
            alert("Se ha cancelado la modificación");
        };
    })
    $(".divFormularioModi").css("display", "none");
});
// function actualizarEmpleado(idEmpleado) {
//     if (confirm("Estas seguro de cambiar estos datos?")) {
//         $objAjax = $.ajax({
//             type: "POST",
//             url: "./update.php",
//             data: {
//                 idEmpleado: idEmpleado,
//                 apellido: $("#modiApellido").val(),
//                 telefono: $("#modiTelefono").val(),
//                 area: $("#modiArea").val(),
//                 nombre: $("#modiNombre").val(),
//                 fechaAlta: $("#modiFechaAlta").val()
//             },
//             success: function () {
//                 hacerTabla();
//                 cerrarModif();
//             }
//         })
//     } else {
//         alert("Has cancelado la operación");
//     }
// };

function hacerUpdate() {
    actualizarEmpleado(valorACambiar);
};

function abrirAlta() {
    $(".divFormularioAlta").css("display", "block");
    $("#doc").addClass("modalDesactivado");
};

function cerrarAlta() {
    $(".divFormularioAlta").css("display", "none");
    $("#doc").removeClass("modalDesactivado");
};

function cerrarModif() {
    $(".divFormularioModi").css("display", "none");
    $("#doc").removeClass("modalDesactivado");
};

var valorACambiar;

function abrirModif() {
    $(".divFormularioModi").css("display", "block");
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





