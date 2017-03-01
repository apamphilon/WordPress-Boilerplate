<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <label for="search"></label>
  <input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter Keyword', 'placeholder', 'wordpress-boilerplate' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'wordpress-boilerplate' ) ?>" />
  <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wordpress-boilerplate' ) ?>" />
</form>
