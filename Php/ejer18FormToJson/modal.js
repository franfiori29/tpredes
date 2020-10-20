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
