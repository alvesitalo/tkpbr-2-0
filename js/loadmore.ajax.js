jQuery(function($) {
  $( '.load-more' ).click(function() {

    var container = $( '.pagination' ),
      button = $(this),
      data = {
        'action': 'loadmore',
        'query': posts_query_ajax,
        'page': current_page_ajax
      };

    $.ajax({
      url: '/wp-admin/admin-ajax.php', // AJAX handler
      data: data,
      type: 'POST',
      beforeSend: function( xhr ) {
        button.html( '<i class="fa fa-eye fa-spin"></i> Carregando...' );
      },
      success: function( data ) {
        if ( data ) {
          button.text( 'Mostrar +' );
          container.before( data ); // insert new posts
          current_page_ajax++;
          $( '.loaded-post-page-' + current_page_ajax ).hide().fadeIn( 1200 );
          
          if ( current_page_ajax == max_pages_ajax )
            container.remove(); // if last page, remove all the button
          
        } else {
          container.remove(); // if no data, remove all the button as well
        }
      }
    });
  });
});