<?php
require_once('pagUsuario.php');
//print_r($_POST);
$usuario= new Usuario();


    $id2=$_REQUEST['id'];
    $fecha2=$_REQUEST['fecha'];
    $placa2=$_REQUEST['placa'];
    $habitacion2=$_REQUEST['numHabitacion'];
    $entrada2=$_REQUEST['horaEntrada'];
    $salida2=$_REQUEST['horaSalida'];
    $total2=$_REQUEST['total'];
    $usuario->actualizar($fecha2, $placa2, $habitacion2, $entrada2, $salida2, $total2, $id2);
    
    




?>