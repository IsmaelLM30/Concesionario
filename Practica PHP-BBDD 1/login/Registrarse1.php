<?php
session_start();
$tipo = trim(strip_tags($_REQUEST['tipo']));
$password = "rootroot";
$contra_vendedor = "vendedor";
$password1 = trim(strip_tags($_REQUEST['password']));
$nombre = trim(strip_tags($_REQUEST['nombre1']));
$apellido = trim(strip_tags($_REQUEST['apellido']));
$hash = trim(strip_tags( $_REQUEST['contraseña']));
$saldo = trim(strip_tags($_REQUEST['saldo']));
$dni = trim(strip_tags($_REQUEST['DNI']));
$contraseña = password_hash($hash, PASSWORD_DEFAULT);
if ($tipo === "0"){
    if($password1 !== $password){     
        echo '<script>
                alert("¡Credenciales incorrectas vuelve al registro y si no tienes credenciales de Administrador/Vendedor utiliza a los Compradores!");
                window.location.href = "Registrarse.php";
            </script>';
        exit();
         
    }
}
if ($tipo === "1"){
    if($password1 !== "vendedor"){     
        echo '<script>
                alert("¡Credenciales incorrectas vuelve al registro y si no tienes credenciales de Administrador/Vendedor utiliza a los Compradores!");
                window.location.href = "Registrarse.php";
            </script>';
        exit();       
    }
}

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
        $database = "concesionario";
        $host = mysqli_connect($server, $username, $password, $database);
        if (!$host){
            die("Conexion fallida: " . mysqli_connect_error());
        }


        $sql = "insert into usuarios (nombre, apellidos, password, saldo, dni, tipo) values ('$nombre', '$apellido', '$contraseña', '$saldo', '$dni', '$tipo')";

        if (mysqli_query($host, $sql)){
            echo "  Usuario insertado con exito.";
            header("Location: ../Index/Index.php");
            exit();
        }
        else{
            echo "Error al insertar al usuario: " . mysqli_error($host);
        }
        mysqli_close($host);
    ?>
    </div>
    
</body>
</html>

