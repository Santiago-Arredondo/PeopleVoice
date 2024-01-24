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
    <form action="trabajadores.php" method="POST" autocomplete="off">
        <section class="form-register">
            <center>
                <h4>Registro de Trabajador</h4>
                <hr><br>
            </center>
            <input class="controls" type="text" name="id" placeholder="Identificación" required>
            <input class="controls" type="text" name="nom" placeholder="Nombre de trabajador" required>

            <br><br><label for="comp">Compañia Productora: </label><br>
            <select name="comp" id="comp" required>
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

            <br><label for="cargo">Cargo: </label><br>
            <select name="cargo" id="cargo" required>
                <option value="" selected>Seleccione...</option>
                <?php
                include("../conexion/conexion.php");
                $query = "SELECT id_rol,rol FROM rol_trabajador";
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

            <br><label for="prog">Programa: </label><br>
            <select name="prog" id="prog" required>
                <option value="" selected>Seleccione...</option>
                <?php
                include("../conexion/conexion.php");
                $query = "SELECT * FROM programa";
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

        $id = $_POST['id'];
        $nombre = $_POST['nom'];
        $comp = $_POST['comp'];
        $prog = $_POST['prog'];
        $cargo = $_POST['cargo'];

        require("../conexion/conexion.php");

        $sql = "INSERT INTO trabajador (cc, nombre, id_compañia, id_programa, rol_trabajador) VALUES ('$id','$nombre','$comp','$prog','$cargo')";

        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Datos registrados correctamente');
            window.location='../login/emisora.php';  
            </script>
            ";
        } else {

            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Error en la insercion, vuelve a intentar'   
              })
          
            </script>
            ";
        }
    }
    ?>

    <?php
    include "../template/footer.php"
    ?>