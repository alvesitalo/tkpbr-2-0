<?php
/**
 * The site members template
 *
 * @package TKPBR-2-0
 * @subpackage TKPBR
 * @since TKPBR 2.0
 */

get_header(); ?>

  <section>
    <div class="container">
<?php get_template_part( 'content', 'ad-above' ); ?> 
<?php
  $users = get_users(
    array(
      'blog_id' => 1,
      'role'    => 'editor',
      'orderby' => 'display_name'
    )
  );
?>
      <!-- conteudo-->
      <div class="row margintop">
        <div class="content col-xs-12 col-sm-8 marginbottom">
          <h1 class="intitle">EQUIPE</h1>
          <div id="members" class="members loop row">
            <!-- "Editor" Users -->
<?php foreach( $users as $user) : ?>
            <div class="person vcard col-xs-12 col-sm-6 col-md-4">
              <div class="avatar photo" style="background: url(<?php echo get_avatar_url( $user->ID, array( 'size' => 150 ) ); ?>) top center no-repeat;"></div>
              <p id="name" class="fn text-center">
                <strong><?php echo $user->display_name; ?></strong>
              </p>
              <p id="about" class="info text-center">
                <?php echo nl2br( get_the_author_meta( 'description', $user->ID ) ); ?> 
              </p>
            </div>
<?php endforeach; ?>
          </div>
        </div>
        <?php get_sidebar(); ?> 
      </div>
      <!-- /conteudo -->
<?php get_template_part( 'content', 'ad-below' ); ?> 
    </div>
  </section>

<?php get_footer(); ?>