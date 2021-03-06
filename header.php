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
  <link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/favicon.ico?v=2.1" type="image/x-icon" />
  <![endif]-->
  
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
  
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
            <div class="item banner active" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/header-1.png) no-repeat scroll center top; background-size: cover;"></div>
          </div>
        </div>
      </div>
    </div>
  </header>