<?php
require('./conexion/conexion.php');
$sql = "SELECT * FROM encuestas ORDER BY id DESC";
$req = mysqli_query($conexion, $sql);
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistema de encuestas</title>
    <link rel="icon" href="./img/logoproyecto.jpg">
    <link rel="stylesheet" href="./css/encuesta.css">

<body>
    <div class="wrap">
        <h1>Encuestas Disponibles</h1>
        <ul class="votacion index">
            <?php
            while ($result = mysqli_fetch_object($req)) {
                echo '<li><a href="./prueba/encuesta.php?id=' . $result->id . '">' . $result->titulo . '</a></li>';
            }
            ?>
            <hr><br><a href="./login/oyente.php"><- Página Principal</a>
        </ul>
    </div>
</body>

</html>