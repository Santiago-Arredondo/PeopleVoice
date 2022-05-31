<?php
include "../template/cabecera.php"
?>

<title>Registro de Trabajadores</title>
<link rel="stylesheet" href="../css/styleRegistro.css">
<link rel="icon" href="../img/logoproyecto.jpg">
</head>

<body background="../img/fondo.jpg" , background-size="cover" , background-repeat="no-repeat" , background-position="center" , background-attachment="fixed">

    <nav class="navbar navbar-dark"><br><br>
        <div class="container-fluid">
            <a class="navbar-brand" href="../login/emisora.php">
                <img src="../img/logoproyecto.jpg" alt="logo proyecto" width="70" height="60" class="d-inline-flex align-text-center"><br>
            </a>
        </div>
    </nav>
    <form action="programa.php" method="post" autocomplete="off">
        <section class="form-register">
            <center>
                <h4>Registro de Programa</h4>
                <hr><br>
            </center>

            <label for="radio">Nit de Emisora: </label><br>
            <select name="radio" id="radio" required>
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

           <br><br><input class="controls" type="text" name="nom" placeholder="Nombre del programa" required>

            <br><br><label for="genero">Género: </label><br>
            <select name="genero" id="genero" required>
                <option value="" selected>Seleccione...</option>
                <?php
                include("../conexion/conexion.php");
                $query = "SELECT * FROM genero";
                $consulta = mysqli_query($conexion, $query);
                if ($consulta) {
                    while ($row = mysqli_fetch_row($consulta)) {
                        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
                    }
                } else {
                    echo "Error en la consulta" . mysqli_error($conexion);
                }
                ?>
            </select>

            <br><br><label for="productora">Compañia Productora: </label><br>
            <select name="productora" id="productora" required>
                <option value="" selected>Seleccione...</option>
                <?php
                include("../conexion/conexion.php");
                $query = "SELECT * FROM compañia";
                $consulta = mysqli_query($conexion, $query);
                if ($consulta) {
                    while ($row = mysqli_fetch_row($consulta)) {
                        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
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

        $nombre = $_POST['nom'];
        $genero = $_POST['genero'];
        $radio = $_POST['radio'];
        $productora = $_POST['productora'];

        require("../conexion/conexion.php");

        $sql = "INSERT INTO programa (nombre, genero, id_radio,id_compañia) VALUES  ('$nombre','$genero','$radio','$productora')";

        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Datos registrados correctamente');
            window.location='../login/emisora.php';  
            </script>
            ";
        } else {
        // echo "Error en la consulta " . mysqli_error($conexion);
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Error en la inserción.',
              })
          
            </script>
            ";
        }
    }
    ?>

    <?php
    include "../template/footer.php"
    ?>