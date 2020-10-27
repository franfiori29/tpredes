

let cuerpoTabla = document.getElementById("tbody");

document.getElementById("crear").addEventListener("click", mostrarDatos);

function mostrarDatos() {
  articulosObjeto.articulos.forEach((artic) => {
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
