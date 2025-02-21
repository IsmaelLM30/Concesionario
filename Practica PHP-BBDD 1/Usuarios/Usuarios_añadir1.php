<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Desplegable</title>
<?php include "../Index/Index.php"?>
</head>
<body>
    <div class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6; color: white;">
    <?php
        $server = "localhost";
        $username = "root";
        $password = "rootroot";
        $database = "concesionario";
        $host = mysqli_connect($server, $username, $password, $database);
        if (!$host){
            die("Conexion fallida: " . mysqli_connect_error());
        }
        $nombre = trim(strip_tags($_REQUEST['nombre1']));
        $apellido = trim(strip_tags($_REQUEST['apellido']));
        $hash = trim(strip_tags( $_REQUEST['contraseña']));
        $saldo = trim(strip_tags($_REQUEST['saldo']));
        $dni = trim(strip_tags($_REQUEST['DNI']));
        $tipo = trim(strip_tags($_REQUEST['tipo']));
        $contraseña = password_hash($hash, PASSWORD_DEFAULT);

        $sql = "insert into usuarios (nombre, apellidos, password, saldo, dni, tipo) values ('$nombre', '$apellido', '$contraseña', '$saldo', '$dni', '$tipo')";

        if (mysqli_query($host, $sql)){
            echo "  Usuario insertado con exito.";
        }
        else{
            echo "Error al insertar al usuario: " . mysqli_error($host);
        }
        mysqli_close($host);
    ?>
    </div>
    
</body>
</html>

