<script type="text/javascript">
          $(function() {
            $.ajax({
              url: 'https://graph.facebook.com?id=<?php the_permalink(); ?>&fields=og_object{engagement}',
              timeout: 5000,
              dataType: 'jsonp',
              success: function( data ) {
                $( '.comments-count' ).text( '(' + data.og_object.engagement.count + ')' );
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