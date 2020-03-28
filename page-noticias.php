<?php
/**
 * The site news template
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

get_header(); ?>

  <section>
    <div class="container">
<?php get_template_part( 'content', 'ad-above' ); ?> 
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $news = new WP_Query( 
    array(
      'posts_per_page' => 12,
      'paged' => $paged,
      'ignore_sticky_posts' => 1
    )
  );
?>
<?php get_template_part( 'content', 'loop-searchform' ); ?> 
      <!-- conteudo-->
      <div class="row margintop">
        <div class="content col-xs-12 marginbottom">
          <h1 class="intitle">Todas as noticias</h1>
<?php if ( $news->have_posts() ) : ?>
          <div id="loop" class="loop row">
<?php while ( $news->have_posts() ) : $news->the_post();
            get_template_part( 'content', 'post-mini' ); ?> 
<?php endwhile; ?>
            
<?php $total_pages = $news->max_num_pages;
            if ( $total_pages > 1 ) : ?>
            <nav class="navigation pagination" role="navigation">
              <h2 class="screen-reader-text">Posts mais antigos ou mais recentes</h2>
              <div class="nav-links">
                <?php
                $current_page = max(1, get_query_var('paged'));
                echo paginate_links(
                    array(
                      'base'      => get_pagenum_link(1) . '%_%',
                      'format'    => 'page/%#%',
                      'current'   => $current_page,
                      'total'     => $total_pages,
                      'prev_text' => '&lt; Anterior',
                      'next_text' => 'Próxima &gt;',
                    )
                  );
                ?> 
              </div>
            </nav>
<?php endif; ?>
          </div>
<?php endif; ?>
        </div>
      </div>
      <!-- /conteudo -->
<?php get_template_part( 'content', 'ad-below' ); ?> 
    </div>
  </section>

<?php get_footer(); ?>