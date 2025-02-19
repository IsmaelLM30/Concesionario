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
    <a href="../Index.html"><img src="../fotos/logo.webp" width="400px"></a>
    </div>
    <div class="indice">
        <span class="subindice">
            Coches
            <ul class="submenu">
                <li><a href="../Index.html">INICIO</a></li>
                <li><a href="Coches_añadir.html">AÑADIR</a></li>
                <li><a href="Coches_listar.php">LISTAR</a></li>
                <li><a href="#">BUSCAR</a></li>
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
    <br><br>

        <?php
                $server = "localhost";
                $username = "root";
                $password = "rootroot";
                $database = "concesionario";
                $id = trim(strip_tags($_REQUEST['id']));
                $host = mysqli_connect($server, $username, $password, $database);
                if (!$host){
                    die("Conexion fallida: " . mysqli_connect_error());
                }
                $instruccion = "select * from coches where id_coche = '$id'";
                $consulta = mysqli_query ($host,$instruccion)
                 or die ("Fallo en la consulta");
                 $resultado = mysqli_fetch_array ($consulta);
        ?>
    <form action="Coches_modificar3.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
        <label style="margin-left: 40px;" class="letras">ID</label>
        <input class="letras" type="text" name="id" value="<?php print $resultado['id_coche'];?>" readonly> <br><br>
        <label class="letras" for="modelo">Modelo: </label>
        <input class="letras" type="text" name="modelo" value="<?php print $resultado['modelo'];?>">
        <label style="margin-left: 150px;" class="letras" for="marca">Marca: </label>
        <input class="letras" type="text" name="marca" value="<?php print $resultado['marca'];?>">
        <label style="margin-left: 150px;" class="letras" for="color">Color: </label>
        <input class="letras" type="text" name="color" value="<?php print $resultado['color'];?>">
        <br><br><br>
        <label class="letras" for="precio">Precio: </label>
        <input class="letras" type="number" name="precio" value="<?php print $resultado['precio'];?>">
        <label style="margin-left: 150px;" class="letras" for="alquilado">Alquilado: </label>
        <select name="alquilado" >
            <option value="1" <?php if ($resultado['alqujilado'] == '1') echo 'selected'; ?>>si</option>
            <option value="0" <?php if ($resultado['alquilado'] == '0') echo 'selected'; ?>>no</option>
        </select>
        <label style="margin-left: 220px;" class="letras" for="foto">Foto: </label>
        <input class="letras" type="text" name="foto" value="<?php print $resultado['foto'];?>">
        <br><br><br>
        <div style="text-align: center;">
            <input type="submit" value="Modificar" style="color: white; background-color: black;">
        </div>
        
    </form>
</body>
</html>
