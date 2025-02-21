<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../Index/Index.php"?>
</head>
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
        $id = trim(strip_tags($_REQUEST['id']));
        

        $sql = "delete from alquileres where id_alquiler = '$id'";

        if (mysqli_query($host, $sql)){
            echo "  Alquiler borrado con exito";
        }
        else{
            echo "Error al borrar el alquiler: " . mysqli_error($host);
        }
        mysqli_close($host);
    ?>
    </div>
    
</body>
</html>

