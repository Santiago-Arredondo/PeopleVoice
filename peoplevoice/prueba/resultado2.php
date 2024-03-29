<?php

require('../conexion/conexion.php');

if (!isset($_GET['id'])) {
    header('location: index.php');
}

$suma = 0;
$id = $_GET['id'];
$mod = mysqli_query($conexion, "SELECT SUM(valor) as valor FROM opciones WHERE id_encuesta = " . $id);
while ($result = mysqli_fetch_object($mod)) {
    $suma = $result->valor;
}

?>

<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Encuestas</title>
    <link rel="stylesheet" href="../css/encuesta.css">
    <link rel="icon" href="../img/logoproyecto.jpg">
</head>

<body>
    <div class="wrap">
        <form action="" method="post">
            <?php
            $aux = 0;
            $sql = "SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.nombre as nombre, b.valor as valor FROM encuestas a INNER JOIN opciones b ON a.id = b.id_encuesta WHERE a.id = " . $id;
            $req = mysqli_query($conexion, $sql);

            while ($result = mysqli_fetch_object($req)) {
                if ($aux == 0) {
                    echo "<h1>" . $result->titulo . "</h1>";
                    echo "<ul class='votacion'>";
                    $aux = 1;
                }
                echo '<li><div class="fl">' . $result->nombre . '</div><div class="fr">Votos: ' . $result->valor . '</div>';
                if ($suma == 0) {
                    echo '<div class="barra cero" style="width:0%;"></div></li>';
                } else {
                    echo '<div class="barra" style="width:' . ($result->valor * 100 / $suma) . '%;">' . round($result->valor * 100 / $suma) . '%</div></li>';
                }
            }
            echo '</ul>';

            if (isset($aux)) {
                echo '<span class="fr">Total: ' . $suma . '</span>';
                echo '<a href="emcuesta2.php?id=' . $id . '"" class="volver">← Volver</a>';
            }

            ?>
            </ul>
        </form>
    </div>
</body>

</html>