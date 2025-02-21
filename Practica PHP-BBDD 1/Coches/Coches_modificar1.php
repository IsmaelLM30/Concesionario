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
