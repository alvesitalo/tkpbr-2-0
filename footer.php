  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-sm-3 text-center">
<?php if ( has_nav_menu( 'footer-1' ) ) : ?>
          <h2><?php echo nav_menu_name( 'footer-1' ); ?></h2>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-1',
              'menu_class'     => 'footer-menu',
              'container'      => '',
            )
          );
          else :
          get_template_part( 'content', 'footer-menu-none' );
          ?>
<?php endif; ?> 
        </div>
        <div class="col-xs-6 col-sm-3 text-center">
<?php if ( has_nav_menu( 'footer-2' ) ) : ?>
          <h2><?php echo nav_menu_name( 'footer-2' ); ?></h2>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-2',
              'menu_class'     => 'footer-menu',
              'container'      => '',
            )
          );
          else :
          get_template_part( 'content', 'footer-menu-none' );
          ?>
<?php endif; ?> 
        </div>
        <div class="col-xs-6 col-sm-3 text-center">
<?php if ( has_nav_menu( 'footer-3' ) ) : ?>
          <h2><?php echo nav_menu_name( 'footer-3' ); ?></h2>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-3',
              'menu_class'     => 'footer-menu',
              'container'      => '',
            )
          );
          else :
          get_template_part( 'content', 'footer-menu-none' );
          ?>
<?php endif; ?> 
        </div>
        <div class="col-xs-6 col-sm-3 text-center">
          <h2 id="logo">TEAM KATY PERRY BRASIL</h2>
          <div class="social-icons">
            <a href="<?php echo esc_url( tkpbr_social_links( 'fb' ) ); ?>"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo esc_url( tkpbr_social_links( 'tt' ) ); ?>"><i class="fa fa-twitter"></i></a>
            <a href="<?php echo esc_url( tkpbr_social_links( 'ig' ) ); ?>"><i class="fa fa-instagram"></i></a>
          </div>
          <p>&copy; <?php echo date("Y"); ?> <strong>Team Katy Perry Brasil</strong></p>
          <p>Tema por <a href="https://github.com/alvesitalo" target="_blank">&#205;talo Alves</a> e <a href="<?php echo esc_url( 'https://www.behance.net/luana_pereira' ); ?>" target="_blank">Luana Pereira</a></p>
          <p>Hospedado por <a href="<?php echo esc_url( 'https://flaunt.nu' ); ?>" target="_blank">Flaunt</a></p>
        </div>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>

</body>

</html>