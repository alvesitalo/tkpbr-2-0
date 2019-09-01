<?php
/**
 * The search page template
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

get_header(); ?>

  <section>
    <div class="container">
<?php get_template_part( 'content', 'ad-above' ); ?> 
<?php get_template_part( 'content', 'loop-search' ); ?> 
      <!-- conteudo-->
      <div class="row margintop">
        <div class="content col-xs-12 marginbottom">
          <h1 class="intitle ellipsis"><?php printf( 'Pesquisa por: %s', get_search_query() ); ?></h1>
<?php if ( have_posts() ) : ?>
          <div id="loop" class="loop row">
<?php while ( have_posts() ) : the_post();
            get_template_part( 'content', 'post-mini' ); ?> 
<?php endwhile; ?>
            
<?php $total_pages = $wp_query->max_num_pages;
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
          <?php else :
          get_template_part( 'content', 'post-mini-none' ); ?> 
          <?php endif; ?>
        </div>
      </div>
      <!-- /conteudo --> 
<?php get_template_part( 'content', 'ad-below' ); ?> 
    </div>
  </section>

<?php get_footer(); ?>