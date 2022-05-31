<?php
include "./template/cabecera.php"
?>
<title>Registro de Oyente</title>
<link rel="stylesheet" href="./css/styleRegistro.css">

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
    <form action="Crearoyente.php" method="post" autocomplete="off">
        <section class="form-register">
            <center>
                <h4>Registro de Oyente</h4>
                <hr><br>
            </center>
            <input class=" controls" type="text" name="id" placeholder="Documento" required>
            <input class=" controls" type="text" name="nombre" placeholder="Nombre" required>
            <input class="controls" type="email" name="correo" placeholder="Correo electrónico" required>

            <div class="wrapp-input">
                <span class="icon-eye">
                    <i class="fas fa-eye-slash"></i>
                </span>
                <input class="controls" type="password" name="password" placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número, una letra mayúscula y minúscula, y al menos 8 o más caracteres" required>
            </div>
            <hr>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="acepta" name="acepta" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    ¿ACEPTA QUE PEOPLE VOICE GUARDE SUS DATOS?
                </label>
            </div>

            <input class="botonsreg" type="submit" value="REGISTRAR" name="registrar" required>
            <p><a href="./login/ingresar.php">¿Ya tienes cuenta?</a></p>
        </section>
    </form>

    <?php

    if (isset($_POST['registrar'])) {

        $ide = $_POST['id'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $email = $_POST['correo'];
        //Encryptamiento de la contraseña.
        $password = hash('sha512', $password);

        require("./conexion/conexion.php");


        $sql = "INSERT INTO oyente(id,password,nombre,email) VALUES('$ide','$password','$nombre','$email')";

        //Verificar que el id no se repita en la bd
        $verificar_id = mysqli_query($conexion, "SELECT * FROM oyente WHERE id='$ide'");

        if (mysqli_num_rows($verificar_id) > 0) {
            echo
            '<script>
        alert("Este id de usuario ya existe, intenta nuevamente");
        window.location="Crearoyente.php";
    </script>';
            exit();
        }

        //Verificar que el email no se repita en la bd
        $verificar_email = mysqli_query($conexion, "SELECT * FROM oyente WHERE email='$email'");

        if (mysqli_num_rows($verificar_email) > 0) {
            echo
            '<script>
        alert("Este correo ya está registrado, intenta nuevamente");
        window.location="Crearoyente.php";
    </script>';
            exit();
        }

        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Datos registrados correctamente, Inicia Sesión');
            window.location='login/ingresar.php';  
            </script>
            ";
        } else {
            echo "Error en la consulta " . mysqli_error($conexion);
        }
    }
    ?>

    <script src="./js/main.js"></script>

    <?php
    include "./template/footer.php";
    ?>