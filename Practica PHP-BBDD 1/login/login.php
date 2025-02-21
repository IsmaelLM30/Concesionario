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
    <div class="margen" style="margin-top: 40px; padding: 25px; background-color: black; opacity: 0.8; color: white; text-align: center; display: flex; justify-content: center;">
    <form action="login1.php" class="margen" style="text-align: center; border: 2px grey solid; background: white; border-radius: 12px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); width: 350px; margin-top: 10px; padding: 40px; background-color: black; opacity: 0.6; height: 300px;">
           <div class="centrar"> 
                <label class="letras" for="nombre">Nombre: </label>
                <input class="letras" type="text" name="nombre" required> 
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
            
                <button type="submit" value="Iniciar Sesion" style="color: white; background-color: black; margin-right: 10px;">Iniciar Sesion</button>
                
            
        </form>
        
    <?php
    if (isset($_SESSION["nombre"])) {
        print "<p class='letras'>Usted ya se ha registrado en la pagina con el nombre de: <strong>$_SESSION[nombre]</strong></p>\n";
    }
        $server = "localhost";
        $username = "root";
        $password = "rootroot";
        $database = "concesionario";
        $host = mysqli_connect($server, $username, $password, $database);
        if (!$host){
            die("Conexion fallida: " . mysqli_connect_error());
        }
        mysqli_close($host);
    ?>
    </div>

</body>
</html>
