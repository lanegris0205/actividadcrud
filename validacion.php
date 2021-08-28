<?php

require_once ('pagUsuario.php');

$usuario=new Usuario();
$vali=$_REQUEST['val'] ?? '';
if ($vali) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $usuario->validar($email,$password);
}


if($_REQUEST['cerrar']){
    $usuario->cerrarsesion();
}


$regis=$_REQUEST['resg'] ?? '';
if ($regis) {
    $fecha=$_REQUEST['fecha'];
    $placa=$_REQUEST['placa'];
    $habitacion=$_REQUEST['numHabitacion'];
    $entrada=$_REQUEST['horaEntrada'];
    $salida=$_REQUEST['horaSalida'];
    $total=$_REQUEST['total'];
$usuario->registrarcliente($fecha, $placa, $habitacion, $entrada, $salida,$total);
}
