<?php
include "../template/cabecera.php"
?>

<title>Productora</title>
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
    <form action="" method="post" autocomplete="off">
        <section class="form-register">
            <center>
                <h4>Registro de Compañia Productora</h4>
                <hr><br>
            </center>
            <input class="controls" type="text" name="id" placeholder="Número de Registro (RFC)" required>
            <input class="controls" type="text" name="nom" placeholder="Nombre" required>
            <input class="controls" type="text" name="tel" placeholder="Teléfono" required>

            <hr>

            <input class="botonsreg" type="submit" value="REGISTRAR" name="registrar" required>

        </section>
    </form>
    <?php
    if (isset($_POST['registrar'])) {

        $id = $_POST['id'];
        $nombre = $_POST['nom'];
        $tel = $_POST['tel'];

        require("../conexion/conexion.php");

        $sql = "INSERT INTO compañia(num_registro,nombre,telefono) VALUES('$id','$nombre','$tel')";


        $verificar_nombre = mysqli_query($conexion, "SELECT * FROM compañia WHERE nombre='$nombre'");

        if (mysqli_num_rows($verificar_nombre) > 0) {
            echo
            '<script>
            alert("Este nombre de la compañia productora ya está registrado, intenta nuevamente");
            window.location="productora.php";
            </script>';
            exit();
        }

        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Datos registrados correctamente');
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