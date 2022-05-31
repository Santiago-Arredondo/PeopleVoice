<?php
include "./template/cabecera.php"
?>

<?php
$showPassword = false;

if (isset($_POST['enviar'])) {
    $correo = $_POST['correo'];
    $id = $_POST['id'];

    include "./conexion/conexion.php";

    $sql = "SELECT * FROM emisora WHERE correo = '$correo' AND id='$id'";
    $consulta = mysqli_query($conexion, $sql);

    $row = mysqli_num_rows($consulta);
    if ($row == 1) {
        $showPassword = true;
    } else {
        $showPassword = false;
    }
}
?>

<title>Recuperar Contraseña</title>
<link rel="stylesheet" href="./css/styleRegistro.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body background="img/fondo.jpg" , background-size="cover" , background-repeat="no-repeat" , background-position="center" , background-attachment="fixed">

    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./login/ingresar.php">
                <img src="./img/logoproyecto.jpg" alt="logo proyecto" width="70" height="60" class="d-inline-flex align-text-center"><br>
                Regresar
            </a>
        </div>
    </nav>
    <form action="restaurarE.php" method="POST" autocomplete="off">

        <section class="form-register">
            <?php

            if (!$showPassword) {
            ?>
                <center>
                    <h4>Restaurar Contraseña</h4>
                    <hr><br>
                </center>

                <input class="controls" type="txt" name="id" id="id" placeholder="Ingrese su Documento de identificación">
                <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo Electrónico">

                <input class="botonsreg" type="submit" value="ENVIAR" name="enviar" required>
                <?php }
            if (isset($_POST['enviar'])) {

                if ($showPassword) {
                    $id = mysqli_fetch_assoc($consulta);

                ?>
                    <input class="controls" type="hidden" value="<?php echo $id['id'] ?>" name="id">
                    <input class="controls" type="password" name="newPassword" placeholder="Nueva Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" required>
                    <input class="botonsreg" type="submit" value="Aceptar" name="aceptar" required>
            <?php
                } else {
                    echo "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!!...',
                        text: 'Credenciales Incorrectas, intente de nuevo',
                      })
                    </script>
                    ";
                }
            }
            ?>
        </section>
    </form>
    <?php
    if (isset($_POST['aceptar'])) {
        $newPassword = $_POST['newPassword'];
        $newPassword = hash('sha512', $newPassword);
        $id = $_POST['id'];

        include "./conexion/conexion.php";

        // echo "Este es el id " . $id;
        $query = "UPDATE emisora SET password='$newPassword' WHERE id='$id'";
        $consulta1 = mysqli_query($conexion, $query);

        if ($consulta1) {

            echo "
                    <script>
                   alert('Contraseña Actualizada Correctamente!!')
                    window.location.href='./login/ingresar.php'
                    </script>
                    ";
        } else {
            echo "
            <script>
           alert('No se pudo cambiar la contraseña, intente nuevamente')
            window.location.href='./restaurarE.php'
            </script>
            ";
        }
    }
    ?>


    <?php
    include "./template/footer.php"
    ?>