$(document).ready(function () {
    $("#crear").click(function () {
        $("#tbody").empty();
        $("#tbody").html("Esperando respuesta del servidor....");
        $.ajax({
            method: "GET",
            url: "salidaJsonArticulos.php",
            data: { string: "saldoStock" },
        })
            .done(function (response, status, jqXHR) {
                $("#tbody").empty();

                let formattedResponse = JSON.parse(response);

                mostrarDatos(formattedResponse);
            })
            .fail(function (jqXHR, status, error) {
                $("#estado").html(
                    "<strong>Status:</strong> " +
                    status +
                    "<br><strong>Error:</strong> " +
                    error
                );
            });
    });
});

function mostrarDatos(articulosObjeto) {
    let cuerpoTabla = document.getElementById("tbody");
    articulosObjeto.forEach((artic) => {
        let filaTabla = document.createElement("tr");
        filaTabla.setAttribute("class", "articulos-tr");

        for (let categ in artic) {
            let nuevaFila = document.createElement("td");
            nuevaFila.innerHTML = artic[categ];
            filaTabla.appendChild(nuevaFila);
        }

        let arrayEstilos = Array.from(filaTabla.children);

        arrayEstilos.forEach((fila) => {
            fila.setAttribute("class", "articulos-td");
        });

        cuerpoTabla.appendChild(filaTabla);
    });
}

const ocultarTabla = () => {
    $("#tbody").empty();
};

document.getElementById("reset").addEventListener("click", ocultarTabla);