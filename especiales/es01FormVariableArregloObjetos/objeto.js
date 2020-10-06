const articulosJSON =
  '{"articulos" : [{"codArticulo":"1234", "descr":"arándano deshidratado", "familiaArticulo": "Frutas secas"},{"codArticulo":"4567", "descr":"pava eléctrica", "familiaArticulo": "Cocina"},{"codArticulo":"7890", "descr":"duraznos en almíbar", "familiaArticulo": "Enlatados"},{"codArticulo":"9907", "descr":"cajaBorradorx50", "familiaArticulo": "Pescado"} ]}';

const articulosObjeto = JSON.parse(articulosJSON);

const llenarSelect = () => {
  articulosObjeto.articulos.forEach((articulo) => {
    let opcion = document.createElement("option");
    opcion.setAttribute("class", "opcionSelect");
    opcion.setAttribute("value", articulo.familiaArticulo);
    opcion.innerText = articulo.familiaArticulo;
    document.getElementById("listaArt").appendChild(opcion);
  });
};

llenarSelect();
