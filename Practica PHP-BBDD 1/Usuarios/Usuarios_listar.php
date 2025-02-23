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
        $instruccion = "select * from usuarios";
        $consulta = mysqli_query ($host,$instruccion)
         or die ("Fallo en la consulta");
         $nfilas = mysqli_num_rows ($consulta);
         if ($nfilas > 0)
         {
            print("<div class='colocar'>");
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Nombre</TH>\n");
            print ("<TH>Apellido</TH>\n");
            print ("<TH>Saldo</TH>\n");
            print ("<TH>DNI</TH>\n");          
            print ("</TR>\n");
   
            for ($i=0; $i<$nfilas; $i++)
            {
               $resultado = mysqli_fetch_array ($consulta);
               print ("<TR>\n");
               print ("<TD>" . $resultado['nombre'] . "</TD>\n");
               print ("<TD>" . $resultado['apellidos'] . "</TD>\n");
               print ("<TD>" . $resultado['saldo'] . "</TD>\n");
               print ("<TD>" . $resultado['dni'] . "</TD>\n");

               print ("</TR>\n");
            }
   
            print ("</TABLE> </div>\n");
         }
         else
            print ("<h2 style='color: white;'>No hay Usuarios disponibles</h2>");
    
   mysqli_close ($host);
    ?>
    </div>
</body>
</html>
