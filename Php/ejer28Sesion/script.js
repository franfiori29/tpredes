


$("#load").click(hacerTabla);
$("#altaEmpleado").click(abrirAlta);
$("#botonCerrarAlta").click(cerrarAlta);
$("#formAlta input").keyup(validAlta);
$("#formModi input").keyup(validModi);
$("#botonCerrarModif").click(cerrarModif);
$("#botonCerrarPdf").click(cerrarPdf)
$("#modiValidar").click(hacerUpdate);

$(function () {
    $("#formAlta").on("submit", function (e) {
        if (confirm("Esta Seguro que quiere dar de alta?")) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("formAlta"));
            formData.get("altaPdf").name == "" ? formData.delete("altaPdf") : null;
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
                tdPDF.innerHTML = `<button pdfValue="${value.pdf}" onclick='verPdf()'><b>PDF</b></button>`;

                var tdMod = document.createElement("td");
                tdMod.innerHTML = `<button id='modi' class='${value.idEmpleado}'onclick='abrirModif();validModi'><b>MODIFICAR</b></button>`;

                var tdBaja = document.createElement("td");
                tdBaja.innerHTML = `<button id='baja' class='${value.idEmpleado}'onclick='hacerBorrado()'><b>BORRAR</b></button>`;


                tableRow.append(tdIdEmpleado, tdApellido, tdNombre, tdTelefono, tdArea, tdFechaAlta, tdPDF, tdMod, tdBaja);
                tablaDatos.append(tableRow);
            });
            $("#contenidoTabla").append(tablaDatos);
            $("#piePagina").html(`Nro de empleados: ${objEmp.empleados.length}`);
        }

    });
};

function verPdf() {
    var i = this.document.activeElement.getAttribute("pdfValue");
    if (i == "") {
        alert("Este usuario no cuenta con PDF")
    } else {
        $("table, header").css("pointerEvents", "none");
        $("table, header,footer").css("opacity", 0.2);
        $("#ventanaModalPdf").css("display", "block");
        $("#contenidoModalPDF").empty();
        $("#contenidoModalPDF").html("<iframe width='100%' height='600px' src='data:application/pdf;base64," + i + "'></iframe>");
    }
}

function cerrarPdf() {
    $("#ventanaModalPdf").css("display", "none");
    $("table, header").css("pointerEvents", "auto");
    $("table, header,footer").css("opacity", 1);
}

function validAlta() {
    if ($("#altaID").isValid() &&
        esValidoString($("#altaApellido")) &&
        esValidoTelefono($("#altaTelefono")) &&
        esValidoString($("#altaNombre")) &&
        $("#altaFechaAlta").isValid()) {

        $("#altaValidar").attr("disabled", false);
    } else {
        $("#altaValidar").attr("disabled", true);
    }
};

function validModi() {
    if ($("#modiID").isValid() &&
        esValidoString($("#modiApellido")) &&
        esValidoTelefono($("#modiTelefono")) &&
        esValidoString($("#modiNombre")) &&
        $("#modiFechaAlta").isValid()) {

        $("#modiValidar").attr("disabled", false);
    } else {
        $("#modiValidar").attr("disabled", true);
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
                    cerrarModif()
                }
            })
        }
        else {
            alert("Se ha cancelado la modificación");
        };
    })
    $(".divFormularioModi").css("display", "none");
});

function hacerUpdate() {
    actualizarEmpleado(valorACambiar);
};

function abrirAlta() {
    $(".divFormularioAlta").css("display", "block");
    $("table, header").css("pointerEvents", "none");
    $("table, header,footer").css("opacity", 0.2);
    $("#doc").addClass("modalDesactivado");
};

function cerrarAlta() {
    $(".divFormularioAlta").css("display", "none");
    $("table, header").css("pointerEvents", "auto");
    $("table, header,footer").css("opacity", 1);
    $("#doc").removeClass("modalDesactivado");
};

function cerrarModif() {
    $(".divFormularioModi").css("display", "none");
    $("table,header").css("pointerEvents", "auto");
    $("table, header,footer").css("opacity", 1);
    $("#doc").removeClass("modalDesactivado");
};

var valorACambiar;

function abrirModif() {
    $(".divFormularioModi").css("display", "block");
    $("table, header").css("pointerEvents", "none");
    $("table, header,footer").css("opacity", 0.2);
    $("header").css("pointerEvents", "none");
    var i = this.document.activeElement.getAttribute("class");
    valorACambiar = i;
    envioModificacion(i);

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
            $("#modiPdf").val(objetoEmpl.pdf);
            validModi();
        }
    });
};

$("#delete").click(function () {
    $("#contenidoTabla").empty();
});

$.fn.isValid = function () {
    return this[0].checkValidity()
}

function esValidoString(input) {
    let valorInput = input.val()
    if (!valorInput) return false
    var letters = /^[A-zÀ-ú]+$/;
    if (valorInput.match(letters) && valorInput.length > 2 && valorInput.length < 20) {
        return true;
    }
    else {
        return false;
    }
}

function esValidoTelefono(input) {
    let valorInput = input.val()
    if (!valorInput) return false
    let reg = new RegExp("^[0-9]{8,10}$")
    return reg.test(valorInput) ? true : false;
}




