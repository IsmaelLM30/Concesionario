<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Desplegable</title>
    <?php include "../index/Index.php"?>
</head>
<body>
    <form action="Usuarios_añadir1.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
        <label class="letras" for="nombre1">Nombre: </label>
        <input class="letras" type="text" name="nombre1" required>
        <label style="margin-left: 150px;" class="letras" for="apellido">Apellido: </label>
        <input class="letras" type="text" name="apellido" required>
        <label style="margin-left: 150px;" class="letras" for="contraseña">Contraseña: </label>
        <input class="letras" type="password" name="contraseña" required>
        <br><br><br>
        <label class="letras" for="saldo" style="margin-left: 20px;">Saldo: </label>
        <input class="letras" type="number" name="saldo" required >
        <label style="margin-left: 175px;" class="letras" for="DNI">DNI: </label>
        <input class="letras" type="text" name="DNI" required>
        <label style="margin-left: 120px;" class="letras" for="tipo">Tipo de Usuario: </label>
        <input class="letras" type="num" name="tipo" required placeholder="0 - Admin, 1 - Vendedor, 2 - Comprador">
        <br><br><br>
        <div style="text-align: center;">
            <input type="submit" value="Añadir" style="color: white; background-color: black;">
        </div>
    </form> 
</body>
</html>
