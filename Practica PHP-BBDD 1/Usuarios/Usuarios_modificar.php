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
        .letras {
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="margen" style="opacity: 0.8; padding-top: 30px; padding-bottom: 30px; margin-top: 50px; background-color: black; text-align: center;">
        <a href="../Index.php"><img src="../fotos/logo.webp" width="400px"></a>
    </div>
    <div class="indice">
        <span class="subindice">
            Coches
            <ul class="submenu">
                <li><a href="../Index.php">INICIO</a></li>
                <li><a href="../Coches/Coches_añadir.php">AÑADIR</a></li>
                <li><a href="../Coches/Coches_listar.php">LISTAR</a></li>
                <li><a href="../Coches/Coches_buscar.php">BUSCAR</a></li>
                <li><a href="../Coches/Coches_modificar.php">MODIFICAR</a></li>
            </ul>
        </span>
        <span class="subindice">
            Usuarios
            <ul class="submenu">
                <li><a href="../Index.php">INICIO</a></li>
                <li><a href="Usuarios_añadir.php">AÑADIR</a></li>
                <li><a href="Usuarios_listar.php">LISTAR</a></li>
                <li><a href="Usuarios_buscar.php">BUSCAR</a></li>
                <li><a href="#">MODIFICAR</a></li>
            </ul>
        </span>
        <span class="subindice">
            Alquileres
            <ul class="submenu">
                <li><a href="../Index.php">INICIO</a></li>
                <li><a href="../Alquileres/Alquiler_listar.php">LISTAR</a></li>
                <li><a href="../Alquileres/Alquiler_borrar.php">BORRAR</a></li>

            </ul>
        </span>
    </div>
    <br><br>


    <form action="Usuarios_modificar1.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
        <label class="letras" for="nombre">Nombre: </label>
        <input class="letras" type="text" name="nombre1" >
        <label style="margin-left: 150px;" class="letras" for="apellido">Apellido: </label>
        <input class="letras" type="text" name="apellido" >
        <br><br><br>
        <label class="letras" for="saldo" style="margin-left: 20px;">Saldo: </label>
        <input class="letras" type="number" name="saldo"  >
        <label style="margin-left: 175px;" class="letras" for="DNI">DNI: </label>
        <input class="letras" type="text" name="DNI" >
        <br><br><br>
        <div style="text-align: center;">
            <input type="submit" value="Buscar" style="color: white; background-color: black;">
        </div>
        
    </form>
</body>
</html>
