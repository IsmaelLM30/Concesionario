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
    <div class="margen" style="margin-top: 30px; padding: 25px; background-color: black; opacity: 0.6;">
        <?php
                $server = "localhost";
                $username = "root";
                $password = "rootroot";
                $database = "concesionario";
                $id = trim(strip_tags($_REQUEST['id']));
                $precio = trim(strip_tags($_REQUEST['precio'][$id]));
                if(!isset($_SESSION['nombre'])){
                    echo "<h2 class='colocar letras'>Tienes que iniciar sesion para poder alquilar un vehiculo</h2>";
                    exit();
                }
                if($_SESSION['tipo'] === '0' || $_SESSION['tipo'] === '1'){
                    echo "<h2 class='colocar letras'>Tienes que ser un comprador para poder alquilar un coche</h2>";
                    exit();
                }


                $host = mysqli_connect($server, $username, $password, $database);
                if (!$host){
                    die("Conexion fallida: " . mysqli_connect_error());
                }
                $instruccion = "insert into alquileres()";
                $consulta = mysqli_query ($host,$instruccion)
                 or die ("Fallo en la consulta");
                 $resultado = mysqli_fetch_array ($consulta);
                 
        ?>
    </div>
</body>
</html>
