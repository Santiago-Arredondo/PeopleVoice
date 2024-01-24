<?php
include "./template/cabecera.php";
include "./conexion/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">


<title>Actualizar Emisora</title>
</head>

<body>

    <script>
        function delet() {
            const respuesta = confirm('¿Seguro que quieres ELIMINAR tu usuario?');
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>


    <?php
    $id = $_SESSION['id'];

    if (isset($_SESSION['id'])) {

        $sql = "SELECT * FROM emisora WHERE id = '$id'";

        $consulta = mysqli_query($conexion, $sql);
    } else {
        echo  '<script>
        alert("Debes iniciar sesión");
        window.location="./login/ingresar.php";
        </script>';
    }
    ?>
    <div class="row justify-content-end">

        <nav class="navbar btn-info bg-light bg-dark navbar-dark">
            <img class='justify-content-star' src="./img/logoproyecto.jpg" style="margin-left:10px;width: 70px;height:60px ;">

            <form>
                <a href="./login/emisora.php"><button class="btn btn-primary me-2 justify-content-end btn-outline-$primary" type="button"><i class="fa-solid fa-arrow-left "></i> Regresar</button></a>
            </form>

        </nav>

        <div class="container border text-center">
            <div class="row">

                <table class="table table-bordered table table-success table-striped" style="text-align: center;">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>FRECUENCIA</th>
                        <th>TIPO DE TRANSMISIÓN</th>
                        <th>CORREO ELECTRÓNICO</th>
                        <th>ACCIONES</th>

                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['frec_rad'] ?></td>
                                <td><?php echo $row['tip_trans'] ?></td>
                                <td><?php echo $row['correo'] ?></td>
                                <td>
                                    <form action="actualizar_emisora.php">
                                        <button type="button" class="editar btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $row['id'] ?>" data-nombre="<?php echo $row['nombre'] ?>" data-frec="<?php echo $row['frec_rad'] ?>" data-trans="<?php echo $row['tip_trans'] ?>" data-correo="<?php echo $row['correo'] ?>">Editar
                                        </button>

                                        <button type="submit" name="eliminar" value="<?php echo $row['id'] ?>" class="btn btn-danger" onclick='return delet()'>Eliminar</button>

                                    </form>
                                </td>


                            </tr>

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
                                    document.querySelector('#frec').value = btnmodal.dataset.frec;
                                    document.querySelector('#trans').value = btnmodal.dataset.trans;
                                    document.querySelector('#correo').value = btnmodal.dataset.correo;

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
                                        <form action="actualizar_emisora.php" method="POST">
                                            <label for="id">Nit:
                                                <input type="text" name="id" id="id" readonly>
                                            </label><br><br>

                                            <label for="nombre">
                                                Nombre:
                                                <input type="text" name="nombre" id="nombre">
                                            </label><br><br>

                                            <label for="frec">
                                                Frecuencia Radial:
                                                <input type="text" name="frec" id="frec">
                                            </label><br><br>

                                            <label for="trans">
                                                Tipo de transmsión:
                                                <input type="text" name="trans" id="trans">
                                            </label><br><br>

                                            <label for="trans">
                                                Correo Electrónico:
                                                <input type="text" name="correo" id="correo">
                                            </label><br><br>

                                            <div class="modal-footer">
                                                <input type="submit" value="Editar" name="editar" class="btn btn-success" onclick='editar()'>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
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
        $frec = $_POST['frec'];
        $trans = $_POST['trans'];
        $correo = $_POST['correo'];

        include "./conexion/conexion.php";

        $sql = "UPDATE emisora SET nombre='$nombre', frec_rad='$frec',tip_trans='$trans', correo='$correo' WHERE id = '$id'";

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

    if (isset($_REQUEST['eliminar'])) {
        $id = $_GET['eliminar'];

        include "./conexion/conexion.php";

        $sql = "DELETE FROM emisora WHERE id = $id";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
            <script>
            alert('Emisora Eliminada');
            window.location='./crear.php';
          
            </script>
            ";
        } else {
            echo "
            <script>
            alert('No se pudo eliminar la emisora');
            window.location='actualizar_emisora.php';
            </script>
            ";
        }
    }

    include "./template/footer.php";
    ?>