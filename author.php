<?php
/**
 * The author page template
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

get_header(); ?> 
<?php
$author = ( get_query_var('author_name') ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );

$popularposts = get_posts( 
  array(
    'posts_per_page' => 100,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
  )
);

$author_peak = 1;
$author_in = 0;

foreach ( $popularposts as $popularpost ) {
  if ( $author->ID == $popularpost->post_author ) {
    $author_in = 1;
    break;
  }

  $author_peak++;
}

function get_author_position( $peak, $hot ) {
  if ( $hot == 0 ) {
    return "OUT HOT 100";
  } elseif ( $peak == 1 ) {
    return "#1 ON HOT 100";
  } elseif ( $peak <= 5 ) {
    return "TOP #5";
  } elseif ( $peak <= 10 ) {
    return "TOP #10";
  } elseif ( $peak <= 15 ) {
    return "TOP #15";
  } elseif ( $peak <= 20 ) {
    return "TOP #20";
  } elseif ( $peak <= 30 ) {
    return "TOP #30";
  } elseif ( $peak <= 40 ) {
    return "TOP #40";
  } elseif ( $peak <= 50 ) {
    return "TOP #50";
  } elseif ( $peak <= 60 ) {
    return "TOP #60";
  } elseif ( $peak <= 70 ) {
    return "TOP #70";
  } elseif ( $peak <= 80 ) {
    return "TOP #80";
  } elseif ( $peak <= 90 ) {
    return "TOP #90";
  } elseif ( $peak <= 100 ) {
    return "TOP #100";
  }  
}
?>
  <section>
    <div class="container">
<?php get_template_part( 'content', 'ad-above' ); ?> 
      <!-- author-->
      <div class="row margintop container30">
        <div class="content author-page col-xs-12">
          <div class="author vcard row nomargin">
            <div class="col-xs-12 col-sm-3 col-lg-2">
              <?php echo get_avatar( $author->ID, 150, '', 'Avatar de '. $author->display_name ); ?> 
            </div>
            <div class="author-info col-xs-12 col-sm-9 col-lg-10">
              <h2 class="fn"><?php echo $author->display_name ?></h2>
              <h3>
                <?php
                if ( !empty( $author->description ) ) {
                  $description = explode( "<br />", nl2br( $author->description ) );
                  echo $description[0] ."<br />". $description[1] .", ". $description[2];
                }
                else {
                  echo '(Este autor é um mistério). <br /><br />';
                }
                ?> 
              </h3>
              <h3>
                <i class="fa fa-newspaper-o"></i>
                <?php printf( '%s publicações - %s', count_user_posts( $author->ID ), get_author_position( $author_peak, $author_in ) ); ?> 
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- /author -->
<?php get_template_part( 'content', 'loop-searchform' ); ?> 
      <!-- conteudo-->
      <div class="row margintop">
        <div class="content col-xs-12 marginbottom">
          <h1 class="intitle"><?php printf( 'Postados por: %s', $author->nickname ); ?></h1>
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