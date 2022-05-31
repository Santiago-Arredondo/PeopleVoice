<?php
include "../template/cabecera.php";
require("../conexion/conexion.php");


$id = $_SESSION['id'];
if (isset($_SESSION['id'])) {

    $query = "SELECT trabajador.cc,trabajador.nombre,rol AS Cargo,programa.nombre AS Programa,compañia.nombre AS Compañia,telefono FROM trabajador INNER JOIN rol_trabajador on rol_trabajador.id_rol=trabajador.rol_trabajador INNER JOIN programa on programa.id=trabajador.id_programa INNER JOIN compañia on compañia.num_registro=trabajador.id_compañia";

    $consulta = mysqli_query($conexion, $query);
} else {
    echo "
            <script>
            alert('Inicia Sesión');
            window.location='../login/ingresar.php';
          
            </script>
            ";
}


?>

<title>Registros</title>
<link rel="icon" href="../img/logoproyecto.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/08d5411115.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="row justify-content-end">

        <nav class="navbar  btn-info bg-light bg-dark navbar-dark">
            <img class='justify-content-star' src="../img/logoproyecto.jpg" style="margin-left:10px;width: 70px;height:60px ;">

            <form>
                <a href="../login/emisora.php"><button class="btn btn-primary me-2 justify-content-end btn-outline-$primary" type="button"><i class="fa-solid fa-arrow-left "></i> Regresar</button></a>
            </form>

        </nav>

        <div class="container border text-center">
            <div class="row">

                <table class="table table-bordered table table-success table-striped" style="text-align: center;">
                    <thead>
                        <th>ID</th>
                        <th>TRABAJADOR</th>
                        <th>CARGO</th>
                        <th>PROGRAMA</th>
                        <th>COMPAÑIA PRODUCTORA</th>
                        <th>TELÉFONO PRODUCTORA</th>

                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <td><?php echo $row['cc'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['Cargo'] ?></td>
                                <td><?php echo $row['Programa'] ?></td>
                                <td><?php echo $row['Compañia'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>

                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>