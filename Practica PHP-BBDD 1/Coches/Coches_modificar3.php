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
        $modelo = trim(strip_tags($_REQUEST['modelo']));
        $marca = trim(strip_tags($_REQUEST['marca']));
        $color = trim(strip_tags($_REQUEST['color']));
        $precio = trim(strip_tags($_REQUEST['precio']));
        $alquilado = trim(strip_tags($_REQUEST['alquilado']));
        $foto = trim(strip_tags($_REQUEST['foto']));
        $id = trim(strip_tags($_REQUEST['id']));

        $sql = "update coches set modelo = '$modelo', marca = '$marca', color = '$color', precio = '$precio', alquilado = '$alquilado', foto = '$foto' where id_coche = '$id'";

        if (mysqli_query($host, $sql)){
            echo "Vehiculo modificado con exito.";
        }
        else{
            echo "Error al insertar al usuario: " . mysqli_error($host);
        }
        mysqli_close($host);
    ?>
    </div>
    
</body>
</html>

