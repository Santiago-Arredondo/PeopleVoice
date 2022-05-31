<?php
include "./template/cabecera.php"
?>

<title>Registro de emisora</title>
<link rel="stylesheet" href="./css/styleRegistro.css">
</head>

<body background="img/fondo.jpg" , background-size="cover" , background-repeat="no-repeat" , background-position="center" , background-attachment="fixed">

    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./img/logoproyecto.jpg" alt="logo proyecto" width="70" height="60" class="d-inline-flex align-text-center"><br>
                INICIO
            </a>
        </div>
    </nav>
    <form action="Crearemisora.php" method="post" autocomplete="off">
        <section class="form-register">
            <center>
                <h4>Registro de Emisora</h4>
                <hr><br>
            </center>
            <input class="controls" type="text" name="id" placeholder="NIT">
            <input class="controls" type="text" name="nom" id="nom" placeholder="Nombre de la Emisora">
            <input class="controls" type="email" name="correo" id="correo" placeholder="Correo Electrónico">
            <input class="controls" type="txt" name="frec" placeholder="Frecuencia (kHz)">
            <br><label for="tipo">Tipo de Trasmisión: </label><br>
            <select name="tipo" class="controls" id="tipo">
                <option class="controls" id="tipo" value="" selected>Seleccione...</option>
                <option value="Am">AM</option>
                <option value="Fm">FM</option>
            </select>

            <div class="wrapp-input">
                <span class="icon-eye">
                    <i class="fas fa-eye-slash"></i>
                </span>
                <input class="controls" type="password" name="password" id="password" placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" required>
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

        $id = $_POST['id'];
        $nombre = $_POST['nom'];
        $password = $_POST['password'];
        $frecuencia = $_POST['frec'];
        $correo = $_POST['correo'];
        $tipo = $_POST['tipo'];
        //Encryptamiento de la contraseña.
        $password = hash('sha512', $password);

        require("./conexion/conexion.php");

        $sql = "INSERT INTO emisora(id,password,frec_rad,nombre,correo,tip_trans) VALUES('$id','$password','$frecuencia','$nombre','$correo','$tipo')";

        //Verificar que el id no se repita en la bd
        $verificar_id = mysqli_query($conexion, "SELECT * FROM emisora WHERE id='$id'");

        if (mysqli_num_rows($verificar_id) > 0) {
            echo
            '<script>
            alert("Este Nit de emisora ya existe, intenta nuevamente");
            window.location="Crearemisora.php";
            </script>';
            exit();
        }

        //Verificar que el nombre no se repita en la bd
        $verificar_nombre = mysqli_query($conexion, "SELECT * FROM emisora WHERE nombre='$nombre'");

        if (mysqli_num_rows($verificar_nombre) > 0) {
            echo
            '<script>
            alert("Este nombre de la emisora ya está registrado, intenta nuevamente");
            window.location="Crearemisora.php";
            </script>';
            exit();
        }


        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Datos registrados correctamente, Por Favor Inicia Sesión.');
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
    include "./template/footer.php"
    ?>