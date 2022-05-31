<?php
include "./template/cabecera.php";
include "./conexion/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">


<title>Actualizar Oyente</title>
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

        $sql = "SELECT * FROM oyente WHERE id = '$id'";

        $consulta = mysqli_query($conexion, $sql);
    } else {
        echo  '<script>
        alert("Debes iniciar sesión");
        window.location="./login/ingresar.php";
        </script>';
    }
    ?>
    <div class="row justify-content-end">

        <nav class="navbar  btn-info bg-light bg-dark navbar-dark">
            <img class='justify-content-star' src="./img/logoproyecto.jpg" style="margin-left:10px;width: 70px;height:60px ;">

            <form>
                <a href="./login/oyente.php"><button class="btn btn-primary me-2 justify-content-end btn-outline-$primary" type="button"><i class="fa-solid fa-arrow-left "></i> Regresar</button></a>
            </form>

        </nav>

        <div class="container border text-center">
            <div class="row">

                <table class="table table-bordered table table-success table-striped" style="text-align: center;">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
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
                                <td><?php echo $row['email'] ?></td>

                                <td>
                                    <form action="actualizar_oyente.php">
                                        <button type="button" class="editar btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $row['id'] ?>" data-nombre="<?php echo $row['nombre'] ?>" data-email="<?php echo $row['email'] ?>">Editar</button>


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
                                    document.querySelector('#email').value = btnmodal.dataset.email;
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

                                            <label for="email">Correo Electrónico

                                                <input type="txt" name="email" id="email">
                                            </label><br>

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
        $email = $_POST['email'];

        $sql = "UPDATE oyente SET nombre='$nombre' , email='$email' WHERE id = '$id'";

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

        $sql = "DELETE FROM oyente WHERE id = $id";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
            <script>
            alert('Oyente Eliminado');
            window.location='./crear.php';
          
            </script>
            ";
        } else {
            echo "
            <script>
            alert('No se puedo eliminar al usuario');
            window.location='actualizar_oyente.php';
            </script>
            ";
        }
    }
    ?>

    <?php
    include "./template/footer.php"
    ?>