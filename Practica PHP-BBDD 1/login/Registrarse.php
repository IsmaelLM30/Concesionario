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
                <button onclick="window.location.href='Registrarse.php'" style="color: white; background-color: black; margin-left: 10px;">Registrarse</button>
            
        </form>
    </div>

</body>
</html>
