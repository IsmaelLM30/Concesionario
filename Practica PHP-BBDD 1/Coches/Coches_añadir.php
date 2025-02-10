<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Desplegable</title>
    <style>
        body {
            background-image: url(../fotos/fondo.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .margen {
            margin-left: 350px; 
            margin-right: 350px;
        }

        .indice {
            display: flex; 
            justify-content: center; 
            background-color: black; 
            color: white; 
            margin-top: 10px;
            margin-left: 350px; 
            margin-right: 350px;
            opacity: 0.8;
        }

        .subindice {
            font-size: 40px;
            margin: 0 20px;
            position: relative;
            cursor: pointer;
        }

        .submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: black;
            color: white;
            display: none;
            border: 1px solid #ccc;
            min-width: 150px;
            text-decoration: underline;
        }

        .submenu li {
            padding: 10px;
            text-align: left;
        }

        .submenu li:hover {
            background-color: black;
            color: white;
        }

        .subindice:hover .submenu {
            display: block;
        }

        .submenu a {
            text-decoration: none;
            color: white;
            display: block;
        }
        .letras {
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="margen" style="opacity: 0.8; padding-top: 30px; padding-bottom: 30px; margin-top: 50px; background-color: black; text-align: center;">
        <img src="../fotos/logo.webp" width="400px">
    </div>
    <div class="indice">
        <span class="subindice">
            Coches
            <ul class="submenu">
                <li><a href="../Index.html">INICIO</a></li>
                <li><a href="#">AÑADIR</a></li>
                <li><a href="Coches_listar.php">LISTAR</a></li>
                <li><a href="Coches_buscar.html">BUSCAR</a></li>
                <li><a href="Coches_modificar.html">MODIFICAR</a></li>
            </ul>
        </span>
        <span class="subindice">
            Usuarios
            <ul class="submenu">
                <li><a href="../Index.html">INICIO</a></li>
                <li><a href="../Usuarios/Usuarios_añadir.html">AÑADIR</a></li>
                <li><a href="../Usuarios/Usuarios_listar.php">LISTAR</a></li>
                <li><a href="../Usuarios/Usuarios_buscar.html">BUSCAR</a></li>
                <li><a href="../Usuarios/Usuarios_modificar.html">MODIFICAR</a></li>
            </ul>
        </span>
        <span class="subindice">
            Alquileres
            <ul class="submenu">
                <li><a href="../Index.html">INICIO</a></li>
                <li><a href="../Alquileres/Alquiler_listar.php">LISTAR</a></li>
                <li><a href="../Alquileres/Alquiler_borrar.html">BORRAR</a></li>

            </ul>
        </span>
    </div>

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

