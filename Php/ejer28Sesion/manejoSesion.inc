<?php
session_start();
if (!$_SESSION["idDeSesion"]) {
    header("location:formularioLogin.html");
}
?>