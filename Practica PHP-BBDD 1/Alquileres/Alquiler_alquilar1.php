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

            $id = intval(trim(strip_tags($_REQUEST['id'])));
            $modelo = trim(strip_tags($_REQUEST['modelo'][$id]));
            $precio = floatval(trim(strip_tags($_REQUEST['precio'][$id])));
            $marca = trim(strip_tags($_REQUEST['marca'][$id]));
            $color = trim(strip_tags($_REQUEST['color'][$id]));
            $alquilado = trim(strip_tags($_REQUEST['alquilado'][$id]));
            $foto = trim(strip_tags($_REQUEST['foto'][$id]));
            $vendedor = intval(trim(strip_tags($_REQUEST['vendedor'][$id])));


            if (!isset($_SESSION['nombre'])) {
                echo "<h2 class='colocar letras'>Tienes que iniciar sesión para poder alquilar un vehículo</h2>";
                exit();
            }

            if ($_SESSION['tipo'] === '0' || $_SESSION['tipo'] === '1') {
                echo "<h2 class='colocar letras'>Tienes que ser un comprador para poder alquilar un coche</h2>";
                exit();
            }

            if ($_SESSION['saldo'] < $precio) {
                echo "<h2 class='colocar letras'>No tienes dinero para alquilar el vehículo</h2>";
                exit();
            }

            $host = mysqli_connect($server, $username, $password, $database);
            if (!$host) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            $instruccion = "INSERT INTO alquileres(id_usuario, id_vendedor, id_coche, precio, prestado) 
                            VALUES('" . $_SESSION['id'] . "', '$vendedor', $id, $precio, NOW())";

            if (mysqli_query($host, $instruccion)) {
                echo "<h2 class='colocar letras'>Alquiler insertado con éxito.</h2>";
            } else {
                echo "<h2 class='colocar letras'>Error al insertar el alquiler: " . mysqli_error($host) . "</h2>";
            }

            mysqli_close($host);
        ?>

    </div>
</body>
</html>
mysqldump -u root -p --routines --triggers concesionario > 'C:\AppServ\www\Concesionario\Practica PHP-BBDD 1\concesionario.sql'
