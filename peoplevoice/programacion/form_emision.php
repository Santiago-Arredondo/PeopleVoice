<?php
include "../template/cabecera.php"
?>

<title>Emisión</title>
<link rel="stylesheet" href="../css/styleRegistro.css">
<link rel="icon" href="../img/logoproyecto.jpg">
</head>

<body background="../img/fondo.jpg" , background-size="cover" , background-repeat="no-repeat" , background-position="center" , background-attachment="fixed">

    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../login/emisora.php">
                <img src="../img/logoproyecto.jpg" alt="logo proyecto" width="70" height="60" class="d-inline-flex align-text-center"><br>

            </a>
        </div>
    </nav>
    <form action="./form_emision.php" method="POST" autocomplete="off">
        <section class="form-register">
            <center>
                <h4>Registro de Emisión de Programa</h4>
                <hr><br>
            </center>
            <label for="fecha">Fecha de Emisión:

                <input class="controls" type="date" name="fecha" id="fecha" required>
            </label>

            <label for="hora">
                Hora Inicio de Programación
                <input class="controls" type="time" name="hora" id="hora" required>
            </label>

            <label for="durac">
                Duración (Horas)
                <input class="controls" type="txt" name="duracion" required>
            </label>

            <br><label for="repeat">¿Programa Repetido?: </label><br>
            <select name="repeat" id="repeat" required>
                <option value="" selected>Seleccione...</option>
                <option value="Si" selected>Si</option>
                <option value="No" selected>No</option><br>
            </select><br>

            <br><label for="emisora">Emisora: </label><br>
            <select name="emisora" id="emisora" required>
                <option value="" selected>Seleccione...</option>
                <?php
                include("../conexion/conexion.php");
                $query = "SELECT * FROM emisora";
                $consulta = mysqli_query($conexion, $query);
                if ($consulta) {
                    while ($row = mysqli_fetch_row($consulta)) {
                        echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                    }
                } else {
                    echo "Error en la consulta" . mysqli_error($conexion);
                }
                ?>
            </select>

            <hr>

            <input class="botonsreg" type="submit" value="REGISTRAR" name="registrar" required>

        </section>
    </form>
    <?php

    if (isset($_POST['registrar'])) {

        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $duracion = $_POST['duracion'];
        $repeat = $_POST['repeat'];
        $cod_radio = $_POST['emisora'];

        require("../conexion/conexion.php");

        $sql = "INSERT INTO emision(fecha,hora_inicio,duracion,repeticion,cod_radio) VALUES('$fecha','$hora','$duracion','$repeat','$cod_radio')";


        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Emisión Registrada correctamente');
            window.location='../login/emisora.php';  
            </script>
            ";
        } else {
            echo "Error en la consulta " . mysqli_error($conexion);
        }
    }
    ?>




    <?php
    include "../template/footer.php"
    ?>