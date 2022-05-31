<?php
include "../template/cabecera.php";
include "../conexion/conexion.php";


if (!isset($_SESSION['oyente'])) {
  echo  '<script>
    alert("Debes iniciar sesión");
    window.location="ingresar.php";
    </script>';
  session_destroy();
  die();
}

?>
<title>OYENTE</title>
<link rel="stylesheet" href="../css/bootstrap.min (3).css">
<link rel="icon" href="../img/logoproyecto.jpg">
<link rel="stylesheet" href="../css/oyente.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

      <center>
        <br><br>
        <H1 style="margin-left:100%" class="navbar-brand"> <?php echo "Bienvenido oyente " . $_SESSION['oyente']; ?> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="5'" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg></H1><br>
      </center>

    </div>
  </nav>



  <!--OnlineRadioBox Player widget-->
  <div class="orbP" id="orb_player_3c72b7dc181ba8a7" vlm="0.8">
    <style media="screen">
      /* General */
      .orbP {
        position: relative;
        box-sizing: border-box;
        overflow: hidden;
        font-weight: normal;
        border: 1px solid transparent;
        user-select: none;
        text-align: left
      }

      .orbP br,
      .orbP>br {
        display: none !important;
      }

      .orbP p,
      .orbP>p {
        margin: 0 !important;
        padding: 0 !important;
        line-height: normal !important;
        font-size: inherit !important
      }

      .orbPh {
        display: block;
        position: absolute;
        z-index: 100;
        top: 50%;
        margin-top: -12px !important;
        right: 10px;
        width: 21px !important;
        text-decoration: none !important;
        cursor: pointer
      }

      .orbPh>img {
        margin: 0 !important;
        border: none;
        height: 24px !important;
        -webkit-filter: drop-shadow(2px 2px 0 rgba(47, 99, 160, .2));
        filter: drop-shadow(2px 2px 0 rgba(47, 99, 160, .2))
      }

      .orbPt {
        text-decoration: none !important
      }

      .orbPti {
        float: left;
        margin: 0 10px 0 0 !important;
        vertical-align: top !important;
        height: 48px !important;
        width: 89px !important;
        border: none !important;
        border-radius: 2px !important;
        opacity: 1 !important
      }

      .orbPtn {
        display: block;
        margin-right: 52px;
        line-height: 24px !important;
        font-size: 17px !important;
        font-weight: bold !important;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap
      }

      .orbPtt {
        display: block;
        margin-right: 52px;
        text-decoration: none !important;
        line-height: 24px !important;
        font-size: 12px !important;
        opacity: .85;
        transition: opacity .2s;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap
      }

      .orbPtt:hover {
        opacity: 1
      }

      .orbPp,
      .orbPs {
        float: left !important;
        margin: 0 10px 0 0 !important;
        padding: 0 !important;
        height: 48px !important;
        width: 48px !important;
        line-height: 48px !important;
        border-radius: 2px !important;
        border: none !important;
        text-align: center !important;
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none !important;
      }

      .orbPp::before,
      .orbPs::before {
        display: inline-block;
        vertical-align: middle;
        content: '';
        width: 0;
        height: 0;
        border-style: solid
      }

      .orbPp::before {
        border-width: 16px 0 16px 26px
      }

      .orbPs::before {
        border-width: 16px
      }

      .orbPp:hover,
      .orbPs:hover {
        -webkit-transform: scale(1.087);
        transform: scale(1.087)
      }

      .orbPhc {
        position: relative !important;
        box-sizing: border-box !important;
        padding: 10px !important;
        overflow: hidden
      }

      /* Playlist */
      .orbPpl {
        position: relative;
        overflow: auto;
        overflow-x: hidden;
        overflow-y: auto;
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important
      }

      .orbPpli {
        box-sizing: border-box;
        margin: 0 !important;
        padding: 0 10px !important;
        list-style: none !important;
        background-image: none;
        float: none !important;
        height: auto !important
      }

      .orbPpli>a,
      .orbPpli>span {
        display: block !important;
        padding: 0 !important;
        margin: 0 !important;
        height: auto !important;
        font-weight: normal !important;
        text-decoration: none !important;
        line-height: 32px !important;
        font-size: 14px !important;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        transition: color .125s;
        border: none !important
      }

      .orbPpli>a:hover,
      .orbPpli>span:hover {
        background: transparent !important
      }

      .orbPpli>a>time,
      .orbPpli>span>time {
        display: inline-block;
        font-size: 12px !important;
        width: 3em !important
      }

      .orbPpli+li {
        border-style: solid !important;
        border-width: 1px 0 0 !important
      }

      /* Volume */
      .orbV {
        position: absolute;
        z-index: 1 !important;
        width: 24px !important;
        right: 48px !important;
        top: 0 !important;
        bottom: 0 !important;
        line-height: 1 !important;
        overflow: hidden !important;
        transition: width .3s
      }

      .orbV:hover {
        width: 160px !important
      }

      .orbVC {
        position: absolute !important;
        height: 18px !important;
        left: 24px !important;
        top: 50% !important;
        margin: -9px 0 0 11px !important
      }

      .orbVC::after {
        display: block;
        content: '';
        margin-top: 4px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 4px 100px 4px 0;
        opacity: .33
      }

      .orbVCs {
        position: absolute !important;
        z-index: 2 !important;
        top: 0 !important;
        width: 18px !important;
        height: 18px !important;
        border-radius: 50% !important;
        cursor: ew-resize !important;
        box-shadow: 0 6px 8px -2px rgba(0, 9, 18, 0.36)
      }

      .orbVb {
        position: absolute !important;
        width: 24px !important;
        height: 24px !important;
        top: 50% !important;
        left: 0 !important;
        margin-top: -12px;
        white-space: nowrap !important;
        cursor: pointer;
        transition: opacity .3s
      }

      .orbVb::before {
        display: inline-block;
        content: '';
        vertical-align: middle;
        width: 7px;
        height: 12px
      }

      .orbVb::after {
        display: inline-block;
        content: '';
        vertical-align: middle;
        border-width: 12px 12px 12px 0;
        border-style: solid;
        height: 0;
        width: 0;
        margin-left: -6px
      }

      .orbV:hover .orbVb {
        opacity: .33 !important;
        cursor: default
      }

      .orbVb>._m {
        display: block !important;
        width: 7px !important;
        height: 18px !important;
        position: absolute !important;
        top: 50%;
        margin-top: -9px !important;
        right: 0;
        overflow: hidden !important;
      }

      .orbVb>._m::before {
        display: block;
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        width: 28px;
        height: 24px;
        margin-top: -12px;
        border: 1px solid;
        border-radius: 50%
      }

      .orbVb>._m::after {
        display: block;
        content: '';
        position: absolute;
        right: 4px;
        top: 50%;
        width: 14px;
        height: 14px;
        margin-top: -7px;
        border: 1px solid;
        border-radius: 50%
      }

      /* Flags*/
      .orbF {
        padding: 0 0 10px 10px !important;
        border-top: 1px solid;
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-flow: row nowrap !important;
        flex-flow: row nowrap !important
      }

      .orbFl {
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important
      }

      .orbFli,
      .orbFh {
        display: inline-block !important;
        vertical-align: top !important;
        line-height: 18px !important;
        white-space: nowrap !important;
        margin: 10px 7px 0 0 !important;
        padding: 0 6px 0 0 !important;
        text-indent: 0 !important;
        list-style: none !important;
        font-size: 11px !important;
        text-align: right
      }

      .orbFlif {
        float: left !important;
        width: 27px !important;
        height: 18px !important;
        margin-right: 5px !important
      }

      .orbFhi {
        position: relative !important;
        display: inline-block !important;
        vertical-align: baseline !important;
        width: 8px !important;
        height: 9px !important;
        margin: 0 8px 0 5px !important;
        border-style: solid !important;
        border-width: 2px 1px 0 1px !important;
        border-radius: 5px 5px 0 0 !important;
        opacity: .5
      }

      .orbFhi::before,
      .orbFhi::after {
        display: block;
        content: '';
        position: absolute;
        bottom: -2px;
        width: 0;
        height: 3px;
        border-style: solid;
        border-width: 2px;
        border-radius: 3px
      }

      .orbFhi::before {
        left: -4px
      }

      .orbFhi::after {
        right: -4px
      }

      /* Multiselect */
      .orbPm {
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important
      }

      .orbPmi {
        position: relative;
        margin: 0 !important;
        padding: 10px !important;
        list-style: none !important;
        border: dotted rgba(204, 204, 204, 0.5);
        border-width: 1px 0 0;
        font-size: 12px !important;
        overflow: hidden;
        white-space: nowrap;
        line-height: 1 !important;
        cursor: pointer
      }

      .orbPmi::before {
        display: block;
        content: '';
        position: absolute;
        z-index: 1;
        top: 50%;
        right: 10px;
        margin-top: -8px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 0 8px 13px;
        opacity: .5;
        filter: alpha(opacity=50);
        transition: opacity .2s;
      }

      .orbPmi:hover::before {
        opacity: 1;
        filter: alpha(opacity=100)
      }

      .orbPmi::after {
        display: block;
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        width: 36px
      }

      .orbPmii {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        width: 30px;
        height: 16px;
        border: none !important;
        border-radius: 2px !important
      }

      .orbPmin {
        display: inline-block;
        vertical-align: middle;
      }

      /* Compact General */
      .cmpct .orbPti {
        height: 24px !important;
        width: 44px !important
      }

      .cmpct .orbPtn {
        line-height: 12px !important;
        font-size: 12px !important
      }

      .cmpct .orbPtt {
        line-height: 12px !important;
        font-size: 10px !important
      }

      .cmpct .orbPp,
      .cmpct .orbPs {
        height: 24px !important;
        width: 24px !important;
        line-height: 24px !important
      }

      .cmpct .orbPp::before {
        border-width: 8px 0 8px 13px !important
      }

      .cmpct .orbPs::before {
        border-width: 8px !important
      }

      /* Compact w/Playlist */
      .cmpct .orbPpli>a,
      .cmpct .orbPpli>span {
        line-height: 24px !important;
        font-size: 12px !important
      }

      .cmpct .orbPpli>a>time,
      .cmpct .orbPpli>span>time {
        font-size: 11px !important
      }
    </style>
    <style media="screen" id="orb_player_3c72b7dc181ba8a7_settings">
      .orbP {
        background-color: #262626 !important;
      }

      /*common player background*/
      .orbP {
        border-style: solid;
        border-color: #2f63a0 !important;
        border-radius: 5px;
      }

      /*common player container border, radius, width*/
      .orbPp,
      .orbPs {
        background: #d1d1d1 !important
      }

      /*buttons play/stop bg*/
      .orbPp::before {
        border-color: transparent transparent transparent #6b6b6b !important
      }

      /* play button color */
      .orbPs::before {
        border-color: #6b6b6b !important
      }

      /* stop button color */
      .orbPtn,
      .orbPtt,
      .orbPtt:hover {
        color: #fff0f0 !important;
      }

      /*station name & track link color*/
      .orbV {
        background-color: #262626 !important;
        box-shadow: 0 0 32px 32px #262626 !important
      }

      /*volume control color */
      .orbVC::after,
      .orbVb::after {
        border-color: transparent #6b6b6b transparent transparent !important
      }

      .orbVb::before,
      .orbVCs {
        background: #6b6b6b !important
      }

      /* volume bg color */
      .orbVb>._m::before,
      .orbVb>._m::after {
        border-color: #6b6b6b !important
      }
    </style>
    <div class="orbPhc">
      <a class="orbPh" href="https://onlineradiobox.com/co/" title="Emisoras en Vivo" target="_blank"><img src="//ecdn.onlineradiobox.com/img/wl.svg" alt="Emisoras en Vivo"></a>
      <audio id="orb_player_3c72b7dc181ba8a7_p" crossorigin="true" style="width:1px;height:1px;overflow:hidden;position:absolute;"></audio>

      <button class="orbPp" title="En Vivo" country="co" alias="lafm1069" stream="1"></button>
      <a class="orbPt" href="https://onlineradiobox.com/co/lafm1069/" target="_blank"><img class="orbPti" src="//us0-cdn.onlineradiobox.com/img/logo/8/22378.png" alt="La FM"><span class="orbPtn">La FM</span></a>
      <span class="orbPtt" loading="cargando" playing="en directo" error="error de reproduccion" not_supported="this browser can't play it" external="Escuchar ahora (Abrir en un reproductor emergente)" geo_blocked="No disponible en tu país"></span>
      <div class="orbV">
        <div class="orbVb"><i class="_m"></i></div>
        <div class="orbVC">
          <div class="orbVCs" style="left: 80%;"></div>
        </div>
      </div>
    </div>


    <script>
      var orbp_w = orbp_w || {
        lang: "es-es"
      };
      orbp_w.cmd = orbp_w.cmd || [];
      orbp_w.apiUrl = "https://onlineradiobox.com";
      orbp_w.cmd.push(function() {
        orbp_w.init("orb_player_3c72b7dc181ba8a7");
      });
      var s, t;
      s = document.createElement('script');
      s.type = 'text/javascript';
      s.src = "//ecdn.onlineradiobox.com/js/pwidget2.min.235ca64e.js";
      t = document.getElementsByTagName('script')[0];
      t.parentNode.insertBefore(s, t);
    </script>
  </div>
  <!--OnlineRadioBox Player widget-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-">
    <div class="container-fluid">

      <div class="dropdown">
        <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          Mi Perfil
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="../actualizar_oyente.php">Actualizar Datos</a></li>
        </ul>

      </div>

      <div class="dropdown">
        <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          Encuestas
        </button>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="../responderEncuestas.php">Responder</a></li>
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
  </nav>

  <?php
  include "../template/footer.php"
  ?>