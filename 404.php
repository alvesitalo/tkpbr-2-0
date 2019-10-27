<?php
  // Jokes
  $ex = ['<code>/katyperry/hitmaker</code> ao invés de <code>/katyperry/flop</code>', 
         '<code>td/albumdacarreira</code> ao invés de <code>prism/albumdacarreira</code>',
         '<code>/guardanafabase/ss</code> e também <code>/guardanafabase/heyx3</code>',
         '<code>/tihwd/single</code> ao invés de <code>/legendarylovers/single</code>',
         '<code>/darkhorse/katy</code> ao invés de <code>/darkhorse/flame</code>',
         '<code>/presidente/bruna</code> ao invés de <code>/presidente/ramon</code>
        '];
  $phrase = mt_rand(0, 5);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
  <meta name="theme-color" content="<?php echo tkpbr_theme_color(); ?>">
  <meta name="msapplication-navbutton-color" content="<?php echo tkpbr_theme_color(); ?>">

  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.min.js"></script>
  <link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/favicon.ico?v=2.1" type="image/x-icon" />
  <![endif]-->
  
  <?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
  <div class="main">
    <h1>404</h1>
    <p><strong><?php wp_title('') ?></strong></p>

    <p>A página que você procura não foi encontrada nesse endereço 😞</p>

    <p>Há algo errado, tenha certeza de que a URL corresponde ao que procura.<br>
    exemplo: (<?php echo $ex[$phrase]; ?>)
    </p>

    <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Volte a página inicial</a> para continuar acessando o <strong>TKPBR</strong>.</p>

    <div id="site">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Team Katy Perry Brasil</a> &mdash;
      <a href="<?php echo esc_url( tkpbr_social_links( 'tt' ) ); ?>">@teamkpbrasil</a>
    </div>

    <a href="/" class="logo logo-img">
      <img height="80" alt="logo" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/kp_hands.png">
    </a>
  </div>

  <?php wp_footer(); ?>
</body>

</html>