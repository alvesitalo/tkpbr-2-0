<?php
/**
 * TKPBR functions and definitions
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

/**
 * TKPBR max img width and defaults
 */
if ( ! isset( $content_width ) ) $content_width = 1170;

function tkpbr_theme_color() {
  $color = '#efa588';
  return $color;
}

function tkpbr_social_links( $link ) {
  if ( $link == 'fb' ) $link = 'https://facebook.com/teamkpbrasil';
  if ( $link == 'tt' ) $link = 'https://twitter.com/teamkpbrasil';
  if ( $link == 'ig' ) $link = 'https://www.instagram.com/teamkpbrasil';
  return $link;
}

/**
 * TKPBR Theme Support
 */
function tkpbr_setup() {
  add_editor_style( 'css/fonts.css' );
  
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  
  set_post_thumbnail_size( 830, 400, array( 'center', 'top' ) );
  add_image_size( 'post-sticky', 710, 320, array( 'center', 'top' ) );
  add_image_size( 'post-mini', 414, 266, array( 'center', 'top' ) ); // 275
  
  add_theme_support(
    'custom-logo', array(
      'height'      => 73,
      'width'       => 200,
      'flex-width'  => true,
    )
  ); 
  add_theme_support( 
    'custom-background', array(
      'default-color' => 'ededed',
    )
  );  
  register_nav_menus(
    array(
      'header'    => 'Header Menu',
      'footer-1'  => 'Footer 1',
      'footer-2'  => 'Footer 2',
      'footer-3'  => 'Footer 3',
    )
  );
}
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
add_action( 'after_setup_theme', 'tkpbr_setup' );

/**
 * Enqueue default TKPBR scripts and styles
 */
function tkpbr_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' );
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.0.7' );
  wp_enqueue_script( 'tkpbr-ads', get_template_directory_uri() . '/js/ads.js', array(), '2.1.1' );
  
  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.3.1', true );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
  
  if ( is_home() ) {
    wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4' );
    wp_enqueue_script( 'owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
    wp_enqueue_script( 'tkpbr-ajax-posts', get_stylesheet_directory_uri() . '/js/loadmore.ajax.js', array('jquery'), '2.0.4', true );
  }
  if ( is_page() ) {
    wp_enqueue_script( 'jquery-lazy', get_template_directory_uri() . '/js/jquery.lazy.min.js', array('jquery'), '1.7.9', true );
  }

  wp_enqueue_script( 'tkpbr-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.1.3', true );
  wp_enqueue_style( 'tkpbr-fonts', get_template_directory_uri() . '/css/fonts.css', array(), '2.1.1' );
	wp_enqueue_style( 'tkpbr-style', get_stylesheet_uri(), array(), '2.1.6' );
}
add_action( 'wp_enqueue_scripts', 'tkpbr_scripts' );

/**
 * TKPBR Widgets
 */
function tkpbr_widgets_init() {
  register_sidebar(
		array(
			'name'          => 'Videos em destaque',
			'id'            => 'videos',
			'description'   => 'Video destaque da pagina inicial.',
			'before_widget' => '<div class="video col-xs-12 col-sm-6">',
			'after_widget'  => '</div>',
			'before_title'  => '<div id="title"> <h3>',
			'after_title'   => '</h3> </div>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'Barra Lateral Comum',
			'id'            => 'side-widgets',
			'description'   => 'Adicione widgets aqui para aparecer tanto na lateral quando na pagina inicial.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3><span>',
			'after_title'   => '</span></h3>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'Barra Lateral',
			'id'            => 'sidebar',
			'description'   => 'Adicione widgets aqui para aparecer na lateral de posts e paginas.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3><span>',
			'after_title'   => '</span></h3>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'Barra Lateral 2',
			'id'            => 'widgets',
			'description'   => 'Adicione widgets aqui para aparecer na lateral da pagina inicial.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3><span>',
			'after_title'   => '</span></h3>',
		)
	);
}
add_action( 'widgets_init', 'tkpbr_widgets_init' );

// Register Post Views Widget
require_once get_template_directory() . '/inc/class-tkpbr-post-views-widget.php';

// Register Events Table Widget
require_once get_template_directory() . '/inc/class-tkpbr-events-table-widget.php';

