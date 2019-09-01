<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="theme-color" content="<?php echo tkpbr_theme_color(); ?>">
  <meta name="msapplication-navbutton-color" content="<?php echo tkpbr_theme_color(); ?>">
  <?php echo tkpbr_seo_tags(); ?> 
  
  <!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.min.js"></script>
	<![endif]-->
  
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.ico" type="image/x-icon" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  
  <header>
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
              the_custom_logo();
            } else {
              echo '<img src="' .get_template_directory_uri(). '/images/logo.png" class="logo" alt="tkpbr">';
            }
            ?> 
          </a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'header',
            'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_id'    => 'navbar',
            'container_class' => 'collapse navbar-collapse',
            'menu_class'      => 'nav navbar-nav navbar-right',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
          )
        );
        ?> 
      </div>
    </nav>

    <div class="container-fluid nopadding">
      <div class="banner nopadding">
        <div id="slide" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slide" data-slide-to="0" class="active"></li>
            <li data-target="#slide" data-slide-to="1" class=""></li>
            <li data-target="#slide" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item banner active" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-1.jpg) no-repeat scroll center top; background-size: cover;"></div>
          </div>
        </div>
      </div>
    </div>
  </header>