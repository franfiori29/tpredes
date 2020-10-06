let articulosJSON =
  '{"articulos":[{"codArt":"1","familia":"Frutas","UM":"KG","descripcion":"Banana","fechaAlta":"1/2/2020","saldoStock":"10"},{"codArt":"2","familia":"Frutas","UM":"KG","descripcion":"Manzana","fechaAlta":"11/2/2020","saldoStock":"20"},{"codArt":"3","familia":"Gaseosa","UM":"L","descripcion":"Manaos de Uva","fechaAlta":"14/2/2020","saldoStock":"30"},{"codArt":"4","familia":"Gaseosa","UM":"L","descripcion":"7Up","fechaAlta":"13/2/2020","saldoStock":"40"},{"codArt":"5","familia":"Infusiones","UM":"g","descripcion":"Cafe","fechaAlta":"12/2/2020","saldoStock":"50"},{"codArt":"6","familia":"Infusiones","UM":"g","descripcion":"Te de limon","fechaAlta":"10/2/2020","saldoStock":"60"},{"codArt":"1","familia":"Frutas","UM":"KG","descripcion":"Banana","fechaAlta":"1/2/2020","saldoStock":"10"},{"codArt":"2","familia":"Frutas","UM":"KG","descripcion":"Manzana","fechaAlta":"11/2/2020","saldoStock":"20"},{"codArt":"3","familia":"Gaseosa","UM":"L","descripcion":"Manaos de Uva","fechaAlta":"14/2/2020","saldoStock":"30"},{"codArt":"4","familia":"Gaseosa","UM":"L","descripcion":"7Up","fechaAlta":"13/2/2020","saldoStock":"40"},{"codArt":"5","familia":"Infusiones","UM":"g","descripcion":"Cafe","fechaAlta":"12/2/2020","saldoStock":"50"},{"codArt":"6","familia":"Infusiones","UM":"g","descripcion":"Te de limon","fechaAlta":"10/2/2020","saldoStock":"60"},{"codArt":"1","familia":"Frutas","UM":"KG","descripcion":"Banana","fechaAlta":"1/2/2020","saldoStock":"10"},{"codArt":"2","familia":"Frutas","UM":"KG","descripcion":"Manzana","fechaAlta":"11/2/2020","saldoStock":"20"},{"codArt":"3","familia":"Gaseosa","UM":"L","descripcion":"Manaos de Uva","fechaAlta":"14/2/2020","saldoStock":"30"},{"codArt":"4","familia":"Gaseosa","UM":"L","descripcion":"7Up","fechaAlta":"13/2/2020","saldoStock":"40"},{"codArt":"5","familia":"Infusiones","UM":"g","descripcion":"Cafe","fechaAlta":"12/2/2020","saldoStock":"50"},{"codArt":"6","familia":"Infusiones","UM":"g","descripcion":"Te de limon","fechaAlta":"10/2/2020","saldoStock":"60"}]}';

let articulosObjeto = JSON.parse(articulosJSON);

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