// Register Sticky Video Widget
require_once get_template_directory() . '/inc/class-tkpbr-sticky-video-widget.php';

/**
 * TKPBR filter pages title
 * @since Wordpress 4.4.0
 */
function tkpbr_filter_title( $title ) {
  if ( is_home() || is_front_page() ) {
    $bloginfo = explode( '.', get_bloginfo( 'description' ) );
    return $title = get_bloginfo( 'name' ) .' - '. $bloginfo[0];
  }
}
add_filter( 'pre_get_document_title', 'tkpbr_filter_title' );

function tkpbr_filter_title_sep( $sep ) {
  $sep = '|';
  return $sep;
}
add_filter( 'document_title_separator', 'tkpbr_filter_title_sep' );

/**
 * TKPBR change capabilities to editors
 */
function tkpbr_change_editors_capabilities( $caps ) {
	if ( !empty( $caps['edit_pages'] ) ) {
		$caps['edit_theme_options'] = true;
	}
	
	return $caps;
}
add_filter( 'user_has_cap', 'tkpbr_change_editors_capabilities' );

/**
 * TKPBR SEO Meta Tags
 */
function post_tags( $id ) {
  $tags = get_the_tags( $id );

  if ( $tags ) {
    $post_tags = array();

    foreach( $tags as $tag ) {
      $post_tags[] = $tag->name;
    }

    echo join ( ', ', $post_tags );
  }
}
require_once get_template_directory() . '/inc/tkpbr-seo-tags-head.php';

/**
 * Return if it is a WordPress Ajax request
 */
function is_ajax() {
  if ( defined('DOING_AJAX') && DOING_AJAX ) { // earlier than 4.7.0
    return true;
  }

  return false;
}

/**
 * Modify search and archives posts per page
 */
function modify_posts_per_page( $query ) {
  if ( $query->is_search() || $query->is_archive() ) {
    $query->set( 'posts_per_page', '12' );
  }
}
add_action( 'pre_get_posts', 'modify_posts_per_page' );

/**
 * Remove menu ids and classes by WPSNIPP
 */
function menu_class_filter( $var ) {
  return is_array( $var ) ? array_intersect( $var, array( 'current-menu-item' ) ) : '';
}
add_filter( 'page_css_class', 'menu_class_filter', 100, 1 );
add_filter( 'nav_menu_css_class', 'menu_class_filter', 100, 1 );
add_filter( 'nav_menu_item_id', 'menu_class_filter', 100, 1 );

/**
 * Get menu name
 */
function nav_menu_name( $location ) {
  $menus = get_nav_menu_locations();
  $menu_id = $menus[ $location ];
  $menu_object = wp_get_nav_menu_object( $menu_id ); 
  return $menu_object->name;
}

/**
 * Loop functions
 */
function get_page_name() {
  global $post;
  $parent = get_post( $post->post_parent );
  $parent_slug = $parent->post_name;
  
  if ( $parent_slug == 'katyperry' ) {
    return 'KATY PERRY';
  }
  else if ( $parent_slug == 'site' ) {
    return 'SITE';
  }
  
  return 'PAGINA';
}

function get_excerpt() {
   $excerpt = html_entity_decode( get_the_content(), ENT_QUOTES );
   $excerpt = strip_shortcodes( $excerpt );
   $excerpt = strip_tags( $excerpt );
   $excerpt = substr( $excerpt, 0, 78 );
   $excerpt = $excerpt . '...';
   return $excerpt;
}

/**
 * Posts views on a week with Jetpack
 */
function tkpbr_set_post_views( $postID ) {
  $countKey = 'post_views_count';

  if ( function_exists( 'stats_get_csv' ) ) {
    $post_stats = stats_get_csv( 'postviews', array( 'post_id' => $postID, 'days' => 7 ) );
    $count = get_post_meta( $postID, $countKey, true );
    $views = $post_stats[0]['views'];
    
    if ( $count == '' ) {
      delete_post_meta( $postID, $countKey );
      add_post_meta( $postID, $countKey, '0' );
    }  
    if ( empty( $views ) ) {
      update_post_meta( $postID, $countKey, '0' );
    }
    else {
      update_post_meta( $postID, $countKey, $views );
    }
  }
}

