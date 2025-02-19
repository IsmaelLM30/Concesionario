<?php
session_start();

?>
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
        .inicio_ses{
            opacity: 0.8;
            color: white; background-color: black; display: flex; margin-left: 1050px; margin-top: -250px; margin-bottom: 250px; position: absolute;
        }
        .Registro_ses{
            opacity: 0.8;
            color: white; background-color: black; display: flex; margin-left: 1190px; margin-top: -250px; margin-bottom: 250px; position: absolute;
        }
    </style>
</head>
<body>
    <div class="margen" style="opacity: 0.8; padding-top: 30px; padding-bottom: 30px; margin-top: 50px; background-color: black; text-align: center;">
        <a href="../Index.html"><img src="../fotos/logo.webp" width="400px"></a>
    </div>
     <div class="indice">
        <span class="subindice">
            Coches
            <ul class="submenu">
                <li><a href="../Index.html">INICIO</a></li>
                <li><a href="../Coches/Coches_añadir.html">AÑADIR</a></li>
                <li><a href="../Coches/Coches_listar.php">LISTAR</a></li>
                <li><a href="../Coches/Coches_buscar.html">BUSCAR</a></li>
                <li><a href="../Coches/Coches_modificar.html">MODIFICAR</a></li>
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
                <li><a href="../Alquileres/Alquiler_borrar.php">BORRAR</a></li>

            </ul>
        </span>
    </div>
    <br><br>
    <div class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6; color: white;">
    <?php
    if (isset($_SESSION["nombre"])) {
        print "  <p>Usted ya se ha registrado en la pagina con el nombre de: <strong>$_SESSION[nombre] Quieres cambiar de cuenta pulsa aqui</strong></p>\n";
    }
        $server = "localhost";
        $username = "root";
        $password = "rootroot";
        $database = "concesionario";
        $host = mysqli_connect($server, $username, $password, $database);
        if (!$host){
            die("Conexion fallida: " . mysqli_connect_error());
        }
        mysqli_close($host);
    ?>
    </div>

</body>
</html>
