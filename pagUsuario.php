<?php
// session_start();
require_once('Database.php');
class Usuario
{
    protected $database;
    //private $id;
    public $email;
    public $password;


    public function __construct()
    {
        session_start();
    }

    public function validar($email, $password)
    {
        $newDatabase = new Database();
        $database = $newDatabase->init();
        $query = $database->prepare("SELECT * FROM usuariologin
        WHERE email = :email AND password = :password");
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);


        if ($usuario) {
            $_SESSION['email'] = $usuario["email"];
            $_SESSION['nombre'] = $usuario["nombre"];
            header("location:http://localhost\CRUD\pagInicio.php");
        } else {
            $msg = "Email o contraseña no validos";
            $aPahtOrigin = explode('?', $_SERVER['HTTP_REFERER']);
            $pahtOrigin = $aPahtOrigin[0];
            //var_dump($aPahtOrigin);
            header("Location: $pahtOrigin?msg=$msg");
        }
    }

    public function visualcliente() // ver informacion o listar
    {
        $newDatabase = new Database();
        $database = $newDatabase->init();
        $resultado = $database->query("SELECT * FROM usuarios");
        //$resultado->execute();
        return $resul = $resultado->fetchAll(PDO::FETCH_OBJ);
        //var_dump($resul);
    }


    public function registrarcliente($fecha, $placa, $habitacion, $entrada, $salida, $total)
    {
        $newDatabase = new Database();
        $database = $newDatabase->init();
        $sentencia = $database->prepare("INSERT INTO usuarios(fecha,placa,numHabitacion,horaEntrada,horaSalida,total) VALUES (?,?,?,?,?,?);");
    $resp = $sentencia->execute([$fecha, $placa, $habitacion, $entrada, $salida, $total]);
        if ($resp == true) {
            header("location:http://localhost\CRUD\pagInicio.php");
        }
    }

    public function editarcliente()
    {
        $id = $_POST['id'];
        $newDatabase = new Database();
        $database = $newDatabase->init();
        $sentencia = $database->prepare("SELECT * FROM usuarios WHERE id=?;");
        $sentencia->execute([$id]);
        return $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    }


    public function actualizar($fecha2, $placa2, $habitacion2, $entrada2, $salida2, $total2,$id2)
    {
        $newDatabase = new Database();
        $database = $newDatabase->init();
        $sentencia = $database->prepare("UPDATE usuarios SET fecha=:fecha,placa=:placa,numHabitacion=:numHabitacion,horaEntrada=:horaEntrada,horaSalida=:horaSalida,total=:total WHERE id=:id;");
        $sentencia->bindParam(':fecha', $fecha2);
        $sentencia->bindParam(':placa', $placa2);
        $sentencia->bindParam(':numHabitacion', $habitacion2);
        $sentencia->bindParam(':horaEntrada', $entrada2);
        $sentencia->bindParam(':horaSalida', $salida2);
        $sentencia->bindParam(':total', $total2);
        $sentencia->bindParam(':id', $id2);

         $sentencia->execute();
         header("location:http://localhost\CRUD\pagInicio.php");
    }

    public function eliminardatos()
    {
        $codigo2 = $_POST['id'];
        $newDatabase = new Database();
        $database = $newDatabase->init();
        $sentencia = $database->prepare("DELETE FROM usuarios WHERE id=?;");
        $result = $sentencia->execute([$codigo2]);
        return $result = $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function cerrarsesion()
    {
        session_unset();
        session_destroy();
        header("location:http://localhost\CRUD\login.php");
    }
}
