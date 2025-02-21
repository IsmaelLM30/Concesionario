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
        <?php
                $server = "localhost";
                $username = "root";
                $password = "rootroot";
                $database = "concesionario";
                $id = trim(strip_tags($_REQUEST['id']));
                $host = mysqli_connect($server, $username, $password, $database);
                if (!$host){
                    die("Conexion fallida: " . mysqli_connect_error());
                }
                $instruccion = "select * from coches where id_coche = '$id'";
                $consulta = mysqli_query ($host,$instruccion)
                 or die ("Fallo en la consulta");
                 $resultado = mysqli_fetch_array ($consulta);
        ?>
    <form action="Coches_modificar3.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
        <label style="margin-left: 40px;" class="letras">ID</label>
        <input class="letras" type="text" name="id" value="<?php print $resultado['id_coche'];?>" readonly> <br><br>
        <label class="letras" for="modelo">Modelo: </label>
        <input class="letras" type="text" name="modelo" value="<?php print $resultado['modelo'];?>">
        <label style="margin-left: 150px;" class="letras" for="marca">Marca: </label>
        <input class="letras" type="text" name="marca" value="<?php print $resultado['marca'];?>">
        <label style="margin-left: 150px;" class="letras" for="color">Color: </label>
        <input class="letras" type="text" name="color" value="<?php print $resultado['color'];?>">
        <br><br><br>
        <label class="letras" for="precio">Precio: </label>
        <input class="letras" type="number" name="precio" value="<?php print $resultado['precio'];?>">
        <label style="margin-left: 150px;" class="letras" for="alquilado">Alquilado: </label>
        <select name="alquilado" >
            <option value="1" <?php if ($resultado['alqujilado'] == '1') echo 'selected'; ?>>si</option>
            <option value="0" <?php if ($resultado['alquilado'] == '0') echo 'selected'; ?>>no</option>
        </select>
        <label style="margin-left: 220px;" class="letras" for="foto">Foto: </label>
        <input class="letras" type="text" name="foto" value="<?php print $resultado['foto'];?>">
        <br><br><br>
        <div style="text-align: center;">
            <input type="submit" value="Modificar" style="color: white; background-color: black;">
        </div>
        
    </form>
</body>
</html>
