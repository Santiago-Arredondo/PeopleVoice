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

<title>Actualizar Datos de Emisión</title>
<link rel="icon" href="../img/logoproyecto.jpg">
</head>

<body>

    <?php

    $sql = "SELECT * FROM emision";

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
                        <th>CÓDIGO DE EMISIÓN</th>
                        <th>FECHA DE EMISIÓN</th>
                        <th>HORA DE INICIO</th>
                        <th>DURACIÓN (HORAS)</th>
                        <th>¿PROGRAMA REPETIDO?</th>
                        <th>ACCIONES</th>

                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                            <form action="actualizar_emision.php" method="POST">
                                <tr>
                                    <td><?php echo $row['codigo'] ?></td>
                                    <td><?php echo $row['fecha'] ?></td>
                                    <td><?php echo $row['hora_inicio'] ?></td>
                                    <td><?php echo $row['duracion'] ?></td>
                                    <td><?php echo $row['repeticion'] ?></td>
                                    <td><button type="button" class="editar btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-codigo="<?php echo $row['codigo'] ?>" data-fecha="<?php echo $row['fecha'] ?>" data-hora="<?php echo $row['hora_inicio'] ?>"data-duracion="<?php echo $row['duracion'] ?>"data-repeticion="<?php echo $row['repeticion'] ?>">Editar</button>

                                        <button type="submit" name="eliminar" value="<?php echo $row['codigo'] ?>" class="btn btn-danger" onclick="return delet()">Eliminar</button>
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
                                    document.querySelector('#codigo').value = btnmodal.dataset.codigo;
                                    document.querySelector('#fecha').value = btnmodal.dataset.fecha;
                                    document.querySelector('#hora').value = btnmodal.dataset.hora;
                                    document.querySelector('#duracion').value = btnmodal.dataset.duracion;
                                    document.querySelector('#repeticion').value = btnmodal.dataset.repeticion;

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
                                        <form action="" method="POST">
                                            <label for="fecha">Código de Emisión:
                                                <input type="txt" name="codigo" id="codigo" readonly>
                                            </label><br><br>

                                            <label for="fecha">Fecha de Emisión:
                                                <input type="date" name="fecha" id="fecha">
                                            </label><br><br>

                                            <label for="hora">
                                                Hora de Inicio:
                                                <input type="time" name="hora" id="hora">
                                            </label><br><br>

                                            <label for="duracion">
                                                Duración:
                                                <input type="text" name="duracion" id="duracion">
                                            </label><br><br>

                                            <label for="repeticion">
                                                Repetición:
                                                <input type="text" name="repeticion" id="repeticion">
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
        $codigo = $_POST['codigo'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $duracion = $_POST['duracion'];
        $repeticion = $_POST['repeticion'];


        $sql = "UPDATE emision SET fecha='$fecha',hora_inicio='$hora',duracion='$duracion',repeticion='$repeticion' WHERE codigo = '$codigo'";

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
        $codigo = $_POST['eliminar'];

        include "../conexion/conexion.php";

        $sql = "DELETE FROM emision WHERE codigo = '$codigo'";

        $consulta = mysqli_query($conexion, $sql);

        if ($consulta) {

            echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Emisión Eliminada con éxito.'   
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