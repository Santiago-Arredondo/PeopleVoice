<?php
include "../template/cabecera.php";
include "../conexion/conexion.php";


if (!isset($_SESSION['emisora'])) {
    echo  '<script>
    alert("Debes iniciar sesión");
    window.location="ingresar.php";
    </script>';
    session_destroy();
    die();
}
?>

<title>EMISORA</title>
<link rel="stylesheet" href="../css/bootstrap.min (3).css">
<link rel="icon" href="../img/logoproyecto.jpg">
<link rel="stylesheet" href="../css/emisora.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <center>
                <br>
                <H1 style="margin-left:90%" class="navbar-brand"><?php echo "Bienvenida Emisora " . $_SESSION['emisora'] . " "; ?><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-broadcast-pin" viewBox="0 0 16 16">
                        <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM6 8a2 2 0 1 1 2.5 1.937V15.5a.5.5 0 0 1-1 0V9.937A2 2 0 0 1 6 8z" />
                    </svg></H1><br>
            </center>

        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-">
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                    MI Perfil
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="../actualizar_emisora.php">Actualizar Datos</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                    ¿Qué quieres hacer?
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="../prueba/agregar.php">Añadir Encuesta</a></li>
                    <li><a class="dropdown-item" href="../programacion/trabajadores.php">Registrar Trabajador</a></li>
                    <li><a class="dropdown-item" href="../programacion/actualizar_trabajador.php">Actualizar Trabajadores</a></li>
                    <li><a class="dropdown-item" href="../programacion/productora.php">Registrar Compañia Productora</a></li>
                    <li><a class="dropdown-item" href="../programacion/info_productora.php">Información de Productoras</a></li>
                    <li><a class="dropdown-item" href="../programacion/form_emision.php">Registrar Emisión de Programa</a></li>
                    <li><a class="dropdown-item" href="../programacion/actualizar_emision.php">Actualizar Emisión de Programa</a></li>
                    <li><a class="dropdown-item" href="../programacion/programa.php">Crear Nuevo Programa</a></li>
                    <li><a class="dropdown-item" href="../programacion/index.php">Consultar Datos De Emisión</a></li>
                    <li><a class="dropdown-item" href="../programacion/info_trabajador.php">Consultar Información De Trabajadores</a></li>
                

                </ul>
            </div>


            <div class="collapse navbar-collapse" id="navbarColor03">


            </div>
            <form class="d-flex">

                <a style="color: white; text-decoration: none; cursor:pointer; margin-right: 20px" href="../cerrar.php">Cerrar sesión <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg></a>

            </form>
        </div>
    </nav><br>


    <?php
    include "../template/footer.php"
    ?>