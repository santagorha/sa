<?php 
  
  require( '../app/usuario.php' );

  $classUser = new Usuario();
  print_r( mysqli_num_rows( $classUser->getUsuario() ) );

  // Comprobamos validez del usuario
  if ( $classUser->getUsuario() == false || empty( $_GET[ 'user' ] ) ) {
    header( 'location: index.html' );

  }

  // Traemos datos del usuario
  $dataUser = mysqli_fetch_array( $classUser->getUsuario() );

  print_r( $dataUser );

?>

<!doctype html>
<html>
<title>..::PoliEventos::..</title>
<head>

  <!--Julio Rodriguez - Andrés Sierra-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="lib/onsenui/css/onsen-css-components.min.css">
  <link rel="stylesheet" href="css/styleEventos.css">
  <link rel="stylesheet" href="css/perfil.css">

  <script src="lib/onsenui/js/onsenui.min.js"></script>
  <script src="lib/jquery/jquery-3.2.1.min.js"></script>

  <script src="js/constants.js"></script>
  
  <script src="js/menu.js"></script>
  <script src="js/Event.js"></script>
  <script src="js/historyEvents.js"></script>
  <script type="text/javascript" src="js/home.js"></script>
 
</head>

<body onload="init();">

<!--Menú desplegable-->
<ons-splitter>
  <ons-splitter-side id="menu" side="left" width="200px" collapse swipeable>
    <ons-page>
      <ons-list style="background:#10305c; color:white">
        <ons-list-item onclick="fn.load('home.html')" tappable>
          <div class="profile-pic">
            <?php if( ! empty( $dataUser[ 'FOTO' ] ) ): ?>
              <img src="img/<?= $dataUser[ 'FOTO' ] ?>" style="width: 100px; height: 100px; margin:8px" class="center">
            <?php else: ?>
              <img src="img/user.png" style="width: 100px; height: 100px; margin:8px" class="center">
            <?php endif; ?>
            
            <div><?= $dataUser[ 'NOMBRE1' ] . ' ' . $dataUser[ 'APELLIDO1' ] ?></div>
            <div>ID: <?= $dataUser[ 'ID_USUARIO' ] ?></div>
          </div>
        </ons-list-item>
        <ons-list-item onclick="fn.load('perfil.php?user=<?= $_GET[ 'user' ] ?>')" tappable>
          Perfil
        </ons-list-item>
        <ons-list-item onclick="window.location.href = 'lista-eventos.php?user=<?= $_GET[ 'user' ] ?>'" tappable>
          Eventos Guardados
        </ons-list-item>
        <ons-list-item onclick="fn.load('reserved.html')" tappable>
          Eventos Reservados
        </ons-list-item>
        <ons-list-item onclick="fn.load('settings.html')" tappable>
          Configuraciones
        </ons-list-item>
        <ons-list-item onclick="fn.load('about.html')" tappable>
          Acerca De...
        </ons-list-item>
      </ons-list>
    </ons-page>
  </ons-splitter-side>
  <ons-splitter-content id="content" page="home.html"></ons-splitter-content>
</ons-splitter>
 <!--Menú desplegable-->


 <template id="home.html">
<ons-page>

   <!--Bar header-->
   <ons-toolbar  style="background:#0458a0">
    <div class="toolbartop-text center" style="color:#fff; text-align: center">PoliGran 101</div> <!--texto central menu -->
    <div class="left">     <!--Btn menu -->
      <ons-toolbar-button onclick="fn.open()" >
        <ons-icon style="color:#fff " icon="ion-navicon"></ons-icon>
      </ons-toolbar-button>
    </div>
    <div class="right">     <!--Btn Config ... -->
      <ons-toolbar-button>
        <ons-icon style="color:#fff " icon="md-more-vert"></ons-icon>
      </ons-toolbar-button>
    </div>
  </ons-toolbar>
  <!--Fin Bar header-->

  

  <!-- Bar search Filter -->
  <div class="titlesearch center"> EDITAR PERFIL </div> <!-- Texto central filtros -->
  <div class="contentEditPerfil"> <!-- conten Bar search Filter y btn-->
    <?php if( ! empty( $dataUser[ 'FOTO' ] ) ): ?>
      <img src="img/<?= $dataUser[ 'FOTO' ] ?>" style="width: 100px; height: 100px; margin:8px" class="center">
    <?php else: ?>
      <img src="img/user.png" style="width: 100px; height: 100px; margin:8px" class="center">
    <?php endif; ?>


    <form class="formImgPerfil" action="../app/upload.php" method="post" enctype="multipart/form-data">
      <input type="file" class="imgPerfil" name="FOTO" value=""> <br>
      <input type="hidden" class="" name="ID_USUARIO" value="<?= $dataUser[ 'ID_USUARIO' ] ?>"> <br>
      <input type="hidden" class="" name="NOMBRE1" value="<?= $dataUser[ 'NOMBRE1' ] ?>"> <br>
      <input type="submit" class="btnEnviar" value="Subir Imagen" name="submit">
    </form>
    
  </div>
  <!-- Fin Bar search Filter -->



  <!--Bar footer-->
  <div class="tab-bar">
   <button class="tabbar__button">  <!--Btn proximos-->
    <div class="tabbar__icon">
      <ons-icon class="ons-icon zmdi zmdi-face" icon="md-face"  label="Próximos" style="background:#0458a0"></ons-icon>
    </div>
    <div class="tabbar__label">Próximos</div>
  </button>
 <button class="tabbar__button"><!--Btn Guardados-->
    <div class="tabbar__icon">
      <ons-icon class="ons-icon fa-file fa" icon="fa-file" onclick="fn.load('saved.html')" style="background:#0458a0"></ons-icon>
    </div>
    <div class="tabbar__label">Guardados </div> 
  </button>
 <button class="tabbar__button"><!--Btn Reservados-->
    <div class="tabbar__icon">
      <ons-icon class="ons-icon ion-calendar ons-icon--ion" icon="ion-calendar" onclick="fn.load('reserved.html')" style="background:#0458a0"></ons-icon>
    </div>
    <div class="tabbar__label">Reservados </div> 
  </button>

  <button class="tabbar__button"><!--Btn Historial-->
    <div class="tabbar__icon">
      <ons-icon class="ons-icon ion-star ons-icon--ion" icon="ion-star" onclick="fn.load('historialEventos.html')" style="background:#0458a0"></ons-icon>
    </div>
    <div class="tabbar__label">Historial </div> 
  </button>
  
  </div>
<!--Bar footer-->



</ons-page>
</template>

  

</body>
</html>