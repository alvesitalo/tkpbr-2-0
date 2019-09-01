              <article id="post-<?php the_ID(); ?>" class="post post-full <?php if ( is_ajax() ) { echo 'loaded-post-page-' . $page_num; } ?> col-xs-12 col-sm-6 col-md-4">
                <div id="thumb">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'post-mini' );
                    } else {
                      echo '<img src="' .get_template_directory_uri(). '/images/no-post-img.jpg" class="attachment-post-mini size-post-mini wp-post-image" alt="">';
                    }
                    ?> 
                    <div class="overlay"></div>
                  </a>
                  <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'd/m' ); ?></time>
                  <p class="excerpt"><?php echo get_excerpt(); ?></p>
                </div>
                <div id="title">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php edit_post_link( '[Editar]' ); ?></h2>
                </div>
              </article>