<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $__env->yieldContent( 'title' ); ?> @ Toyota</title>
  <?php echo Html::favicon( 'favicon.png' ); ?>

  <meta name="description" content="<?php echo $__env->yieldContent( 'description' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <?php echo Html::meta( 'robots', 'INDEX,FOLLOW' ); ?>

  <?php echo Html::style( 'humans.txt', [ 'type' => 'text/plain', 'rel' => 'author' ] ); ?>


  <?php echo Html::style( 'assets/css/reset-sass.css'); ?>

  <?php echo Html::style( 'http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' ); ?>

  <?php echo Html::style( 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' ); ?>

  <?php echo Html::style( 'assets/css/fonts/fonts.css'); ?>

  <?php echo Html::style( 'assets/css/style.css'); ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-78430002-1', 'auto');
    ga('send', 'pageview');
  </script>
  <iframe src="https://ads.mediade.sk/retargeting/pixel?p=024BADA5-074D-41CD-92D5-3ED824BE6DE2&days=180&adv=2653ab6b-e5dc-4fc4-a1a0-9bebec14b1cd"></iframe>
  <?php echo Html::image( '//magnetic.t.domdex.com/31495/pix.gif?t=r&for=Toyota', '', [
    'width'   => "1",
    'height'  => "1" ,
    'style'   => "display:none;"
  ] ); ?>

  <?php echo Html::image( '//magnetic.t.domdex.com/31496/pix.gif?t=c&for=Toyota', '', [
    'width'   => "1",
    'height'  => "1" ,
    'style'   => "display:none;"
  ] ); ?>

</head>
<body>
<?php $__env->startSection( 'header' ); ?>
  <header>
    <div class="menu1 fadeInDown animated">
      <?php if ( ! ( !route( 'home' ) )): ?>
      <?php echo Html::link( route( 'home' ), 'Volver', [ 'class' => 'btnprev' ] ); ?>

      <?php endif; ?>
      <?php echo Html::link( route( 'home' ), '', [
        'target'  => '_blank',
        'class'   => 'logo'
      ] ); ?>

      <i class="hamburguesa"></i>
      <div class="redes">
        <span>
          <a href="https://twitter.com/ToyotaMex" target='_blank'>
            <i class="fa fa-twitter"></i>
          </a>
          <a href="https://www.facebook.com/ToyotaMex" target='_blank'>
            <i class="fa fa-facebook"></i>
          </a>
          <a href="https://www.youtube.com/user/ToyotaMex" target='_blank'>
            <i class="fa fa-youtube"></i>
          </a>
        </span>
      </div>
      <nav>
        <ul>
          <!--
          <li class="finan">
            <?php echo Html::link( 'financiamiento', 'Financiamiento', [
              'target' => '_blank'
            ] ); ?>

          </li>
          -->
          <li class="distri">
            <?php echo Html::link( 'distribuidores', 'Distribuidores', [] ); ?>

          </li>
        </ul>
      </nav>
    </div>
    <div class="menu2 fadeInUp animated">
      <!--
      <?php echo Html::link( '#', 'CONTÁCTANOS', [
        'class' => 'btnprev'
      ] ); ?>

      -->
      <?php echo Html::link( '#cover', '', [
        'class' => 'scroll'
      ] ); ?>

      <nav>
        <ul>
          <li>
            <?php echo Html::link( '#colores', 'COLORES', [
              'class' => 'scroll'
            ] ); ?>

          </li>
          <li>
            <?php echo Html::link( '#highlights', 'HIGHLIGHTS', [
              'class' => 'scroll'
            ] ); ?>

          </li>
          <li>
            <?php echo Html::link( '#galeria', 'GALERÍA', [
              'class' => 'scroll'
            ] ); ?>

          </li>
          <!--
          <li>
            <?php echo Html::link( '#highlights2', 'VERSATILIDAD', [
              'class' => 'scroll'
            ] ); ?>

          </li>
          -->
          <li>
            <?php echo Html::link( '#versiones', 'VERSIONES', [
              'class' => 'scroll'
            ] ); ?>

          </li>
        </ul>
      </nav>
    </div>
  </header>
<?php echo $__env->yieldSection(); ?>

<?php echo $__env->yieldContent( 'content' ); ?>

<?php $__env->startSection( 'footer' ); ?>
  <footer>
    <?php echo Html::link( '#cover', '', [ 'class' => 'scroll' ] ); ?>

    <div class="menu3">
      <nav>
        <ul>
          <li>
            <?php echo Html::link( 'http://toyota.com.mx/contenidos/aviso-de-privacidad/', 'Política de Privacidad', [
              'target' => '_blank'
            ] ); ?>

          </li>
          <li>
            <?php echo Html::link( 'http://toyota.com.mx/contenidos/terminos-legales-y-condiciones/', 'Términos Legales', [
              'target' => '_blank'
            ] ); ?>

          </li>
          <!--
          <li>
            <?php echo Html::link( '', 'Aviso de Privacidad', [] ); ?>

          </li>
          -->
        </ul>
      </nav>
      <span><p>©<?=date('Y');?> Toyota, TOYOTA MÉXICO</p></span>
    </div>
  </footer>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection( 'scripts' ); ?>
  <?php echo Html::style( 'assets/css/animate.css'); ?>

  <?php echo Html::style( 'assets/plugins/font-awesome/css/font-awesome.min.css'); ?>


  <!--
  Threesixty
  ==================================================
  -->
  <?php echo Html::style( 'assets/plugins/threesixty/threesixty.css'); ?>

  <!--[if lt IE 9]>
    <?php echo Html::script( '//html5shiv.googlecode.com/svn/trunk/html5.js' ); ?>

    <script>window.html5 || document.write('<script src="assets/js/vendor/html5shiv.js"><\/script>')</script>
  <![endif]-->

  <?php echo Html::script( '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' ); ?>

  <?php echo Html::script( 'http://thecodeplayer.com/uploads/js/jquery.easing.min.js' ); ?>

  <script>window.jQuery || document.write( '<script src="assets/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
  <?php echo Html::script( 'http://maps.googleapis.com/maps/api/js?key=AIzaSyCuosyGWyggBFw6Fzv6T3TquJGqUz76DGQ&libraries=places' ); ?>

  <?php echo Html::script( 'assets/plugins/bxslider/jquery.bxslider.min.js' ); ?>

  <?php echo Html::script( 'assets/plugins/threesixty/threesixty.js' ); ?>

  <?php echo Html::script( 'assets/plugins/fitvids/jquery.fitvids.js'); ?>

  <?php echo Html::script( 'assets/plugins/touch-swipe/jquery.touchSwipe.min.js'); ?>

  <?php echo Html::script( 'assets/plugins/onscreen/jquery.onscreen.min.js'); ?>

  <!-- Financiamiento -->
  <?php if( isset( $financiamiento ) && $financiamiento == true ): ?>
  <?php echo Html::script( 'assets/js/phpjs/number_format.js'); ?>

  <?php echo Html::script( 'assets/js/financiamiento-toyota.js'); ?>

  <?php endif; ?>
  <!-- Add main JS -->
  <?php echo Html::script( 'assets/js/main.js'); ?>

  <?php echo Html::script( 'assets/js/especificaciones.js'); ?>

  <?php echo Html::script( 'assets/js/mapa.js' ); ?>

  <?php echo Html::script( '//cdnjs.cloudflare.com/ajax/libs/picturefill/2.0.0/picturefill.min.js', [ 'async' => "" ] ); ?>


  <!-- Add fancyBox main JS and CSS files -->
  <?php echo Html::script( 'assets/plugins/fancyBox/jquery.fancybox.js'); ?>

  <?php echo Html::script( 'assets/plugins/fancyBox/helpers/jquery.fancybox-buttons.js'); ?>

  <?php echo Html::script( 'assets/plugins/fancyBox/helpers/jquery.fancybox-media.js'); ?>

<?php echo $__env->yieldSection(); ?>
</body>
</html>
