$(function () {
  $("form").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "post.php",
      data: $("form").serialize(),
      success: function () {
        alert("Se envió el formulario!");
      },
    }).done(function (response, status, jqXHR) {
      var objJson = JSON.parse(response);
      for (let clave in objJson) {
        document.getElementById(
          "resultado"
        ).innerHTML += `${clave}: ${objJson[clave]}<br>`;
      }
    });
  });
});
