<?php
  $args = array(
    'posts_per_page' => 9,
    'ignore_sticky_posts' => 1
  );
  $home = new WP_Query( $args );
?>
      <!-- home -->
      <div class="row margintop">
        <div class="content col-xs-12 col-sm-8 marginbottom">
          <h1 class="intitle">NOTICIAS</h2>
<?php if ( have_posts() ) : ?>
            <div id="loop" class="row loop news">
              
              <script type="text/javascript">
                var posts_query_ajax = '<?php echo json_encode( $args ) ?>',
                    current_page_ajax = <?php echo $home->query_vars['paged'] ? $home->query_vars['paged'] : 1 ?>,
                    max_pages_ajax = <?php echo $home->max_num_pages ?> 
              </script>
              
<?php while ( $home->have_posts() ) : $home->the_post();
                get_template_part( 'content', 'post-full' ); ?> 
<?php endwhile; ?>
              
<?php if ( $home->max_num_pages > 1 ) : ?>
              <nav class="navigation pagination" role="navigation">
                <div class="nav-links">
                  <span class="load-more page-numbers">Carregar +</span>
                </div>
              </nav>
<?php endif; ?>
              
            </div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
          </div>
            <!-- widgets -->
            <?php get_sidebar( 'home' ); ?> 
            <!-- /widgets -->
        </div>
        <!-- videos -->
        <div class="row marginbottom">
          <div class="content col-xs-12 col-sm-12">
            <h2 class="intitle">VIDEOS EM DESTAQUE</h2>
            <div id="videos" class="row loop videos container30">
              <?php 
              if ( is_active_sidebar( 'videos' ) ) { 
                dynamic_sidebar( 'videos' ); 
              }
              else {
                echo '<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="Adicionar widget">Adicione 2 widgets</a> de videos destaque na sidebar <strong>Videos em destaque</strong>';
              }
              ?> 
            </div>
          </div>
        </div>
        <!-- /videos -->
        <!-- links -->
        <div class="row marginbottom">
          <div class="content col-xs-12 col-sm-12">
            <h2 class="intitle">LINKS DIRECIONADOS</h2>
            <div id="links" class="row loop links container30">
              <?php
              $default_before_links = array(
                "<ul class='xoxo blogroll'>",
                "</ul>"
              );
              
              $links_args = array(
                'orderby' => 'ID',
                'order' => 'ASC',
                'category_name' => 'TKPBR Links Home',
                'title_before' => '<!-- ',
                'title_after' => ' -->',
                'category_before' => '',
                'category_after' => '',
                'before' => '<div class="item"> <div class="col-xs-12">',
                'after' => '</div> </div>',
                'echo' => '0'
              );
              $before_links = array( '<div id="links-carousel" class="owl-carousel">', '</div>' );
              
              $bookmarks = wp_list_bookmarks( $links_args );
              
              if ( empty ( $bookmarks ) ) {
                $links_error = '<a href="' . esc_url( admin_url( 'link-manager.php' ) ) . '" title="Adicionar links">Adicione links</a> com imagem na categoria <strong>TKPBR Links Home</strong>';
                echo $links_error;
              }
              else {
                $links_html = str_replace( $default_before_links, $before_links, $bookmarks );
                echo $links_html;
              }
              ?> 
            </div>
          </div>
        </div>
      </div>
      <!-- /links -->
      <!-- /home -->