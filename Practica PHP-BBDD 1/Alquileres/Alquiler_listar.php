<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../Index/Index.php"?>
</head>
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
        $instruccion = "select usuarios.nombre,usuarios.apellidos, coches.marca,coches.modelo, prestado,devuelto from alquileres, coches,
 usuarios where alquileres.id_usuario=usuarios.id_usuario and alquileres.id_coche = coches.id_coche";
        $consulta = mysqli_query ($host,$instruccion)
         or die ("Fallo en la consulta");
         $nfilas = mysqli_num_rows ($consulta);
         if ($nfilas > 0)
         {
            print("<div class='colocar'>");
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Nombre</TH>\n");
            print ("<TH>Apellidos</TH>\n");
            print ("<TH>Marca</TH>\n");
            print ("<TH>Modelo</TH>\n");
            print ("<TH>Prestado dia</TH>\n");
            print ("<TH>Devuelto dia</TH>\n");
           
            print ("</TR>\n");
   
            for ($i=0; $i<$nfilas; $i++)
            {
               $resultado = mysqli_fetch_array ($consulta);
               print ("<TR>\n");
               print ("<TD>" . $resultado['nombre'] . "</TD>\n");
               print ("<TD>" . $resultado['apellidos'] . "</TD>\n");
               print ("<TD>" . $resultado['marca'] . "</TD>\n");
               print ("<TD>" . $resultado['modelo'] . "</TD>\n"); 
               print ("<TD>" . $resultado['prestado'] . "</TD>\n"); 
               if (!$resultado["devuelto"]){
                print ("<TD>No se ha devuelto</TD>\n");
               }
               else{
                print ("<TD>" . $resultado['devuelto'] . "</TD>\n");
               }   
               
               print ("</TR>\n");
            }
   
            print ("</TABLE> </div>\n");
         }
         else
            print ("<h2 style='color: white;'>No hay alquileres disponibles</h2>");
    
   mysqli_close ($host);
    ?>
    </div>
</body>
</html>