/**
 * Filter and Minifies Jetpack Contact Form fields
 */
function filter_form_field_class( $fields_html, $field_label, $post_id  ) {
  $html = trim( preg_replace( '/\s+/', ' ', $fields_html ) );

  $fields = array(
    "/(<div class='grunion-field-wrap.*?)('.*?>)/",
    "/(<input type='(text|email|url)'.*?class='.*?)('.*?>)/",
    "/(<(textarea|select).*?class='.*?)('.*?>)/",
    "/(<input type='(checkbox|radio)'.*?class='.*?)('.*?>)/"
  );
  
  $fields_classes = array(
    '$1 form-group $2', // field group
    '$1 form-control $3', // date and default inputs
    '$1 form-control $3', // textarea and select
    '$1 form-check-input $3', // checkbox and radios
  );
  
  $html = preg_replace( $fields, $fields_classes, $html );
  return $html;
}
add_filter( 'grunion_contact_form_field_html', 'filter_form_field_class', 10, 3 );

add_filter( 'jetpack_allow_per_post_subscriptions', '__return_true' );

/**
 * Get authors and coauthors avatars with Co-Authors Plus functions
 */
function tkpbr_authors_avatars( $size ) {
  $size = (int) $size;
  
  if ( function_exists( 'get_coauthors' ) ) {
    $coauthors = get_coauthors();
    
    foreach ( $coauthors as $coauthor ) {
      $extra_class = '';
      if ( count( $coauthors ) > 1 ) $extra_class = 'coauthor';
      
      $args = array(
        'alt' => 'Avatar de '. $coauthor->display_name,
        'class' => 'avatar avatar-'. $size .' photo '. $extra_class,
        'url' => get_avatar_url( $coauthor->ID, array ( 'size' => $size ) ),
        'url2x' => get_avatar_url( $coauthor->ID, array ( 'size' => $size * 2 ) ),
      );
      
      $avatar = sprintf(
        '<img alt="%s" src="%s" srcset="%s" class="%s" height="%d" width="%d"/>',
        esc_attr( $args['alt'] ), esc_url( $args['url'] ), esc_url( $args['url2x'] ) .' 2x', esc_attr( $args['class'] ), $size, $size
      );
      
      echo $avatar;
    }
  } else {
      echo get_avatar( get_the_author_meta( 'ID' ), $size, '', 'Avatar de '. get_the_author() );
  }
}

function disable_guest_authors() {
  add_filter( 'coauthors_guest_authors_enabled', '__return_false' );
}
add_action( 'init', 'disable_guest_authors' );

/**
 * WP Customization by WpTotal.com.br
 */
function custom_login_html() {
  echo
  "<style type='text/css'>
    body.login #login h1 a {
    background-image: url(" . get_template_directory_uri() . "/images/logo_inverse.png);
    background-size: cover;
    height: 55px;
    width: 148px;
    }
  </style>\n";
  echo
  "<script>
    function simplelogin() {
    document.querySelector('a.jetpack-sso-toggle.wpcom').click();
    };
    window.onload = simplelogin;
  </script>\n";
}
add_action( 'login_enqueue_scripts', 'custom_login_html' );

function remove_footer_admin() {
  $bloginfo = explode( '.', get_bloginfo( 'description' ) );
  echo '&copy; <a href="' . esc_url( home_url( '/' ) ) . '">Team Katy Perry Brasil</a> - ' . $bloginfo[0];
}
add_filter( 'admin_footer_text', 'remove_footer_admin' );

function remove_admin_bar_bump() {
  remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'remove_admin_bar_bump' );

/**
 * Remove annoying WP code
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
add_filter( 'feed_links_show_comments_feed', '__return_false' );

// Deregister Jetpack CSS styles
function remove_jetpack_css() {
  wp_deregister_style( 'jetpack-subscriptions' );
}
add_action( 'wp_print_styles', 'remove_jetpack_css' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Register AJAX handle Load More posts by Misha
require_once get_template_directory() . '/inc/misha-load-more-ajax.php';

// Register Lazy Load functions on pages
require_once get_template_directory() . '/inc/tkpbr-pages-lazy-load.php';
?>