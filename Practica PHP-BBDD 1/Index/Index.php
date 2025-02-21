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
        .bienvenida {
            border: 1px solid grey;
            padding: 5px 10px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            background-color: black;
            text-transform: uppercase;
            opacity: 0.8;
            color: white;
            margin-left: 1175px;
        }

        .icono {
            border-radius: 50%;
        }
        table{
            border: 1px solid white; padding: 1px; 
            padding: 3px; color: white;
            opacity: 0.8;
            
        }
        th{
            border: 1px solid white; padding: 10px;
            opacity: 1;
        }
        td{
            border: 1px solid white; padding: 10px;
            opacity: 1;
        }
        .colocar{
            text-align: center;
            display: flex;
            justify-content: center;
        }
        .letras {
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="margen" style="opacity: 0.8; padding-top: 30px; padding-bottom: 30px; margin-top: 50px; background-color: black; text-align: center;">
        <a href="../Index/Index.php"><img src="../fotos/logo.webp" width="400px"></a>
    </div>
    <?php
    if (isset($_SESSION["nombre"])) {
        echo "<span class='inicio_ses letras bienvenida'><img src='../fotos/icono.png' width='15' class='icono'> Bienvenido, " . $_SESSION["nombre"] . "</span>";
        print "<form style='margin-left: 200px;' action='../login/Borrar_sesion.php'><button type='submit' class='Registro_ses'> Cerrar Sesion </button></form>"; 
        
    }
    else{
        print "<form style='margin-left: 200px;' action='../login/login.php'><button type='submit' class='inicio_ses'> Iniciar sesion </button></form>";
        print "<form style='margin-left: 200px;' action='../login/Registrarse.php'><button type='submit' class='Registro_ses'> Registrarse </button></form>";
    }
    ?>
    <div class="indice">
        <span class="subindice">
            Coches
            <ul class="submenu">
                <li><a href="../Index/Index.php">INICIO</a></li>
                <?php
                if (isset($_SESSION["nombre"])) {
                    if ($_SESSION["tipo"] == "0" || $_SESSION["tipo"] == "1"){
                    print "<li><a href='../Coches/Coches_añadir.php'>AÑADIR</a></li>";
                    }
                }
                ?>
                <li><a href="../Coches/Coches_listar.php">LISTAR</a></li>
                <li><a href="../Coches/Coches_buscar.php">BUSCAR</a></li>
                <?php
                if (isset($_SESSION["nombre"])) {
                    if ($_SESSION["tipo"] == "0"){
                    print "<li><a href='../Coches/Coches_modificar.php'>MODIFICAR</a></li>";
                    }
                }
                ?>
                
            </ul>
        </span>
    <?php
        if (isset($_SESSION["nombre"])) {
            if ($_SESSION["tipo"] == "0" || $_SESSION["tipo"] == "1"){      
            print "<span class='subindice'>
                Usuarios
                <ul class='submenu'>
                    <li><a href='../Index/Index.php'>INICIO</a></li>";
            if ($_SESSION["tipo"] == "0" ){
                    print"<li><a href='../Usuarios/Usuarios_añadir.php'>AÑADIR</a></li>";
            }
                   print "<li><a href='../Usuarios/Usuarios_listar.php'>LISTAR</a></li>
                    <li><a href='../Usuarios/Usuarios_buscar.php'>BUSCAR</a></li>";
                if ($_SESSION["tipo"] == "0" ){
                    print"<li><a href='../Usuarios/Usuarios_modificar.php'>MODIFICAR</a></li>
                </ul>
            </span>";
            }
        }
    }
    ?>
            <span class='subindice'>
                Alquileres
                <ul class='submenu'>
                    <li><a href='../Index/Index.php'>INICIO</a></li>
                    <li><a href='../Index/Index.php'>ALQUILAR</a></li>
    <?php
            if ($_SESSION["tipo"] == "0"){        
                   print "<li><a href='../Alquileres/Alquiler_listar.php'>LISTAR</a></li>
                    <li><a href='../Alquileres/Alquiler_borrar.php'>BORRAR</a></li>

                </ul>
            </span>";
    }
    ?>
    </div>
    <br><br>

</body>
</html>
