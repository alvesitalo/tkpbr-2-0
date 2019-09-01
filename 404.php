<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="theme-color" content="<?php echo tkpbr_theme_color(); ?>">
  <meta name="msapplication-navbutton-color" content="<?php echo tkpbr_theme_color(); ?>">
  
  <!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.min.js"></script>
	<![endif]-->
  
  <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.ico" type="image/x-icon" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 id="error" class="text-center">404</h1>
          <h2 class="text-center"><?php wp_title('') ?></h2>
        </div>
      </div>

      <div class="row margin-20">
        <div class="col-md-12">
          <div id="link-broken">
            <span class="text-center">
              <i class="fa fa-chain-broken fa-5x"></i> 
            </span>
          </div>
        </div>
      </div>
      
      <div class="row margin-20">
        <div class="col-md-12">
          <h3 class="text-center">Continue navegando pelo TKPBR:</h3>
        </div>
      </div>
      
      <div class="row margin-20">
        <div class="col-md-12">
          <div class="search col-md-6 col-md-offset-3">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
              <input type="text" placeholder="Busca" class="col-xs-12 col-sm-8 col-md-9"/>
              <input type="submit" value="Pesquisar" class="col-xs-12 col-sm-4 col-md-3"/>
            </form>
          </div>
        </div>
      </div>
      
      <div class="row margin-20"> 
        <div class="col-md-12">
          <aside class="links-tkpbr social-share text-center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home fa-2x"></i></a>
            <a href="<?php echo esc_url( tkpbr_social_links( 'fb' ) ); ?>"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="<?php echo esc_url( tkpbr_social_links( 'tt' ) ); ?>"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="<?php echo esc_url( tkpbr_social_links( 'ig' ) ); ?>"><i class="fa fa-instagram fa-2x"></i></a>
          </aside>
        </div> 
      </div>
  </section>
    
 <?php wp_footer(); ?>
</body>

</html>