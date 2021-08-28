<?php
print_r($_POST);

require_once('pagUsuario.php');
$usuario = new Usuario();
$varr = $usuario->eliminardatos();
header("location:http://localhost\CRUD\pagInicio.php");
?>