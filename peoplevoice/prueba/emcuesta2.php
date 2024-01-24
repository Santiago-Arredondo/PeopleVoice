<?php
require('../conexion/conexion.php');
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    header('location: index.php');
}

if (isset($_POST['votar'])) {

    if (isset($_POST['valor'])) {
        $opciones = $_POST['valor'];
        $mod = mysqli_query($conexion, "SELECT * FROM opciones WHERE id = " . $opciones);
        while ($result = mysqli_fetch_object($mod)) {
            $valor = $result->valor + 1; // obtenemos el valor de 'valor' y le añadimos 1 unidad
            mysqli_query($conexion, "UPDATE opciones SET valor =  '" . $valor . "' WHERE id = " . $opciones); // luego ejecutamos el query SQL
        }
        echo  '<script>
        alert("Gracias por su opinión");
        window.location="../responderEncuestas.php";
        </script>';
        // Por ultimo lo redireccionamos a las encuestas nuevamente por si quiere contestar otra pregunta.
    }
}

?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Sistema de encuestas</title>
    <link rel="stylesheet" href="../css/encuesta.css">
    <link rel="icon" href="../img/logoproyecto.jpg">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>

<body>

    <div class="wrap">

        <form action="" method="POST">

            <?php
            $aux = 0;
            $sql = "SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.nombre as nombre, b.valor as valor FROM encuestas a INNER JOIN opciones b ON a.id = b.id_encuesta WHERE a.id = " . $id;
            $req = mysqli_query($conexion, $sql);

            while ($result = mysqli_fetch_object($req)) {

                if ($aux == 0) {
                    echo '<h1>' . $result->titulo . '</h1>';

                    echo '<ul class="votacion">';
                    $aux = 1;
                }

                echo '<li><label><input name="valor" type="radio" value="' . $result->id . '"><span>' . $result->nombre . '</span></label></li>';
            }
            echo '</ul>';

            if (!isset($_POST['valor'])) {
                echo "<div class='error'>Selecciona una opcion.</div>";
            }

            echo '<input name="votar" type="submit" value="Votar" class="votar">';
            // echo '<a href="resultado2.php?id=' . $id . '" class="resultado">Ver Resultados</a>';
            echo '<a href="index2.php" class="volver">← Volver</a>';
        
            ?>


        </form>

    </div>

</body>


</html>