<?php
include "../template/cabecera.php";
require("../conexion/conexion.php");


$query = "SELECT * FROM compañia";

$consulta = mysqli_query($conexion, $query);

?>
<title>Productora</title>
<link rel="icon" href="../img/logoproyecto.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/08d5411115.js" crossorigin="anonymous"></script>

</head>

<body>

    <script>
        function delet() {
            const respuesta = confirm('¿Seguro que deseas ELIMINAR esta productora?');
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }

        }
    </script>

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
                        <th>NÚMERO DE REGISTRO</th>
                        <th>NOMBRE DE PRODUCTORA</th>
                        <th>TELÉFONO</th>
                        <th>ACCIONES</th>


                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <form action="./info_productora.php" method="POST">
                                <tr>
                                    <td><?php echo $row['num_registro'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['telefono'] ?></td>
                                    <td><button type="button" class="editar btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $row['num_registro'] ?>" data-nombre="<?php echo $row['nombre'] ?>" data-telefono="<?php echo $row['telefono'] ?>">Editar</button>

                                        <button type="submit" name="eliminar" value="<?php echo $row['num_registro'] ?>" class="btn btn-danger" onclick="return delet()">Eliminar</button>
                                    </td>


                                </tr>
                            </form>

                        <?php
                        }

                        ?>
                        <script>
                            const table = document.querySelector('.table')
                            table.addEventListener('click', e => {
                                if (e.target.classList.contains('editar')) {
                                    const btnmodal = e.target;
                                    document.querySelector('#id').value = btnmodal.dataset.id;
                                    document.querySelector('#nombre').value = btnmodal.dataset.nombre;
                                    document.querySelector('#telefono').value = btnmodal.dataset.telefono;

                                }
                            })
                        </script>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Información</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="info_productora.php" method="post">

                                            <label for="id"># REGISTRO:
                                                <input type="text" name="id" id="id" readonly>
                                            </label><br><br>

                                            <label for="nombre">
                                                Nombre:
                                                <input type="text" name="nombre" id="nombre">
                                            </label><br><br>

                                            <label for="telefono">
                                                Teléfono:
                                                <input type="text" name="tel" id="telefono">
                                            </label><br><br>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="editar" class="btn btn-success" onclick="editar()">Editar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['tel'];


        $sql = "UPDATE compañia SET nombre='$nombre' , telefono='$telefono' WHERE num_registro = '$id'";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Datos Actualizados Correctamente'   
                          })                  
                        </script>
                        ";
        }
    }

    if (isset($_POST['eliminar'])) {
        $id = $_POST['eliminar'];

        include "../conexion/conexion.php";

        $sql = "DELETE FROM compañia WHERE num_registro = '$id'";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Productora Eliminada'   
              })
          
            </script>
            ";
        } else {
            echo "Error " . mysqli_error($conexion);
        }
    }
    ?>
</body>

</html>