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
        .letras {
            color: white;
            background-color: black;
        }
        .centrar{
            display: flex;
            justify-content: center;
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
                <li><a href="../Usuarios/Usuarios_añadir.php">AÑADIR</a></li>
                <li><a href="../Usuarios/Usuarios_listar.php">LISTAR</a></li>
                <li><a href="../Usuarios/Usuarios_buscar.php">BUSCAR</a></li>
                <li><a href="../Usuarios/Usuarios_modificar.php">MODIFICAR</a></li>
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
    <div class="margen" style="margin-top: 20px; padding: 25px; background-color: black; opacity: 0.8; color: white; text-align: center; display: flex; justify-content: center;">
    <form action="Registro1.php" class="margen" style="text-align: center; border: 2px grey solid; background: white; border-radius: 12px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); width: 350px; margin-top: 10px; padding: 40px; background-color: black; opacity: 0.6; height: 400pxpx;">
           <div class="centrar"> 
                <label class="letras" for="nombre">Nombre: </label>
                <input class="letras" type="text" name="nombre1" required> 
            </div>
                <br><br><br><br>
            <div class="centrar"> 
                <label class="letras" for="nombre">Apellidos: </label>
                <input class="letras" type="text" name="apellido" required> 
            </div>
                <br><br><br><br>
            <div class="centrar">    
                <label style="margin-left: 15px; padding-right: 15px;" class="letras" for="DNI">DNI: </label>
                <input class="letras" type="text" name="DNI" required>
            </div>
                <br><br><br><br>
            <div class="centrar">
                <label style="margin-left: -25px" class="letras" for="contraseña">Contraseña: </label>
                <input  class="letras" type="password" name="contraseña" required>
            </div>    
                <br><br><br><br>
            
                <button type="submit" value="Iniciar Sesion" style="color: white; background-color: black; margin-right: 10px;">Iniciar Seision</button>
                <button onclick="window.location.href='Registrarse.php'" style="color: white; background-color: black; margin-left: 10px;">Registrarse</button>
            
        </form>
    </div>

</body>
</html>
