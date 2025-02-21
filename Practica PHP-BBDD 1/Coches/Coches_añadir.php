<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "../Index/Index.php"?>
</head>
<body>
    </div>


        <form action="Coches_añadir.php" method="post" enctype="multipart/form-data" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
            <label class="letras" for="modelo">Modelo: </label>
            <input class="letras" type="text" name="modelo" required>
            <label style="margin-left: 150px;" class="letras" for="marca">Marca: </label>
            <input class="letras" type="text" name="marca" required>
            <label style="margin-left: 150px;" class="letras" for="color">Color: </label>
            <input class="letras" type="text" name="color" required>
            <br><br><br>
            <label class="letras" for="precio">Precio: </label>
            <input class="letras" type="number" name="precio" required>
            <label style="margin-left: 150px;" class="letras" for="alquilado">Alquilado: </label>
            <select name="alquilado">
                <option value="1">si</option>
                <option value="0">no</option>
            </select>
            <label style="margin-left: 220px;" class="letras" for="foto">Foto: </label>
            <input class="letras" type="file" name="image" accept="image/*" required>
            <br><br><br>
            <div style="text-align: center;">
                <input type="submit" value="Añadir" style="color: white; background-color: black;" >
            </div>
            
        </form>
    
</body>
</html>
