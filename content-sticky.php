<?php 
  $sticky = new WP_Query( 
    array(
      'posts_per_page' => 5,
      'post__in' => get_option('sticky_posts'),
      'ignore_sticky_posts' => 1
    )
  );
?>
      <!-- sticky posts carousel -->
<?php if ( $sticky->have_posts() ) : ?>
      <div class="row n-margintop container30">
        <div class="col-xs-12">
          <div id="sticky-posts" class="owl-carousel">
            <!-- I think we're running on a loooop -->
<?php while ( $sticky->have_posts() ) : $sticky->the_post(); ?>
            <div class="item">
              <article id="post-<?php the_ID(); ?>" class="sticky row nomargin">
                <div class="thumb nopadding col-xs-12 col-sm-7">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'post-sticky' );
                    } else {
                      echo '<img src="' .get_template_directory_uri(). '/images/no-sticky-img.jpg" class="attachment-post-mini size-post-mini wp-post-image" alt="">';
                    }
                    ?> 
                  </a>
                </div>
                <div class="info col-xs-12 col-sm-5 flexbox-2">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <div class="social-share hidden-xs hidden-sm">
                    <a rel="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ) ?>" data-rel="popup" target="_blank">
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a rel="popup" href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ) ?>&amp;text=<?php echo rawurlencode( get_the_title() ); ?>&amp;via=teamkpbrasil" data-rel="popup" target="_blank">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a rel="popup" href="https://api.whatsapp.com/send?text=<?php echo rawurlencode( get_the_title() ); ?>%20<?php echo urlencode( get_permalink() ) ?>" target="_blank">
                      <i class="fa fa-whatsapp"></i>
                    </a>
                  </div>
                </div>
              </article>
            </div>
<?php endwhile; wp_reset_postdata(); ?>
            <!-- Deja Vu -->
          </div>
        </div>
      </div>
<?php endif; ?>
      <!-- /sticky posts carousel -->