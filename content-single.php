      <!-- conteudo -->
      <div class="row margintop">
        <div class="content col-xs-12 col-sm-8 marginbottom">
<?php while ( have_posts() ) : the_post(); ?>
<?php tkpbr_set_post_views( get_the_ID() ); ?>
          <h2 class="intitle">NOTICIA</h2>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( has_post_thumbnail() ) { ?>
            <div id="thumb">
              <?php the_post_thumbnail(); ?> 
            </div>
<?php } ?>
            <div id="title">
              <?php the_title( '<h1>', '</h1>' ); ?> 
              <?php edit_post_link( '<i class="fa fa-pencil" aria-hidden="true"></i> EDITAR POST', '<p>', '</p>' ); ?> 
              <div id="date" class="text-center">
                <p><time datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'd/m/Y' ) ?></time></p>
              </div>
            </div>
            <div id="entry">
              <?php the_content(); ?> 
            </div>
            <div id="metadata" class="row nomargin">
              <div class="col-xs-12 col-sm-8 nopadding text-center">
                <div class="author vcard">
                  <div class="author-info ellipsis">
                    <?php tkpbr_authors_avatars( 35 ); ?> 
                    <?php 
                    if ( function_exists( 'coauthors_posts_links' ) ) {
                      coauthors_posts_links();
                    } else {
                      the_author_posts_link();
                    }
                    ?> 
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 nopadding text-center">
                <aside class="social-share">
                  <a rel="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ) ?>" data-rel="popup" target="_blank">
                    <i class="fa fa-facebook"></i>
                  </a>
                  <a rel="popup" href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ) ?>&amp;text=<?php echo rawurlencode( get_the_title() ); ?>&amp;via=teamkpbrasil" data-rel="popup" target="_blank">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="whatsapp://send?text=<?php echo rawurlencode( get_the_title() ); ?>%20<?php echo urlencode( get_permalink() ) ?>">
                    <i class="fa fa-whatsapp"></i>
                  </a>
                </aside>
              </div>
            </div>
          </div>
          <?php comments_template(); ?> 
<?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?> 
      </div>
      <!-- /conteudo -->