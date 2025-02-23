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
                $instruccion = "select * from usuarios where id_usuario = '$id'";
                $consulta = mysqli_query ($host,$instruccion)
                 or die ("Fallo en la consulta");
                 $resultado = mysqli_fetch_array ($consulta);
        ?>
    <form action="Usuarios_modificar3.php" class="margen" style="margin-top: 70px; padding: 25px; background-color: black; opacity: 0.6;">
        <label style="margin-left: 40px;" class="letras">ID</label>
        <input class="letras" type="text" name="id" value="<?php print $resultado['id_usuario'];?>" readonly> <br><br>
        <label class="letras" for="Nombre">Nombre: </label>
        <input class="letras" type="text" name="Nombre1" value="<?php print $resultado['nombre'];?>">
        <label style="margin-left: 150px;" class="letras" for="Apellidos">Apellidos: </label>
        <input class="letras" type="text" name="Apellidos" value="<?php print $resultado['apellidos'];?>">
        <label style="margin-left: 150px;" class="letras" for="saldo">saldo: </label>
        <input class="letras" type="text" name="saldo" value="<?php print $resultado['saldo'];?>">
        <br><br><br>
        <label class="letras" for="DNI">DNI: </label>
        <input class="letras" type="text" name="DNI" value="<?php print $resultado['dni'];?>">
        <label style="margin-left: 220px;" class="letras" for="contraseña">contraseña: </label>
        <input class="letras" type="password" name="contraseña" value="<?php print $resultado['password'];?>">
        <br><br><br>
        <div style="text-align: center;">
            <input type="submit" value="Modificar" style="color: white; background-color: black;">
        </div>
        
    </form>
</body>
</html>
