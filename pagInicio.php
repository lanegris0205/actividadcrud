<?php
session_start();
require_once('pagUsuario.php');



if (!$_SESSION) {
    header("location: http://localhost\CRUD\login.php");
}

$usuario = new Usuario();
$resp = $usuario->visualcliente();
//var_dump($resp);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/miestilo.css">
    <title>Inicio</title>
</head>

<body>
    <div class="container col-sm-7">
        <h1 class="centrartitulo">Bienvenid@
            <?php echo $_SESSION['nombre']; ?>
        </h1>
        <div style="text-align: right">

        <form action="registro.php" method="POST">
            <button class="btn btn-primary" type="submit">Registrar</button>
        </form>
        </div>
        <hr><!-- para hacer un linea de separacion-->

        <div>

            <table class="table table-bordered">
                <thead>
                    <tr id="trpaginicio">
                        <th>ID</th>
                        <th>FECHA</th>
                        <th>PLACA</th>
                        <th>#HABITACION</th>
                        <th>H.ENTRADA</th>
                        <th>H.SALIDA</th>
                        <th>TOTAL</th>
                        <th>ACCIONES</th>

                    </tr>
                    <?php
                    foreach ($resp as $dato) {
                        //var_dump($resp);
                    ?>
                        <tr id="triniciodato" >
                            <td> <?php echo $dato->id; ?> </td>
                            <td> <?php echo $dato->fecha; ?></td>
                            <td> <?php echo $dato->placa; ?> </td>
                            <td> <?php echo $dato->numHabitacion; ?></td>
                            <td> <?php echo $dato->horaEntrada; ?> </td>
                            <td> <?php echo $dato->horaSalida; ?></td>
                            <td> <?php echo $dato->total; ?> </td>

                            <td>
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <form action="editar.php" method="POST">

                                            <input type='hidden' name="id" value="<?php echo $dato->id; ?>">
                                            <button name='editar' class="btn btn-success btn-sm">Editar</button>

                                        </form>
                                    </div>
                                    <div class="col-sm-4">

                                        <form action="eliminar.php" method="POST">

                                            <input type='hidden' name="id" value="<?php echo $dato->id; ?>">
                                            <button name='eliminar' class="btn btn-success btn-sm">Eliminar</button>

                                        </form>
                                    </div>
                                </div>
                             
                            </td>

                        </tr>
                    <?php
                    }
                    ?>

                </thead>

            </table>

        </div>
        <!-- BOTON DENTRO DE UN FORM PARA CERRAR SESION https://www.w3schools.com/php/php_sessions.asp-->
        <form style="text-align:center" action="logout.php" method="POST">
            <button class="btn btn-primary" type="submit">Cerrar sesion</button>
        </form>
    </div>
</body>

</html>