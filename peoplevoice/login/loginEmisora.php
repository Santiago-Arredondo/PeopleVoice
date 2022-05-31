<?php
include "../template/cabecera.php";
include '../conexion/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$password = hash('sha512', $password);


$validar_emisora = mysqli_query($conexion, "SELECT * FROM emisora WHERE id='$id' AND nombre='$nombre' AND password='$password'");


if (mysqli_num_rows($validar_emisora) > 0) {
  $row = mysqli_fetch_row($validar_emisora);
    $_SESSION['emisora'] = $row[3];
    $_SESSION['id'] = $row[0];
    header("Location: emisora.php");
    exit();
} else {
    echo  '<script>
  alert("Este usuario Emisora no existe, verifique los datos introducidos");
  window.location="ingresar.php";
  </script>';
    exit();
}
