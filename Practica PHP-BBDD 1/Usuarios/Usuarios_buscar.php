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

        <form action="Usuarios_buscar.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
            <label class="letras" for="nombre">Nombre: </label>
            <input class="letras" type="text" name="nombre1" >
            <label style="margin-left: 150px;" class="letras" for="apellido">Apellido: </label>
            <input class="letras" type="text" name="apellido" >
            <br><br><br>
            <label class="letras" for="saldo" style="margin-left: 20px;">Saldo: </label>
            <input class="letras" type="number" name="saldo"  >
            <label style="margin-left: 175px;" class="letras" for="DNI">DNI: </label>
            <input class="letras" type="text" name="DNI" >
            <br><br><br>
            <div style="text-align: center;">
                <input type="submit" value="Buscar" style="color: white; background-color: black;">
            </div>
            
        </form>
    
</body>
</html>
