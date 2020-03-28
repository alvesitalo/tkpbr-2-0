<?php
/**
 * The Pages template
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

get_header(); ?>

  <section>
    <div class="container">
<?php get_template_part( 'content', 'ad-above' ); ?> 
      <!-- conteudo-->
      <div class="row margintop">
        <div class="content col-xs-12 col-sm-8 marginbottom">
<?php while ( have_posts() ) : the_post(); ?>
          <h2 class="intitle"><?php echo get_page_name(); ?></h2>
          <div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div id="title">
              <?php the_title( '<h1>', '</h1>' ); ?> 
            </div>
<?php if ( has_post_thumbnail() ) { ?>
            <div id="thumb">
              <?php the_post_thumbnail(); ?> 
            </div>
<?php } ?>
            <div id="entry">
              <?php the_content(); ?>
            </div>
            <div id="metadata">
              <div class="col-xs-12 nopadding text-center">
                <aside class="social-share">
                  <a rel="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ) ?>" data-rel="popup" target="_blank">
                    <i class="fa fa-facebook"></i>
                  </a>
                  <a rel="popup" href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ) ?>&amp;text=<?php echo rawurlencode( get_the_title() ); ?>&amp;via=teamkpbrasil" data-rel="popup" target="_blank">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a rel="popup" href="https://api.whatsapp.com/send?text=<?php echo rawurlencode( get_the_title() ); ?>%20<?php echo urlencode( get_permalink() ) ?>">
                    <i class="fa fa-whatsapp"></i>
                  </a>
                </aside>
              </div>
            </div>
          </div>
<?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?> 
      </div>
      <!-- /conteudo -->
<?php get_template_part( 'content', 'ad-below' ); ?> 
    </div>
  </section>

<?php get_footer(); ?>