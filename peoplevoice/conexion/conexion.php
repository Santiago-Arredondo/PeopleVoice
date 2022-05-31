<?php
 $conexion = mysqli_connect("localhost", "root", "", "proyecto");
// #Servidor, usuario, clave de usuario, base de datos
if (mysqli_connect_errno()) {
    throw new RuntimeException('Mysqli connection error: ' . mysqli_connect_error());
} else {
    // echo "Se realizó la conexión con la base de datos ";
}

// $host = "localhost";
// $bd = "proyecto";
// $usuario = "root";
// $contrasenia = "";

// try {
//     $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
//     // if ($conexion) {
//     //     // echo "Conectado a sistema";
//     // }
// } catch (Exception $ex) {
//     echo $ex->getMessage();
// }
