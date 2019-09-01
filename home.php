<?php
/**
 * The main template file
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

get_header(); ?>

  <div class="container">
<?php get_template_part( 'content', 'sticky' ); ?> 
<?php get_template_part( 'content', 'ad-above' ); ?> 
<?php get_template_part( 'content', 'home' ); ?> 
<?php get_template_part( 'content', 'ad-below' ); ?> 
  </div>

<?php get_footer(); ?>