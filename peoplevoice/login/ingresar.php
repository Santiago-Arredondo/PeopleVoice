<?php
include "../template/cabecera.php";
include '../conexion/conexion.php';
?>

<title>Ingresar</title>
<link rel="icon" href="../img/logoproyecto.jpg">
<link rel="stylesheet" href="../css/ingresar.css">

</head>

<body background="../img/fondo.jpg">



  <nav class="navbar navbar-dark" ;>
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">
        <img src="../img/logoproyecto.jpg" alt="logo proyecto" width="70" height="60" class="d-inline-flex align-text-center"><br>
        INICIO
      </a>
    </div>
  </nav>

  <main>

    <div class="contenedor__todo">
      <div class="caja__trasera">
        <div class="caja__trasera-login">
          <h2>Emisora</h2>
          <i>
            <p>Si eres usuario emisora ingresa aquí</p>
          </i>
          <button id="btn__iniciar-sesion">Iniciar Sesión</button>
        </div>

        <div class="caja__trasera-register">
          <h2>Oyente</h2>
          <i>
            <p>Si eres usuario oyente ingresa aquí</p>
          </i>
          <button id="btn__registrarse">Iniciar Sesión</button>
        </div>
      </div>


      <!-- Formulario login-->
      <div class="contenedor__login-register">

        <!-- Emisora -->

        <form action="loginEmisora.php" method="POST" class="formulario__login">
          <h2>Iniciar Sesión Emisora</h2>

          <hr>
          <input type="text" name="id" placeholder="Nit" required>
          <hr>

          <input name="nombre" type="text" placeholder="Nombre de Emisora" required>
          <hr>

          <div class="wrapp-input">
            <span class="icon-eye">
              <i class="fas fa-eye-slash"></i>
            </span>
            <input type="password" name="password" placeholder="Contraseña" required>
          </div>

          <button type="submit" name="ingresar">
            Entrar
          </button>
          <hr>
          <p><a href="../Crearemisora.php">Registrate ahora</a></p>
          <p><a href="../restaurarE.php">Restablecer Contraseña</a></p>
        </form>


        <!-- Oyente -->
        <form action="loginOyente.php" method="POST" class="formulario__register">
          <h2>Iniciar Sesión Oyente</h2>

          <hr>
          <input type="text" name="id" placeholder="Id" required>
          <hr>

          <input name="correo" type="email" placeholder="Correo Electrónico" required>
          <hr>

          <div class="wrapp-input">
            <span class="icon-eye">
              <i id="boton" class="fas fa-eye-slash"></i>
            </span>
            <input type="password" name="password" placeholder="Contraseña" id="password" required>
          </div>

          <button type="submit" name="ingresar">
            Entrar
          </button>
          <hr>
          <p><a href="../Crearoyente.php">Registrate ahora</a></p>
          <p><a href="../restaurarO.php">Restablecer Contraseña</a></p>
        </form>

      </div>

    </div>

  </main>

  <script>
    var boton = document.getElementById('boton');
    var input = document.getElementById('password');

    boton.addEventListener('click', mostrarClave);

    function mostrarClave() {
      if (input.type == 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add("fa-eye");

      } else {
        input.type = 'password';
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      }

    }
  </script>

  <script src="../js/main.js"></script>


  <?php

  include "../template/footer.php";
  ?>