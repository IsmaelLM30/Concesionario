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
    <form action="Coches_buscar1.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
        <label class="letras" for="modelo">Modelo: </label>
        <input class="letras" type="text" name="modelo" >
        <label style="margin-left: 150px;" class="letras" for="marca">Marca: </label>
        <input class="letras" type="text" name="marca" >
        <label style="margin-left: 150px;" class="letras" for="color">Color: </label>
        <input class="letras" type="text" name="color" >
        <br><br><br>
        <label class="letras" for="precio">Precio: </label>
        <input class="letras" type="number" name="precio" >
        <label style="margin-left: 150px;" class="letras" for="alquilado">Alquilado: </label>
        <select name="alquilado">
            <option value="3">Elige opción</option>
            <option value="1">si</option>
            <option value="0">no</option>
        </select>
        <label style="margin-left: 220px;" class="letras" for="foto">Foto: </label>
        <input class="letras" type="text" name="foto" >
        <br><br><br>
        <div style="text-align: center;">
            <input type="submit" value="Buscar" style="color: white; background-color: black;">
        </div>
        
    </form>
</body>
</html>
