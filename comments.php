<script type="text/javascript">
          $(function() {
            $.ajax({
              url: 'https://graph.facebook.com/<?php the_permalink(); ?>',
              dataType: 'jsonp',
              success: function( data ) {
                $( '.comments-count' ).text( '(' + data.share.comment_count + ')' );
              }
            });
          });
          </script>
          <div id="comments" class="col-xs-12 margintop nopadding">
            <h2 class="intitle">COMENTARIOS <span class="comments-count"></span></h2>
            <div class="comment-box">
              <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="10" data-width="100%"></div>
            </div>
          </div>