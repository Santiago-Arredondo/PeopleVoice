<?php
include "./template/cabecera.php";
include "./conexion/conexion.php";
?>

<title>Crear Usuario</title>
<link rel="stylesheet" href="css/styleRegistro.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body background="img/fondo.jpg">


    <nav class="navbar navbar-dark" ;>
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./img/logoproyecto.jpg" alt="logo proyecto" width="70" height="60" class="d-inline-flex align-text-center"><br>
                INICIO
            </a>
        </div>
    </nav>

    <form action="crear.php" method="POST">
        <div class="form-register">
            <center>
                <h4>Crear Usuario</h4>
                <hr>
            </center>

            <div class="d-grid gap-2"><br>
                <input type="radio" class="btn-check" value="emisora" name="rol" id="rol">
                <label class="btn btn-lg btn-outline-dark" for="rol">Emisora</label>

                <br> <input type="radio" class="btn-check" value="oyente" name="rol" id="rol1">
                <label class="btn btn-lg btn-outline-dark" for="rol1">Oyente</label><br>
            </div>
            <hr>


            <div>
                <input class="botons" type="submit" value="CONTINUAR" name="continuar">
                <p><a href="./login/ingresar.php">Iniciar Sesión</a></p>
            </div>
    </form>


    <?php

    if (isset($_POST['continuar'])) {
        $rol = $_POST['rol'];

        if ($rol == 'oyente') {
            header('Location: crearOyente.php');
        } elseif ($rol == 'emisora') {
            header('Location: crearEmisora.php');
        } else {
            echo
            "<script>
            alert(    
                'Selecciona una opción',
                )
                window.location='crear.php'

            </script>";
            
            
        }
    }

    ?>

    <?php
    include "./template/footer.php";
    ?>