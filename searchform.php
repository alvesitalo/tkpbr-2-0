<div id="search" class="widget widget_tkpbr_search">
            <div class="col-sm-12 col-md-3 nopadding">
              <h3><span>BUSCA</span></h3>
            </div>
            <div class="col-sm-12 col-md-9 nopadding">
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