<?php
/**
 * Widget API: TKPBR_Widget_Post_Views class
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 2.0
 */
class tkpbr_post_views extends WP_Widget {
  function __construct() {
    parent::__construct(
      'tkpbr_post_views',
      'Posts populares do TKPBR',
      array( 'description' => 'Os posts mais vistos na semana.' )
    );
  }
  // Creating widget front-end
  public function widget( $args, $instance ) {
    $title = isset( $instance['title'] ) ? $instance['title'] : 'Mais Lidas';
    $num_posts = isset( $instance['num_posts'] ) ? $instance['num_posts'] : 5;
    
    // The widget content
    echo $args['before_widget'];
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
    
    global $post;
    $post_peak = 1;
    $popularposts = get_posts( array( 'posts_per_page' => $num_posts, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC' ) );
?> 
            <ul class="posts-peak">
<?php
    foreach ( $popularposts as $post ) : setup_postdata( $post );
?>
              <li class="ellipsis">
                <a href="<?php the_permalink(); ?>" aria-label="<?php echo get_post_meta( get_the_ID(), 'post_views_count', true ); ?> views (<?php the_author(); ?>)" title="<?php the_title(); ?>">
                  <?php echo $post_peak; ?>. <?php the_title(); ?> 
                </a>
              </li>
<?php
      $post_peak++;
    endforeach;
?>
            </ul>
<?php
    wp_reset_postdata();
    echo $args['after_widget'];
  }  
  // Widget Backend
  public function form( $instance ) {
    // Widget admin form
    $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Mais Lidas';
    $num_posts = ! empty( $instance['num_posts'] ) ? $instance['num_posts'] : 5;
?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titulo:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'num_posts' ); ?>">Numero de posts:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" type="number" value="<?php echo esc_attr( $num_posts ); ?>" />
    </p>
<?php
  }
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['num_posts'] = ( ! empty( $new_instance['num_posts'] ) ) ? (int) $new_instance['num_posts'] : '';
    return $instance;
  }
}

// Register and load the widget
function load_postviews_widget() {
  register_widget( 'tkpbr_post_views' );
}
add_action( 'widgets_init', 'load_postviews_widget' );
?>