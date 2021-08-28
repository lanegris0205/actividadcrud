<?php
session_start();

if (!$_SESSION) {
    header("location: http://localhost\CRUD\login.php");
}

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

    <div class="container col-sm-4">

    <h1 class="centrartitulo">Registro Cliente</h1>

        <div id="divregresar">
            <form action="pagInicio.php" method="POST">
                <button class="btn btn-primary" type="submit">regresar</button>
            </form>
        </div>
        <form action="validacion.php?resg=true" method="post">
            
            <div >

                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input class="bordecasillas" type="date" name="fecha" required>
                </div>

                <div class="form-group">
                    <label  for="placa">Placa:</label>
                    <input class="bordecasillas" type="text" name="placa" placeholder="Ingresa Placa" required>
                </div>

                <div class="form-group">
                    <label for="numHabitacion">Habitacion:</label>
                    <input class="bordecasillas" type="number" name="numHabitacion" placeholder="Ingresa N° Habitacion" required>
                </div>

                <div class="form-group">
                    <label for="horaEntrada">Entrada:</label>
                    <input class="bordecasillas" type="time" name="horaEntrada" required>
                </div>

                <div class="form-group">
                    <label for="horaSalida">Salida:</label>
                    <input class="bordecasillas" type="time" name="horaSalida" required>
                </div>

                <div class="form-group">
                    <label for="total">Total:</label>
                    <input class="bordecasillas" type="number" name="total" placeholder="Ingresa Valor" required>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input class="btn btn-success form-control" type="reset" value="Reset">
                    </div>
                    <div class="col-sm-6">
                        <input class="btn btn-success form-control" type="submit" value="Guardar Dato">
                    </div>

                </div>

            </div>
        </form>
    </div>

</body>

</html>