let articulosJSON =
  '{"articulos":[{"codArt":"1","familia":"Frutas","UM":"KG","descripcion":"Banana","fechaAlta":"1/2/2020","saldoStock":"10"},{"codArt":"2","familia":"Frutas","UM":"KG","descripcion":"Manzana","fechaAlta":"11/2/2020","saldoStock":"20"},{"codArt":"3","familia":"Gaseosa","UM":"L","descripcion":"Manaos de Uva","fechaAlta":"14/2/2020","saldoStock":"30"},{"codArt":"4","familia":"Gaseosa","UM":"L","descripcion":"7Up","fechaAlta":"13/2/2020","saldoStock":"40"},{"codArt":"5","familia":"Infusiones","UM":"g","descripcion":"Cafe","fechaAlta":"12/2/2020","saldoStock":"50"},{"codArt":"6","familia":"Infusiones","UM":"g","descripcion":"Te de limon","fechaAlta":"10/2/2020","saldoStock":"60"},{"codArt":"1","familia":"Frutas","UM":"KG","descripcion":"Banana","fechaAlta":"1/2/2020","saldoStock":"10"},{"codArt":"2","familia":"Frutas","UM":"KG","descripcion":"Manzana","fechaAlta":"11/2/2020","saldoStock":"20"},{"codArt":"3","familia":"Gaseosa","UM":"L","descripcion":"Manaos de Uva","fechaAlta":"14/2/2020","saldoStock":"30"},{"codArt":"4","familia":"Gaseosa","UM":"L","descripcion":"7Up","fechaAlta":"13/2/2020","saldoStock":"40"},{"codArt":"5","familia":"Infusiones","UM":"g","descripcion":"Cafe","fechaAlta":"12/2/2020","saldoStock":"50"},{"codArt":"6","familia":"Infusiones","UM":"g","descripcion":"Te de limon","fechaAlta":"10/2/2020","saldoStock":"60"},{"codArt":"1","familia":"Frutas","UM":"KG","descripcion":"Banana","fechaAlta":"1/2/2020","saldoStock":"10"},{"codArt":"2","familia":"Frutas","UM":"KG","descripcion":"Manzana","fechaAlta":"11/2/2020","saldoStock":"20"},{"codArt":"3","familia":"Gaseosa","UM":"L","descripcion":"Manaos de Uva","fechaAlta":"14/2/2020","saldoStock":"30"},{"codArt":"4","familia":"Gaseosa","UM":"L","descripcion":"7Up","fechaAlta":"13/2/2020","saldoStock":"40"},{"codArt":"5","familia":"Infusiones","UM":"g","descripcion":"Cafe","fechaAlta":"12/2/2020","saldoStock":"50"},{"codArt":"6","familia":"Infusiones","UM":"g","descripcion":"Te de limon","fechaAlta":"10/2/2020","saldoStock":"60"}]}';

let interno = document.getElementById("contenedor-interno");
let externo = document.getElementById("contenedor-externo");

const cerrarVentanaModal = () => {
  interno.style.display = "none";
  externo.style.pointerEvents = "auto";
  externo.style.opacity = 1;
};
const abrirVentanaModal = () => {
  interno.style.display = "block";
  externo.style.pointerEvents = "none";
  externo.style.opacity = 0.2;
};

document.getElementById("btn").addEventListener("click", abrirVentanaModal);

document.getElementById("close").addEventListener("click", cerrarVentanaModal);
