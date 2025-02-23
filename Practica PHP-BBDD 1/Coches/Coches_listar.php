<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        $instruccion = "select * from coches";
        $consulta = mysqli_query ($host,$instruccion)
         or die ("Fallo en la consulta");
         $nfilas = mysqli_num_rows ($consulta);
         if ($nfilas > 0)
         {
            print("<div class='colocar'>");
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Modelo</TH>\n");
            print ("<TH>Marca</TH>\n");
            print ("<TH>Color</TH>\n");
            print ("<TH>Precio</TH>\n");
            print ("<TH>Alquilado</TH>\n");
            print ("<TH>Foto</TH>\n");
           
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
               print ("<TD><img src=' " . $resultado['foto'] . "' width='90px'></TD>\n");
   
               
               print ("</TR>\n");
            }
   
            print ("</TABLE> </div>\n");
         }
         else
            print ("<h2 style='color: white;'>No hay vehiculos disponibles</h2>");
    
   mysqli_close ($host);
    ?>
    </div>
</body>
</html>
