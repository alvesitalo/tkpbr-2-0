      <!-- search -->
      <div class="loop-search row margintop">
        <div class="col-sm-offset-4 col-sm-4">
          <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="input-group custom-search-form">
              <input type="text" name="s" value="<?php echo get_search_query(); ?>" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-basic" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <!-- /search -->