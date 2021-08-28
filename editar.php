<?php
//print_r($_GET);
session_start();
if (!$_SESSION) {
    header("location: http://localhost\CRUD\login.php");
}

require_once('pagUsuario.php');


$usuario = new Usuario();
$var = $usuario->editarcliente();
//var_dump($var);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/miestilo.css">
    <title>Document</title>
</head>

<body>
    <form method="post" action="proceso.php">
        <div class="container col-sm-4">
            <h2 class="centrartitulo">Editar Datos</h2>
            <input type="hidden" name="id" value="<?php echo $var->id; ?>">

            <div id="divregresar">
                <form action="pagInicio.php" method="POST">
                    <button class="btn btn-primary" type="submit">regresar</button>
                </form>
            </div>
            <div>

                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input class="bordecasillas" type="date" name="fecha" value="<?php echo $var->fecha; ?>">
                </div>

                <div class="form-group">
                    <label for="placa">Placa:</label>
                    <input class="bordecasillas" type="text" name="placa" placeholder="Ingresa Placa" value="<?php echo $var->placa; ?>">
                </div>

                <div class="form-group">
                    <label for="numHabitacion">Habitacion:</label>
                    <input class="bordecasillas" type="number" name="numHabitacion" value="<?php echo $var->numHabitacion; ?>">
                </div>

                <div class="form-group">
                    <label for="horaEntrada">Entrada:</label>
                    <input class="bordecasillas" type="time" name="horaEntrada" value="<?php echo $var->horaEntrada; ?>">
                </div>

                <div class="form-group">
                    <label for="horaSalida">Salida:</label>
                    <input class="bordecasillas" type="time" name="horaSalida" value="<?php echo $var->horaSalida; ?>">
                </div>

                <div class="form-group">
                    <label for="total">Total:</label>
                    <input class="bordecasillas" type="number" name="total" value="<?php echo $var->total; ?>">

                </div>
                <br>
                <div class="col-sm-12">
                    <input class="btn btn-success form-control " type="submit" value="Actualizar">
                </div>
            </div>
    </form>
</body>

</html>