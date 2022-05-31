<?php
include "../template/cabecera.php";
include '../conexion/conexion.php';

$id = $_POST['id'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$password = hash('sha512', $password);


$validar_oyente = mysqli_query($conexion, "SELECT * FROM oyente WHERE id='$id' AND email='$correo' AND password='$password'");

if (mysqli_num_rows($validar_oyente) > 0) {
    $row = mysqli_fetch_row($validar_oyente);
    $_SESSION['oyente'] = $row[1];
    $_SESSION['id'] = $row[0];
    
    header("Location: oyente.php");
    exit();
  } else {
    echo  '<script>
    alert("Este Usuario oyente no existe, verifique los datos introducidos");
    window.location="ingresar.php";
    </script>';
    exit();
  }
