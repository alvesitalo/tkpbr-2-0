<?php 
/**
 * Widget API: TKPBR_Widget_Sticky_Video class
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 2.0
 */
class tkpbr_sticky_video extends WP_Widget {
  function __construct() {
    parent::__construct(
      'tkpbr_sticky_video',
      'Video destaque do TKPBR',
      array( 'description' => 'Adiciona um video em destaque do YouTube na pagina inicial.' )
    );
  }
  // Creating widget front-end
  public function widget( $args, $instance ) {
    $title = isset( $instance['title'] ) ? $instance['title'] : 'Video';
    $video_url = isset( $instance['video_url'] ) ? $instance['video_url'] : 'https://www.youtube.com/watch?v=CevxZvSJLk8';
    
    preg_match( "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_url, $matches );
    $video_id = $matches[1];
    
    // The widget content
    echo $args['before_widget'];    
    ?>
    <div class="boxVideo">
      <iframe width="560" height="315" src="<?php echo esc_url( sprintf( 'https://www.youtube.com/embed/%s', $video_id ) ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <?php
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
    echo $args['after_widget'];
  }  
  // Widget Backend
  public function form( $instance ) {
    // Widget admin form
    $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Video';
    $video_url = ! empty( $instance['video_url'] ) ? $instance['video_url'] : '';
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titulo:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'video_url' ); ?>">Url do YouTube:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'video_url' ); ?>" name="<?php echo $this->get_field_name( 'video_url' ); ?>" type="url" value="<?php echo esc_attr( $video_url ); ?>" />
    </p>
    <?php
  }
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['video_url'] = ( ! empty( $new_instance['video_url'] ) ) ? sanitize_text_field( $new_instance['video_url'] ) : '';
    return $instance;
  }
}

// Register and load the widget
function load_tkpbrvideo_widget() {
    register_widget( 'tkpbr_sticky_video' );
}
add_action( 'widgets_init', 'load_tkpbrvideo_widget' );
?>