<?php include("template/header.php") ?>

<!--Acordeon-->
<section class="container">
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Recomendaciones
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Querido oyente, para responder una encuesta de una emisora especifica clickea la flecha azul ubicada más abajo y esta te llevará inmediatamente a las preguntas realizadas por la emisora correspondiente. <br>
          Esperemos haya sido de tu ayuda, gracias por usar nuestros servicios 😊.
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container">
  <hr>
  <h4>Lista de encuestas disponibles</h4>
  <table class="table table-dark table-striped">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Emisora</th>
        <th scope="col">Contestar</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>(Nombre de la emisora)</td>
        <td>
          <a href="responderEncuestas.php" <i class="fa-solid fa-reply">
          </a>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>(Nombre de la emisora)</td>
        <td>
          <a href="#"<i class="fa-solid fa-reply">         
          </a>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>(Nombre de la emisora)</td>
        <td>
          <a href="#" <i class="fa-solid fa-reply">
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</section>

<?php include("template/pie.php") ?>