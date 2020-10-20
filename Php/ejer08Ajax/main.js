$(document).ready(function () {
  $("#submit").click(function () {
    $("#output").html("Esperando respuesta del servidor....");
    $("#estado").html("");
    $.ajax({
      method: "POST",
      url: "encriptar.php",
      data: { string: $("#input").val() },
    })
      .done(function (response, status, jqXHR) {
        var formattedResponse = JSON.parse(response);
        $("#output").html(
          "<strong>Clave:</strong> " +
            formattedResponse["raw"] +
            "<br><br>" +
            "<strong>Clave encriptada en md5 (128 bits o 16 pares hexadecimales):</strong> <br>" +
            formattedResponse["md5"] +
            "<br><br>" +
            "<strong>Clave encriptada en sha1 (160 bits o 20 pares hexadecimales):</strong> <br>" +
            formattedResponse["sha1"]
        );
        $("#estado").html("<strong>Status</strong>: " + status);
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
