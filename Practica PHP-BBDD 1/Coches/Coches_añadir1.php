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
        $target_dir = "../fotos/";


        // Verificar si se envió un archivo
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            
            // Obtener el nombre y ruta del archivo destino
            $target_file = $target_dir . basename($file["name"]);
        
            // Verificar si el archivo es realmente una imagen
            $check = getimagesize($file["tmp_name"]);
            if ($check === false) {
                die("El archivo seleccionado no es una imagen.");
            }
        
            // Verificar si el archivo ya existe
            if (file_exists($target_file)) {
                die("El archivo ya existe en el servidor.");
            }
        
            // Intentar mover el archivo al directorio de destino
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                true;
            } else {
                 die("Hubo un error al subir el archivo.");
            }
        } else {
            die("No se ha seleccionado ningún archivo.");
        }
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

        $sql = "insert into coches (modelo, marca, color, precio, alquilado, foto) values ('$modelo', '$marca', '$color', '$precio', '$alquilado', '$target_file')";

        if (mysqli_query($host, $sql)){
            echo "  Vehiculo insertado insertado con exito.";
        }
        else{
            echo "Error al insertar al usuario: " . mysqli_error($host);
        }
        mysqli_close($host);
    ?>
    </div>
    
</body>
</html>

