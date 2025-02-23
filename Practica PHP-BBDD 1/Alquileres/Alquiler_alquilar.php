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
            print("<form action='Alquiler_alquilar1.php' >");
            print("<div class='colocar'>");
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Modelo</TH>\n");
            print ("<TH>Marca</TH>\n");
            print ("<TH>Color</TH>\n");
            print ("<TH>Precio</TH>\n");
            print ("<TH>Alquilado</TH>\n");
            print ("<TH>Foto</TH>\n");
            print ("<TH>Vendedor</TH>\n");
            print ("<TH>Cual quieres editar</TH>\n");
            print ("</TR>\n");
   
            for ($i=0; $i<$nfilas; $i++)
            {
               $resultado = mysqli_fetch_array ($consulta);
               print ("<TR>\n");
               print ("<TD><input type='hidden' name='modelo[" . $resultado['id_coche'] . "]' value='" . $resultado['modelo'] . "'>" . $resultado['modelo'] . "</TD>\n");
               print ("<TD><input type='hidden' name='marca[" . $resultado['id_coche'] . "]' value='" . $resultado['marca'] . "'>" . $resultado['marca'] . "</TD>\n");
               print ("<TD><input type='hidden' name='color[" . $resultado['id_coche'] . "]' value='" . $resultado['color'] . "'>" . $resultado['color'] . "</TD>\n");
               print ("<TD><input type='hidden' name='precio[" . $resultado['id_coche'] . "]' value='" . $resultado['precio'] . "'>" . $resultado['precio'] . "</TD>\n");
               if ($resultado["alquilado"] == "1"){
                print ("<TD><input type='hidden' name='alquilado[" . $resultado['id_coche'] . "]' value='Si'>Si</TD>\n");
                print ("<TD><img src=' " . $resultado['foto'] . "' width='90px'></TD>\n");
                print ("<TD><input type='hidden' name='vendedor[" . $resultado['id_coche'] . "]' value='" . $resultado['vendedor'] . "'>" . $resultado['vendedor'] . "</TD>\n");
                print ("<TD> <input type= 'radio' name='id' value= '". $resultado['id_coche'] ."'> </TD> \n");
                
               }
               if ($resultado["alquilado"] == "0"){
                print ("<TD><input type='hidden' name='alquilado[" . $resultado['id_coche'] . "]' value='No'>No</TD>\n");
                print ("<TD><img src=' " . $resultado['foto'] . "' width='90px'></TD>\n");
                print ("<TD><input type='hidden' name='vendedor[" . $resultado['id_coche'] . "]' value='" . $resultado['vendedor'] . "'>" . $resultado['vendedor'] . "</TD>\n");
                print ("<TD> <input type= 'radio' name='id' value= '". $resultado['id_coche'] ."'> </TD> \n");
               }
               

   
               
               print ("</TR>\n");
               
            }
   
            print ("</TABLE></div> <br><input type='submit' value='Alquilar' style='margin-left: 490px; color: white; background-color: black;'></form>\n");
         }
         else
            print ("<h2 style='color: white;'>No hay vehiculos disponibles</h2>");
    
   mysqli_close ($host);
    ?>
    </div>
</body>
</html>