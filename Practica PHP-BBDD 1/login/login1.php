<?php
session_start();
        $server = "localhost";
        $username = "root";
        $password = "rootroot";
        $database = "concesionario";
        $host = mysqli_connect($server, $username, $password, $database);
        if (!$host){
            die("Conexion fallida: " . mysqli_connect_error());
        }
        
        $nombre = trim(strip_tags($_REQUEST["nombre"]));
        $dni = trim(strip_tags($_REQUEST["DNI"]));
        $hash = trim(strip_tags($_REQUEST["contraseña"]));
        $sql = "select * from usuarios where nombre = '$nombre' and DNI = '$dni'";
        $consulta = mysqli_query ($host,$sql)
         or die ("Fallo en la consulta");
        $resultado = mysqli_fetch_array ($consulta);
        if (password_verify($hash, $resultado["password"])){
            $_SESSION["nombre"] = $resultado["nombre"];
            $_SESSION["saldo"] = $resultado["saldo"];
            $_SESSION["tipo"] = $resultado["tipo"];
            header("Location: ../Index/Index.php");
            exit();
            
        }
        else{
            echo "Error al iniciar sesion, el usuario, DNI o contraseña no son correctas";
        }
        mysqli_close($host);
    ?>