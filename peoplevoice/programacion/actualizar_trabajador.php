<?php
include "../template/cabecera.php";
include "../conexion/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<script>
    function delet() {
        const respuesta = confirm('¿Seguro que deseas ELIMINAR el Registro?');
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }
</script>

<title>Actualizar Datos de Trabajador</title>
<link rel="icon" href="../img/logoproyecto.jpg">
</head>

<body>

    <?php

    $sql = "SELECT * FROM trabajador";

    $consulta = mysqli_query($conexion, $sql);

    ?>

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
                        <th>NOMBRE</th>
                        <th>ACCIONES</th>

                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <form action="" method="POST">
                                <tr>
                                    <td><?php echo $row['cc'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><button type="button" class="editar btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $row['cc'] ?>" data-nombre="<?php echo $row['nombre'] ?>">Editar</button>

                                        <button type="submit" name="eliminar" value="<?php echo $row['cc'] ?>" class="btn btn-danger" onclick="return delet()">Eliminar</button>
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
                                        <form action="" method="post">
                                            <label for="id">Identificación:

                                                <input type="text" name="id" id="id" readonly>
                                            </label><br><br>

                                            <label for="nombre">
                                                Nombre:
                                                <input type="text" name="nombre" id="nombre">
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


        $sql = "UPDATE trabajador SET nombre='$nombre' WHERE cc = '$id'";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Datos Actualizados Exitosamente'   
                          })
                      
                        </script>
                        ";
        }
    }

    if (isset($_POST['eliminar'])) {
        $cc = $_POST['eliminar'];

        include "../conexion/conexion.php";

        $sql = "DELETE FROM trabajador WHERE cc = '$cc'";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Trabajador Eliminado'   
              })
          
            </script>
            ";
        } else {
            echo "Error " . mysqli_error($conexion);
        }
    }
    ?>

    <?php
    include "../template/footer.php"
    ?>