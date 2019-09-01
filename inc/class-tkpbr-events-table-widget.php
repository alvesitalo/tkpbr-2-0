<?php 
/**
 * Widget API: TKPBR_Widget_Events_Table class
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 2.0
 */
class tkpbr_events_table extends WP_Widget {
  function __construct() {
    parent::__construct(
      'tkpbr_events_table',
      'Agenda de Eventos do TKPBR',
      array( 'description' => 'Adicione datas e eventos na barra lateral.' )
    );
  }
  // Creating widget front-end
  public function widget( $args, $instance ) {
    $title = isset( $instance['title'] ) ? $instance['title'] : 'Eventos';
    
    // The widget content
    echo $args['before_widget'];
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
    
    if ( isset ( $instance['events'] ) ) {
    ?> 
                <ul class="events-table">
    <?php
      foreach( $instance['events'] as $event ) :
    ?>
              <li class="ellipsis"><time><?php echo $event['date']; ?></time><?php echo $event['info']; ?></li>
    <?php
      endforeach;
    ?>
            </ul>
          <?php
    }
    echo $args['after_widget'];
  }  
  // Widget Backend
  public function form( $instance ) {
    // Widget admin form
    $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Eventos';
    $num_events = ! empty( $instance['num_events'] ) ? $instance['num_events'] : 5;
    
    $events = array();
    
    for ( $event = 1; $event <= $num_events; $event++ ) {
      $events[$event] = array();
      $events[$event]['date'] = ! empty( $instance['events'][$event]['date'] ) ? $instance['events'][$event]['date'] : '00.00';
      $events[$event]['info'] = ! empty( $instance['events'][$event]['info'] ) ? $instance['events'][$event]['info'] : '';
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titulo:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    <label for="<?php echo $this->get_field_id( 'num_events' ); ?>">Numero de eventos:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'num_events' ); ?>" name="<?php echo $this->get_field_name( 'num_events' ); ?>" type="number" value="<?php echo esc_attr( $num_events ); ?>" />
    </p>
    <hr>
    <?php
    for ( $event = 1; $event <= $num_events; $event++ ) {
    ?>
    <!-- <?php echo $event; ?> -->
    <p>
    <legend><strong><?php echo $event; ?>&#186; Evento</strong></legend>
    <label for="<?php echo $this->get_field_id( 'events' ); ?>">Data:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'events' ); ?>" name="<?php echo $this->get_field_name( 'events' ) . '['. $event .'][date]'; ?>" type="text" value="<?php echo esc_attr( $events[$event]['date'] ); ?>" />
    <label for="<?php echo $this->get_field_id( 'events' ); ?>">Evento:</label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'events' ); ?>" name="<?php echo $this->get_field_name( 'events' ) . '['. $event .'][info]'; ?>" type="text" value="<?php echo esc_attr( $events[$event]['info'] ); ?>" />
    </p>
    <hr>
    <?php
    }
  }
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['num_events'] = ( ! empty( $new_instance['num_events'] ) ) ? (int) $new_instance['num_events'] : '';   
    
    $instance['events'] = array();
    
    if ( isset ( $new_instance['events'] ) ) {
      $i = 1;
      foreach ( $new_instance['events'] as $event ) {
        $values = array_map( 'sanitize_text_field', $event );
        $instance['events'][$i] = $values;
        $i++;
      }
    }
    return $instance;
  }
}

// Register and load the widget
function load_tkpbrevents_widget() {
    register_widget( 'tkpbr_events_table' );
}
add_action( 'widgets_init', 'load_tkpbrevents_widget' );
?>