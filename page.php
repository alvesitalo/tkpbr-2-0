<?php
/**
 * The Pages template
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 1.0
 */

get_header(); ?>

  <section>
    <div class="container">
<?php get_template_part( 'content', 'ad-above' ); ?> 
<?php get_template_part( 'content', 'page' ); ?> 
<?php get_template_part( 'content', 'ad-below' ); ?> 
    </div>
  </section>

<?php get_footer(); ?>