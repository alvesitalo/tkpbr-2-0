<?php 
function tkpbr_seo_tags() {
  global $wp;
  $current_url = home_url( add_query_arg( array(), $wp->request ) );
  
  echo '<!-- TKPBR SEO Tags -->';
  if ( is_home() || is_front_page() ) {
  ?> 
  <meta name="description" content="<?php bloginfo('description') ?>" />
  <meta name="keywords" content="team katy perry, tkpbr, kate, katy, perry, brasil, katheryn elizabeth hudson, musica, lyrics, album, fan made, fotos, videos, noticias, performances, candids, galeria, site, witness tour, biografia, discografia, turnes, charts, produtos, katycats, katy kat, fas, witness, chained to the rhythm, bon appetit, swish swish, gretchen" />
  <meta name="author" content="<?php bloginfo("name"); ?>" />
  <meta property="og:title" content="<?php bloginfo("name"); ?>" />
  <meta property="og:description" content="<?php bloginfo('description') ?>" />
  <meta property="og:url" content="<?php echo $current_url; ?>" />
  <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ) ?>/screenshot.jpg" />
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="900">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:type" content="website" />
  <?php
  }
  if ( is_single() || is_page() ) {
    global $post;
  ?> 
  <meta name="keywords" content="<?php echo post_tags( $post->ID ) ?>" />
  <meta name="author" content="<?php echo get_the_author_meta( 'display_name', $post->post_author ) ?>" />
  <meta property="og:title" content="<?php wp_title('') ?> | <?php bloginfo('name') ?>" />
  <meta property="og:description" content="<?php echo $post->post_excerpt; ?>" />
  <meta property="og:url" content="<?php echo $current_url; ?>" />
  <meta property="og:image" content="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'post-mini' ) ) ?>" />
  <meta property="og:type" content="article" />
  <meta property="article:published_time" content="<?php echo $post->post_date; ?>">
  <meta property="fb:admins" content="100001571518904"/>
  <?php
  }
  if ( is_author() ) {
    $curauthor = ( get_query_var('author_name') ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
  ?> 
  <meta name="keywords" content="perfil, posts, publicados, noticias, autor, vcard, <?php echo $curauthor->nickname; ?>" />
  <meta name="author" content="<?php echo $curauthor->display_name; ?>" />
  <meta property="og:title" content="Posts publicados por <?php echo $curauthor->display_name; ?> | <?php bloginfo('name') ?>" />
  <meta property="og:description" content="Todas as notícias publicadas pelo autor <?php echo $curauthor->nickname; ?>" />
  <meta property="og:url" content="<?php echo $current_url; ?>" />
  <meta property="og:image" content="<?php echo get_avatar_url( $curauthor->ID, array( 'size' => 400 ) ) ?>" />
  <meta property="og:type" content="website" />
  <?php
  }
  echo '<!-- /TKPBR SEO Tags -->';
}
?>