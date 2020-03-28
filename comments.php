        <div id="fb-root"></div>
          <script>
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s);
              js.id = id;
              js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
          </script>
          
          <div id="comments" class="col-xs-12 margintop nopadding">
            <h2 class="intitle">COMENTARIOS</h2>
            <div class="comment-box">
              <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="10" data-width="100%"></div>
            </div>
          </div>