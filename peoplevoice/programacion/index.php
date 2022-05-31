<?php
include "../template/cabecera.php";
require("../conexion/conexion.php");

$id = $_SESSION['id'];
$query = "SELECT emisora.id,emisora.nombre AS Emisora,emision.fecha AS Fecha_Emision,emision.hora_inicio,emision.repeticion,emision.duracion,programa.nombre AS  Programa,genero.nombre AS Genero FROM emisora INNER JOIN emision on emisora.id=emision.cod_radio INNER JOIN programa_emision on emision.codigo=programa_emision.cod_emision INNER JOIN programa on programa.id = programa_emision.cod_programa INNER JOIN genero ON programa.genero=genero.id WHERE emision.cod_radio=emisora.id";

$consulta = mysqli_query($conexion, $query);

?>

<title>Registros</title>
<link rel="icon" href="../img/logoproyecto.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/08d5411115.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                        <th>EMISORA</th>
                        <th>PROGRAMA</th>
                        <th>GÉNERO</th>
                        <th>FECHA DE EMISIÓN</th>
                        <th>HORA DE INICIO</th>
                        <th>DURACIÓN</th>
                        <th>¿PROGRAMA REPETIDO?</th>

                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['Emisora'] ?></td>
                                <td><?php echo $row['Programa'] ?></td>
                                <td><?php echo $row['Genero'] ?></td>
                                <td><?php echo $row['Fecha_Emision'] ?></td>
                                <td><?php echo $row['hora_inicio'] ?></td>
                                <td><?php echo $row['duracion'] ?> HORAS</td>
                                <td><?php echo $row['repeticion'] ?></td>

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

<?php
  include "../template/footer.php"
  ?>
