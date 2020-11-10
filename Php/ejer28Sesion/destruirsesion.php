<?php
session_start();
session_destroy();
header("location:formularioLogin.html");
