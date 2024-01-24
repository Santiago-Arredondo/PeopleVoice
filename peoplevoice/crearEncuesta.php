<?php
include "./template/cabecera.php";
include("./conexion/conexion.php");
?>

<title>Crear Encuestas</title>
<link rel="stylesheet" href="./css/bootstrap.min (5).css">


<body background="img/fondo.jpg">

    <div class="container">

        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <CEnter>
                        <br>
                        <h4>CREAR ENCUESTA SOBRE LAS PREFERENCIAS DE LOS OYENTES EN EL CONTENIDO DE UN PROGRAMA DE RADIO</h4><br>
                    </CEnter>
                </div>
                <hr>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <header>
                                <h5>
                                    1. Sexo
                                </h5>
                            </header>

                            <label>
                                <input type="radio" value="m" name="genero" required disabled />

                                Masculino
                            </label><br>

                            <input type="radio" value="f" name="genero" required disabled />
                            Femenino
                            </label>
                        </div>
                        <hr>
                        <label for="departamento">
                            <h5>2. Departamento de residencia</h5>

                        </label><br>
                        <select name="departamento" id="departamento" disabled>

                            <option value="" selected>Seleccione...</option>
                            <?php
                            include("./conexion/conexion.php");
                            $query = "SELECT * FROM departamentos";
                            $consulta = mysqli_query($conexion, $query);
                            if ($consulta) {
                                //echo "Funcionó la consulta";
                                while ($row = mysqli_fetch_row($consulta)) {
                                    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
                                }
                            } else {
                                echo "Error en la consulta" . mysqli_error($conexion);
                            }
                            ?>
                        </select>
                        <hr>

                        <div class="form-group">
                            <label for="edad">
                                <h5>3. Edad</h5>

                            </label><br>
                            <input type="number" id="edad" name="edad" value="" required disabled />
                        </div>
                        <hr>

                        <div>

                            <div>
                                <header>
                                    <h6>4.
                                        <textarea placeholder="Escriba su pregunta" class="form-control" name="" rows="3"></textarea>
                                    </h6>
                                </header>
                                <ol>

                                    <li>
                                        <label>

                                            <input type="radio" name="like" value="si" disabled />

                                            <span>Sí</span>

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="radio" name="like" value="no" disabled />

                                            <span>No</span>

                                        </label>
                                    </li>
                                </ol>
                                <label for="porque" class="form-label">¿Porqué?</label>
                                <textarea class="form-control" id="porque" col="1" rows="2" readonly></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <header>
                                <h6>
                                    5. <textarea placeholder="Pregunta con múltiple respuesta" class="form-control" name="" rows="2"></textarea>
                                </h6>
                            </header>

                            <div>
                                <ol>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="1" disabled>
                                            <input type="txt" name="" value="" placeholder="opcion 1">


                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="2" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 2">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="3" disabled />

                                            <input type="txt" name="" value="" placeholder="opcion 3">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="4" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 4">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="5" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 5">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="6" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 6">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="7" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 7">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="8" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 8">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="9" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 9">

                                        </label>
                                    </li>

                                    <li>
                                        <label>
                                            <input name="" type="hidden" />
                                            <input type="checkbox" name="" value="10" disabled />

                                            <span>Otra. Especifique</span>
                                            <input type="text" name="" value="" disabled />

                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <hr>

                        <div>
                            <header>
                                <h6>
                                    6. <textarea placeholder="Pregunta Multiple Respuesta con menos opciones" class="form-control" name="" rows="2"></textarea>
                                </h6>
                            </header>
                            <div>
                                <ol>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="1" disabled />

                                            <input type="txt" name="" value="" placeholder="opcion 1">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="2" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 2">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="3" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 3">

                                        </label>
                                    </li>

                                    <li>
                                        <label>

                                            <input type="checkbox" name="" value="4" disabled />
                                            <input type="txt" name="" value="" placeholder="opcion 4">

                                        </label>
                                    </li>


                                    <li>
                                        <label>
                                            <input name="" type="hidden" /><input type="checkbox" name="" value="" disabled />
                                            <span>Otra. Especifique</span>
                                            <input type="text" id="" name="" value="" disabled />

                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <hr><br>

                        <h3>Preguntas abiertas</h3><br>
                        <div>
                            <header>
                                <h6>
                                    8. <textarea placeholder="Escriba aqui su pregunta" class="form-control" name="" rows="2"></textarea>
                                </h6>
                            </header>
                            <div>
                                <textarea placeholder="Respuesta" class="form-control" name="" rows="3" disabled></textarea>
                            </div>
                        </div>
                        <br>
                        <hr>

                        <div>
                            <header>
                                <h6>
                                    9. <textarea placeholder="Escriba aqui su pregunta" class="form-control" name="" rows="2"></textarea>
                                </h6>
                            </header>
                            <div>
                                <textarea placeholder="Respuesta" class="form-control" name="" rows="3" disabled></textarea>
                            </div>
                        </div>
                        <hr><br>

                        <div class="form-group">
                            <div class="mb-6">
                                <label for="rec" class="form-label">10. Recomendaciones</label>
                                <textarea class="form-control" name="rec" id="rec" rows="3" disabled></textarea>
                            </div>
                        </div>
                        <hr>


                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="accion" value="Agregar" class="btn btn-success btn-lg">Agregar</button><br>
                            <button type="submit" name="accion" value="Cancelar" class="btn btn-primary">Cancelar</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>



    <?php
    include "./template/footer.php"
    ?>