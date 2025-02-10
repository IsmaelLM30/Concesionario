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
                <li><a href="Coches_añadir.html">AÑADIR</a></li>
                <li><a href="#">LISTAR</a></li>
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
    <br><br>

    <div class="margen" style="margin-top: 30px; padding: 25px; background-color: black; opacity: 0.6;">
    <?php
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
        $foto = trim(strip_tags($_REQUEST['foto']));
        $instruccion = "select * from coches where modelo ='$modelo' or marca = '$marca' or color = '$color' or precio = '$precio' or alquilado = '$alquilado'";
        $consulta = mysqli_query ($host,$instruccion)
         or die ("Fallo en la consulta");
         $nfilas = mysqli_num_rows ($consulta);
         if ($nfilas > 0)
         {
            print("<form action='Coches_modificar2.php'>");
            print("<div class='colocar'>");
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Modelo</TH>\n");
            print ("<TH>Marca</TH>\n");
            print ("<TH>Color</TH>\n");
            print ("<TH>Precio</TH>\n");
            print ("<TH>Alquilado</TH>\n");
            print ("<TH>Foto</TH>\n");
            print ("<TH>Cual quieres editar</TH>\n");
            print ("</TR>\n");
   
            for ($i=0; $i<$nfilas; $i++)
            {
               $resultado = mysqli_fetch_array ($consulta);
               print ("<TR>\n");
               print ("<TD>" . $resultado['modelo'] . "</TD>\n");
               print ("<TD>" . $resultado['marca'] . "</TD>\n");
               print ("<TD>" . $resultado['color'] . "</TD>\n");
               print ("<TD>" . $resultado['precio'] . "</TD>\n");
               if ($resultado["alquilado"] == "1"){
                print ("<TD>Si</TD>\n");
               }
               elseif ($resultado["alquilado"] == "0"){
                print ("<TD>No</TD>\n");
               }
               else{
                print ("<TD>-</TD>\n");
               }
               print ("<TD>" . $resultado['foto'] . "</TD>\n");
               print ("<TD> <input type= 'radio' name='id' value= '". $resultado['id_coche'] ."'> </TD> \n");
   
               
               print ("</TR>\n");
               
            }
   
            print ("</TABLE></div> <br><input type='submit' value='Modificar' style='margin-left: 550px; color: white; background-color: black;'></form>\n");
         }
         else
            print ("<h2 style='color: white;'>No hay vehiculos disponibles con esas especificaciones</h2>");
    
   mysqli_close ($host);
    ?>
    </div>
</body>
</html>
