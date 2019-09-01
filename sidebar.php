<div class="sidebar col-xs-12 col-sm-4">
          <?php get_search_form(); ?> 
          <?php if ( is_active_sidebar( 'side-widgets' ) ) { 
                 dynamic_sidebar( 'side-widgets' ); 
          } ?> 
          <?php if ( is_active_sidebar( 'sidebar' ) ) { 
                  dynamic_sidebar( 'sidebar' ); 
          } ?> 
        </div>